<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\AbstractApiController;
use App\Services\CRUDServiceInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

abstract class AbstractApiV1CRUDController extends AbstractApiController
{
    final public function create(CRUDServiceInterface $service, FormRequest $request,  string $modelName): JsonResponse
    {

    }

    final public function update(CRUDServiceInterface $service, FormRequest $request, string|int $model, string $modelName): JsonResponse
    {

    }

    final public function delete(CRUDServiceInterface $service, string|int $model, string $modelName): JsonResponse
    {

    }

    final public function list(CRUDServiceInterface $service, FormRequest $filterData, string $modelName): JsonResponse
    {

    }

    final public function view(CRUDServiceInterface $service, string|int $model, string $modelName): JsonResponse
    {

    }
}
