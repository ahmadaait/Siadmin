<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\GroupRepository;
use App\Models\Admin;
class CreateController extends Controller
{
    protected $_group;
    public function __construct(GroupRepository $group) {
        $this->_group = $group;
    }
    
    public function index(Request $request)
    {
        $admin = Admin::all();
        return view('pages.group.create')->with('admin', $admin);

    }
    
    public function submit(Request $request)
    {
        $this->_group->created($request);
        $request->session()->flash('status', 'Berhasil Menambahkan Data Grup baru');
        return redirect(route('group'));
    }
}
