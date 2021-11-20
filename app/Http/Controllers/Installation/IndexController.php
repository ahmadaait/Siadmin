<?php

namespace App\Http\Controllers\Installation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\InstallationRepository;
use App\Models\Installation;
use PDF;

class IndexController extends Controller
{

    protected $_installation;
    public function __construct(InstallationRepository $installation)
    {
        $this->_installation = $installation;
    }

    public function index(Request $request)
    {
        $results =  $this->_installation->getPaginate($request);
        return view('pages.installation.index')->with('installation', $results);
    }
    
    public function cetak_pdf()
    {
        $base = new Installation;
        $base = $base->leftJoin('groups','groups.id','=','installations.group_id');
        $base = $base->leftJoin('admins','admins.id','=','groups.admin_id');
        $base = $base->select('installations.*','groups.group_name as group_name','admins.admin_name as admin_name');
        $base = $base->get();
        $pdf = PDF::loadview('pages.installation.cetak_pdf',['Installation'=>$base]);
        return $pdf->download('report-installation.pdf');
    }
}
