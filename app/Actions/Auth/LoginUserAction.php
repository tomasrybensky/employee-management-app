<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginUserAction
{
    public function execute(string $email, string $password): ?string
    {
        $user = User::where(User::EMAIL, $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => __('Credentials do not match our records')
            ]);
        }

        return $user->createToken('auth')->plainTextToken;
    }
}
