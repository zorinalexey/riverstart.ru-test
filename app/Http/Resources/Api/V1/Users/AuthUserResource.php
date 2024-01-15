<?php

namespace App\Http\Resources\Api\V1\Users;

use Illuminate\Http\Resources\Json\JsonResource;

final class AuthUserResource extends JsonResource
{
    private const LOCAL_AUTH = 'auth-token';

    public function toArray($request): array
    {
        return [
            'user' => UserResource::make($this),
            'token' => $this->createToken(self::LOCAL_AUTH)->plainTextToken,
        ];
    }
}
