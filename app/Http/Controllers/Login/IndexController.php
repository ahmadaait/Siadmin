<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{

    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        return view('pages.login.login');
    }

    public function submit(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        // dd($email . ' ' . $password);
        $user = User::where('email' , $email)->where('password' , $password)->first();
        if($user != null)
        {
            $request->session()->put('uid',$user->id);
            $request->session()->put('name',$user->user_name);
            $request->session()->put('role',$user->user_role);
            
            // check middleware
            // if($user->user_role == 'admin'){
            //     return redirect('/');
            // }
            // else if($user->user_role == 'konsumen'){
            //     return redirect('/konsumen');
            // }
            // else if($user->user_role == 'produsen'){
            //     return redirect('/produsen');
            // }
            return redirect('/');
        }
        else
        {
            $request->session()->forget('uid');
            return redirect('/login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('uid');
        return redirect('/login');
    }
}
