<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AdminRepository;
class UpdateController extends Controller
{
    protected $_admin;
    public function __construct(AdminRepository $admin) {
        $this->_admin = $admin;
    }
    
    public function index(Request $request, $id)
    {
        $admin = $this->_admin->getById($id);
        return view('pages.admin.update')->with('admin', $admin);
    }
    
    public function update(Request $request, $id)
    {
        // $this->validation($request);
        $this->_admin->updated($request, $id);
        $request->session()->flash('status', 'Berhasil Melakukan Update Data Admin');
        return redirect(route('admin'));
    }
    // function validation($request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|unique:areas|max:255|min:2'
    //     ]);
    // }
}
