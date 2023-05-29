<?php

namespace App\Http\Controllers\Api;

use App\Actions\Auth\LoginUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        return response()->json([
            'data' => [
                'token' => app(LoginUserAction::class)->execute(
                    $request->email,
                    $request->password
                )
            ],
        ]);
    }
}
