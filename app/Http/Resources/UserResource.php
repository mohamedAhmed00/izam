<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'token' => $this->createToken($this->name)?->plainTextToken,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
