<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Group;
use App\Models\User;

class IndexController extends Controller
{

    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        $name = $request->session()->get('name');
        $user = User::count();
        $group = Group::count();
        $admin = Admin::count();
        $data = ['user'=>$user, 'name'=>$name, 'group'=>$group, 'admin'=>$admin];
        return view('index')->with('data', $data);
    }
}
