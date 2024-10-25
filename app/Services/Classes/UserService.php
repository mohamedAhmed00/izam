<?php

namespace App\Services\Classes;

use App\Filters\Name;
use App\Filters\Price;
use App\Models\Product;
use App\Models\User;
use App\Services\Interfaces\IProductService;
use App\Services\Interfaces\IUserService;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class UserService implements IUserService
{
    public function login($data)
    {
        $user = User::where('email', $data['email'])->firstOrFail();
        $checkPassword = Hash::check($data['password'], $user->password);
        if ($checkPassword == false) {
            Throw new \Exception(__('User data not match any user'));
        }
        return $user;
    }

    public function register($data)
    {
        return User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
