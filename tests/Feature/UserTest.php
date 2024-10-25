<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_login(): void
    {
        $user = User::create(['email' => 'test@gmail.com', 'password' => Hash::make('password'), 'name' => 'test']);
        $response = $this->post('api/login', ['email' => $user->email, 'password' => 'password']);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                "name", "token", "email", "id"
            ],
        ]);
    }

    public function test_register(): void
    {
        $user = ['email' => 'test@gmail.com', 'password' => 'password', 'password_confirmation' => 'password', 'name' => 'test'];

        $response = $this->json(
            'POST',
            'api/register',
            $user
        );
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'data' => [
                "name", "token", "email", "id"
            ],
        ]);
    }
}
