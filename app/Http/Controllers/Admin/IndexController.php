<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AdminRepository;
use App\Models\Admin;
use PDF;

class IndexController extends Controller
{

    protected $_admin;
    public function __construct(AdminRepository $admin)
    {
        $this->_admin = $admin;
    }

    public function index(Request $request)
    {
        $results =  $this->_admin->getPaginate($request);
        return view('pages.admin.index')->with('admins', $results);
    }

    public function cetak_pdf()
    {
        $admin = Admin::all();
        $pdf = PDF::loadview('pages.admin.cetak_pdf',['Admin'=>$admin]);
        return $pdf->download('report-admin.pdf');
    }
}
