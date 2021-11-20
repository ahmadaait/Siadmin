<?php

namespace App\Http\Controllers\Installation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\InstallationRepository;
use App\Models\Group;
class CreateController extends Controller
{
    protected $_installation;
    public function __construct(InstallationRepository $installation) {
        $this->_installation = $installation;
    }
    
    public function index(Request $request)
    {
        $group = Group::all();
        return view('pages.installation.create')->with('group', $group);
    }
    
    public function submit(Request $request)
    {
        $this->_installation->created($request);
        $request->session()->flash('status', 'Berhasil Menambahkan Data Pemasangan baru');
        return redirect(route('installation'));
    }
}
