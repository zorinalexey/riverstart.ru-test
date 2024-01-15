<?php

namespace App\Http\Resources\Api\V1\Common;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class PaginatorMetaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            /** @var LengthAwarePaginator $this */
            'current_page' => $this->currentPage(),
            'last_page' => $this->lastPage(),
            'per_page' => $this->perPage(),
            'total' => $this->total(),
            'from' => $this->firstItem(),
            'to' => $this->lastItem(),
        ];
    }
}
