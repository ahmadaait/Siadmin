<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
class CreateController extends Controller
{
    protected $_user;
    public function __construct(UserRepository $user) {
        $this->_user = $user;
    }
    
    public function index(Request $request)
    {
        return view('pages.user.create');
    }
    
    public function submit(Request $request)
    {
        $this->_user->created($request);
        $request->session()->flash('status', 'Berhasil Menambahkan Data User baru');
        return redirect(route('user'));
    }
}
