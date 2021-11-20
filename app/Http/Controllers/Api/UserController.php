<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Models\User;

class UserController extends Controller
{
    protected $_user;
    public function __construct(UserRepository $user) {
        $this->_user = $user;
    }
    
    public function index(Request $request)
    {
        // dd($request->sensor);
        // $data = [
        //     'id'                => 1,
        //     'name'              => 'Budi'
        // ];

        // $data = array(
        //     [
        //         'id'                => 1,
        //         'name'              => 'Budi'
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'yanto'
        //     ]
        // );

        $user = [
            'id' => $request->id,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => $request->password
        ];
        $user = User::get();
        // $user = $this->_user->getPaginate($request);
        // $user = User::find($request->id);
        return response()->json(['data' => $user]);
    }

    public function submit(Request $request)
    {
        $this->_user->created($request);
        $request->session()->flash('status', 'Berhasil Menambahkan Data User baru');
        return redirect(route('user'));
    }
}