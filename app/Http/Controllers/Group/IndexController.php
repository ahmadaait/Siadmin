<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\GroupRepository;
use App\Models\Group;
use PDF;

class IndexController extends Controller
{

    protected $_group;
    public function __construct(GroupRepository $group)
    {
        $this->_group = $group;
    }

    public function index(Request $request)
    {
        $results =  $this->_group->getPaginate($request);
        return view('pages.group.index')->with('groups', $results);
    }

    public function cetak_pdf()
    {
        $base = new Group;
        $base = $base->leftJoin('admins','admins.id','=','groups.admin_id');
        $base = $base->select('groups.*','admins.admin_name as admin_name');
        $base = $base->get();
        $pdf = PDF::loadview('pages.group.cetak_pdf',['Group'=>$base]);
        return $pdf->download('report-group.pdf');
    }
}
