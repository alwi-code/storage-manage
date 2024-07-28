<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        return response()
        ->view('users.login',[
            "title" => 'Login'
        ]);
    }

    public function doLogin(Request $request)
    {
        $username = $request->input('user');
        $password = $request->input('password');

        // validate 
        if(empty($username) || empty($password))
        {
            return response()->view('users.login',[
                "title" => "Login",
                "error" => "User or password is required"
            ]);
        }
        
        $result = $this->userService->login($username, $password);

        if ($result['status']) {
            $request->session()->put('user', $username);
            return redirect('/');
        } else {
            return response()->view('users.login',[
                "title" => "Login",
                "error" => $result['message'],
            ]);
        }


    }

    public function doLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->forget('user');
        return redirect('/');
    }
}
