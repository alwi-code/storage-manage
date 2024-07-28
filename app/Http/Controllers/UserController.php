<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function index()
    {
        $users = $this->userService->getUsers();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:users',
            'role' => 'required|string|in:admin,user',
        ]);

        $this->userService->storeUser($request);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:users,username,' . $id . ',user_id',
            'password' => 'nullable|string|min:6',
            'role' => 'required|string|in:admin,user',
        ]);

        $this->userService->updateUserById($request, $id);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function showChangePasswordForm()
    {
        return view('users.change_password');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        return redirect()->back()->with('success', 'Password changed successfully');
    }
}
