<?php

namespace App\Http\Controllers\Installation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\InstallationRepository;
class UpdateController extends Controller
{
    protected $_installation;
    public function __construct(InstallationRepository $installation) {
        $this->_installation = $installation;
    }
    
    public function index(Request $request, $id)
    {
        $installation = $this->_installation->getById($id);
        return view('pages.installation.update')->with('installation', $installation);
    }
    
    public function update(Request $request, $id)
    {
        // $this->validation($request);
        $this->_installation->updated($request, $id);
        $request->session()->flash('status', 'Berhasil Melakukan Update Data Pemasangan');
        return redirect(route('installation'));
    }
    // function validation($request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|unique:areas|max:255|min:2'
    //     ]);
    // }
}
