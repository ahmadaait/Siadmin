<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
class UpdateController extends Controller
{
    protected $_user;
    public function __construct(UserRepository $user) {
        $this->_user = $user;
    }
    
    public function index(Request $request, $id)
    {
        $user = $this->_user->getById($id);
        return view('pages.user.update')->with('user', $user);
    }
   
    public function update(Request $request, $id)
    {
        // $this->validation($request);
        $this->_user->updated($request, $id);
        $request->session()->flash('status', 'Berhasil Melakukan Update Data User');
        return redirect(route('user'));
    }
    // function validation($request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|unique:areas|max:255|min:2'
    //     ]);
    // }
}
