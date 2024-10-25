<?php

namespace App\Services\Interfaces;

interface IUserService
{
    public function login($data);

    public function register($data);
}
