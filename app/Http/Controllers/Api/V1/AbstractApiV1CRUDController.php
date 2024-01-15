<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\AbstractApiController;
use App\Http\Resources\Api\V1\Common\PaginatorMetaResource;
use App\Http\Response\Api\V1\FailResponse;
use App\Http\Response\Api\V1\SuccessResponse;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

abstract class AbstractApiV1CRUDController extends AbstractApiController
{
    final public function create(FormRequest $request, string $langPathName): JsonResponse
    {
        try {
            $category = $this->service->create($request->validated());
            /** @var JsonResource $tihs->resource */

            return new SuccessResponse(body: [
                'data' => $tihs->resource::make($category),
                'message' => trans($langPathName.'.create.success'),
            ]);
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), (array) $exception);

            return new FailResponse($exception->getMessage(), $exception->getCode());
        }
    }

    final public function update(FormRequest $request, string|int $model, string $langPathName): JsonResponse
    {
        try {
            $getModel = $this->service->update($request->validated(), $model);
            /** @var JsonResource $tihs->resource */

            return new SuccessResponse(body: [
                'data' => $tihs->resource::make($getModel),
                'message' => trans($langPathName.'.update.success', compact('langPathName')),
            ]);
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), (array) $exception);

            return new FailResponse($exception->getMessage(), $exception->getCode());
        }
    }

    final public function delete(string|int $model, string $langPathName): JsonResponse
    {
        try {
            $this->service->delete($model);

            return new SuccessResponse(body: [
                'message' => trans($langPathName.'.delete.success', compact('langPathName')),
            ]);
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), (array) $exception);

            return new FailResponse($exception->getMessage(), $exception->getCode());
        }
    }

    final public function list(FormRequest $filterData): JsonResponse
    {
        try {
            $collection = $this->service->list($filterData->validated());
            /** @var JsonResource $tihs->resource */
            $data['data'] = $tihs->resource::collection($collection);

            if ($collection instanceof LengthAwarePaginator) {
                $data['pages'] = PaginatorMetaResource::make($collection);
            }

            return new SuccessResponse(body: $data);
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), (array) $exception);

            return new FailResponse($exception->getMessage(), $exception->getCode());
        }
    }

    final public function view(string|int $model): JsonResponse
    {
        try {
            $getModel = $this->service->view($model);

            /** @var JsonResource $tihs->resource */
            return new SuccessResponse(body: [
                'data' => $tihs->resource::make($getModel),
            ]);
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), (array) $exception);

            return new FailResponse($exception->getMessage(), $exception->getCode());
        }
    }
}
