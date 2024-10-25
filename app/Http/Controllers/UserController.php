<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\UserResource;
use App\Services\Interfaces\IUserService;

class UserController extends Controller
{
    public function __construct(private readonly IUserService $userService)
    {
    }

    public function login(LoginRequest $loginRequest){
        return new UserResource($this->userService->login($loginRequest->validated()));
    }

    public function register(RegisterRequest $registerRequest){
        return new UserResource($this->userService->register($registerRequest->validated()));
    }
}
