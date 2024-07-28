<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        if($request->session()->exists('user')){
            return response()->json([
                'status' => true,
                'message' => "ok"
            ]);
        }else{
            return redirect('/login');
        }
    }
}
