<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Models\User;
use PDF;

class IndexController extends Controller
{
    protected $_user;
    public function __construct(UserRepository $user)
    {
        $this->_user = $user;
    }

    public function index(Request $request)
    {
        $results =  $this->_user->getPaginate($request);
        return view('pages.user.index')->with('users', $results);
    }

    public function cetak_pdf()
    {
        $base = User::all();
        $pdf = PDF::loadview('pages.user.cetak_pdf',['User'=>$base]);
        return $pdf->download('report-user.pdf');
    }
}
