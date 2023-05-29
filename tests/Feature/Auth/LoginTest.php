<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_correct_password(): void
    {
        $email = 'test@test.com';
        $password = 'password';

        User::factory()->create([
            'email' => $email,
            'password' => $password,
        ]);

        $response = $this->postJson(route('login'), [
            'email' => $email,
            'password' => $password,
        ]);

        $response->assertSuccessful();

        $response = json_decode($response->getContent(), true);
        $this->assertTrue(isset($response['data']['token']));
    }

    public function test_login_incorrect_password(): void
    {
        $email = 'test@test.com';
        $password = 'password';

        User::factory()->create([
            'email' => $email,
            'password' => $password,
        ]);

        $response = $this->postJson(route('login'), [
            'email' => $email,
            'password' => 'wrongPassword',
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
