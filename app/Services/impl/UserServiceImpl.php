<?php

namespace App\Services\Impl;

use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserServiceImpl implements UserService
{

    public function login(string $username, string $password)
    {

        $user = DB::table('users')->where('username', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            
            return [
                'status' => true,
                'message' => 'Login berhasil',
                'user' => $user,
            ];
        }

        return [
            'status' => false,
            'message' => 'Username atau password salah',
        ];
    }
    
}