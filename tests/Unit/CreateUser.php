<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\Interfaces\IUserService;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\TestCase;

class CreateUser extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_register_user(): void
    {
        $service = resolve(IUserService::class);
        $service->register([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => Hash::make('password'),
        ]);
        $user = User::where('email', 'john@doe.com')->first();
        $this->assertEquals($user->email, 'john@doe.com');
        $this->assertTrue(true);
    }
}
