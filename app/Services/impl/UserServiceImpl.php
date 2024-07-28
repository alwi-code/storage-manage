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
            Auth::loginUsingId($user->user_id);

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

    public function getUsers()
    {
        return DB::table('users')->where('role','user')->get();
    }

    public function storeUser($request)
    {
        DB::table('users')->insert([
            'username' => $request->username,
            'password' => Hash::make('ptteam2'),
            'role' => $request->role,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function getUserById($id)
    {
        return DB::table('users')->where('user_id', $id)->first();
    }

    public function updateUserById($request, $id)
    {
        $data = [
            'username' => $request->username,
            'role' => $request->role,
            'updated_at' => now(),
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        DB::table('users')->where('user_id', $id)->update($data);
    }

    public function deleteUser($id)
    {
        DB::table('users')->where('user_id', $id)->delete();
    }

    public function updatePassword($request)
    {
        $user = Auth::user();

        DB::table('users')
            ->where('user_id', $user->user_id)
            ->update(['password' => Hash::make($request->new_password)]);
    }
    
}