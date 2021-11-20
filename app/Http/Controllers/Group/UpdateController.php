<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\GroupRepository;
class UpdateController extends Controller
{
    protected $_group;
    public function __construct(GroupRepository $group) {
        $this->_group = $group;
    }
    
    public function index(Request $request, $id)
    {
        $group = $this->_group->getById($id);
        return view('pages.group.update')->with('group', $group);
    }
    
    public function update(Request $request, $id)
    {
        // $this->validation($request);
        $this->_group->updated($request, $id);
        $request->session()->flash('status', 'Berhasil Melakukan Update Data Grup');
        return redirect(route('group'));
    }
    // function validation($request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|unique:areas|max:255|min:2'
    //     ]);
    // }
}
