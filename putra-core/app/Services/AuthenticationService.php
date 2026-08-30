<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationService
{
    public function login(string $email, string $password): array
    {
        $user = User::where('email', $email)->first();
        if (! $user) {
            return [
                'success' => false,
                'message' => 'Email salah.',
            ];
        }

        if (!Hash::check($password, $user->password)) {
            return [
                'success' => false,
                'message' => 'Password salah.',
            ];
        }

        Auth::login($user);

        return [
            'success' => true,
            'message' => 'Login berhasil.',
            'user' => $user,
        ];
    }
}
