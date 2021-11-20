<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AdminRepository;
class CreateController extends Controller
{
    protected $_admin;
    public function __construct(AdminRepository $admin) {
        $this->_admin = $admin;
    }
    
    public function index(Request $request)
    {
        return view('pages.admin.create');
    }
    
    public function submit(Request $request)
    {
        $this->_admin->created($request);
        $request->session()->flash('status', 'Berhasil Menambahkan Data Admin baru');
        return redirect(route('admin'));
    }
}
