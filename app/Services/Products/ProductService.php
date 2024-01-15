<?php

namespace App\Services\Products;

use App\Exceptions\ProductException;
use App\Filters\CategoryFilter;
use App\Jobs\Cache\ModelJob;
use App\Models\Product;
use App\Services\CRUD\CRUDService;
use App\Utils\Enums\ErrorCodeEnum;
use App\Utils\Traits\Aliasable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

final class ProductService extends CRUDService implements ProductServiceInterface
{
    use Aliasable;

    protected static string $model = Product::class;

    protected static string $filter = CategoryFilter::class;

    protected static string $exception = ProductException::class;

    protected static string $langPathName = 'products';

    protected string $cacheKey;

    public function __construct()
    {
        parent::__construct();
        $this->cacheKey = (new Product())->getTable();
    }

    public function create(array $data): Product|Model
    {
        $this->setAlias($data, 'name');
        $productCategoryIds = array_values(Arr::pull($data, 'categories'));

        if (count($productCategoryIds) < 2) {
            throw new self::$exception(
                trans('products.create.error_sync', ['count' => 2]),
                ErrorCodeEnum::ERROR_UPDATE_RECORD
            );
        }

        DB::beginTransaction();
        /** @var Product $product */
        if ($product = Product::query()->create($data)) {
            if (! $product->categories()->sync($productCategoryIds)) {
                DB::rollBack();

                throw new self::$exception(
                    trans('products.update.error', ['id' => $product]),
                    ErrorCodeEnum::ERROR_UPDATE_RECORD
                );
            }

            DB::commit();
            ModelJob::dispatch($this->cacheKey.':'.$product->id, $product);

            return $product;
        }

        throw new self::$exception(
            trans('products.create.error'),
            ErrorCodeEnum::ERROR_CREATE_RECORD
        );
    }

    public function update(array $data, int|string $product): Product|Model
    {
        $this->setAlias($data, 'name');
        $productCategoryIds = array_values(Arr::pull($data, 'categories'));

        if (count($productCategoryIds) < 2) {
            throw new self::$exception(
                trans('products.update.error_sync', ['product' => $product, 'count' => 2]),
                ErrorCodeEnum::ERROR_UPDATE_RECORD
            );
        }

        DB::beginTransaction();
        /** @var Product $getProduct */
        if (($getProduct = $this->view($product)) && $getProduct->update($data)) {
            if (! $getProduct->categories()->sync($productCategoryIds)) {
                DB::rollBack();

                throw new self::$exception(
                    trans('products.update.error', ['id' => $product]),
                    ErrorCodeEnum::ERROR_UPDATE_RECORD
                );
            }

            DB::commit();
            ModelJob::dispatch($this->cacheKey.':'.$getProduct->id, $getProduct);

            return $getProduct;
        }

        throw new self::$exception(
            trans('products.update.error', compact('product')),
            ErrorCodeEnum::ERROR_UPDATE_RECORD
        );
    }
}
