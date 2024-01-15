<?php

namespace App\Services\CRUD;

use App\Exceptions\CRUDException;
use App\Jobs\Cache\CollectionJob;
use App\Jobs\Cache\ModelJob;
use App\Utils\Enums\ErrorCodeEnum;
use App\Utils\Filter\AbstractFilter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

abstract class CRUDService implements CRUDServiceInterface
{
    protected static string $exception = CRUDException::class;

    protected static string $langPathName = 'crud';

    protected string $cacheKey = 'crud';

    protected readonly array $config;

    /**
     * @throws CRUDException
     */
    public function __construct()
    {
        if (! isset(static::$model)) {
            throw new CRUDException(trans('crud.model_not_defined'), ErrorCodeEnum::ERROR_OTHER);
        }

        $this->config = config('crud-service');
    }

    final public function list(array $filterData): Collection|LengthAwarePaginator
    {
        $page = request()->get($this->config['current_page_name'], 1);
        $key = $this->cacheKey.':'.$this->config['current_page_name'].':'.$page;

        if ($filterData) {
            $key .= ':'.md5(serialize($filterData));
        }

        $perPage = request()->get($this->config['per_page_name'], $this->config['count_page_elements']);

        if (isset(static::$filter) && $filterClass = static::$filter) {
            /** @var AbstractFilter $filter */
            $filter = app()->make($filterClass, ['queryParams' => array_filter($filterData)]);
            $collectionBuilder = static::$model::filter($filter);
        } else {
            $collectionBuilder = static::$model::query();
        }

        if (is_numeric($perPage)) {
            $collection = $collectionBuilder->paginate($perPage);
        } elseif (is_string($perPage) && mb_strtolower($perPage) === $this->config['get_all_elements_var_value']) {
            $collection = $collectionBuilder->get();
        } else {
            $collection = $collectionBuilder->paginate();
        }

        if ($collection->count() > 0) {
            CollectionJob::dispatch($key, $collection);

            return $collection;
        }

        throw new static::$exception(trans(static::$langPathName.'.view.empty_list'), ErrorCodeEnum::ERROR_VIEW_RECORD);
    }

    public function create(array $data): Model
    {
        if (method_exists($this, 'setAlias')) {
            $this->setAlias($data, 'name');
        }

        /** @var Model $getModel */
        if ($getModel = static::$model::query()->create($data)) {
            ModelJob::dispatch($this->cacheKey.':'.$getModel->id, $getModel);

            return $getModel;
        }

        throw new static::$exception(
            trans('categories.create.error'),
            ErrorCodeEnum::ERROR_CREATE_RECORD
        );
    }

    public function update(array $data, int|string $model): Model
    {
        if (method_exists($this, 'setAlias')) {
            $this->setAlias($data, 'name');
        }

        if (($getModel = $this->view($model)) && $getModel->update($data)) {
            ModelJob::dispatch($this->cacheKey.':'.$model, $getModel);

            return $getModel;
        }

        throw new static::$exception(
            trans(static::$langPathName.'.update.error', ['id' => $model]),
            ErrorCodeEnum::ERROR_UPDATE_RECORD
        );
    }

    final public function view(int|string $model): Model
    {
        $getModel = false;

        if (is_numeric($model)) {
            $getModel = static::$model::query()->find($model);
        } elseif (method_exists($this, 'setAlias')) {
            $getModel = static::$model::query()->where('alias',
                Str::slug(
                    str_replace($this->config['alias_separator'], ' ', $model),
                    $this->config['alias_separator']
                )
            )->first();
        }

        if ($getModel) {
            ModelJob::dispatch($this->cacheKey.':'.$model, $getModel);

            return $getModel;
        }

        throw new static::$exception(
            trans(static::$langPathName.'.view.not_found', ['id' => $model]),
            ErrorCodeEnum::ERROR_VIEW_RECORD
        );
    }

    final public function delete(int|string $model): bool
    {
        if (($getModel = $this->view($model)) && $getModel->delete()) {
            Cache::forget($this->cacheKey.':'.$model);

            return true;
        }

        throw new static::$exception(
            trans(static::$langPathName.'.delete.error', [':id' => $model]),
            ErrorCodeEnum::ERROR_DELETE_RECORD
        );
    }
}
