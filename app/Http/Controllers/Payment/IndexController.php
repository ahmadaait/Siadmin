<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PaymentRepository;
use App\Models\Payment;
use PDF;

class IndexController extends Controller
{

    protected $_payment;
    public function __construct(PaymentRepository $payment)
    {
        $this->_payment = $payment;
    }

    public function index(Request $request)
    {
        $results =  $this->_payment->getPaginate($request);
        return view('pages.payment.index')->with('payments', $results);
    }

    public function cetak_pdf()
    {
        $base = new Payment;
        $base = $base->leftJoin('groups','groups.id','=','payments.group_id');
        $base = $base->leftJoin('admins','admins.id','=','groups.admin_id');
        $base = $base->select('payments.*','groups.group_name as group_name','admins.admin_name as admin_name');
        $base = $base->get();
        $pdf = PDF::loadview('pages.payment.cetak_pdf',['Payment'=>$base]);
        return $pdf->download('report-payment.pdf');
    }
}
