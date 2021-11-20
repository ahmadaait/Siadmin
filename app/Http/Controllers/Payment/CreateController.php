<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PaymentRepository;
use App\Models\Group;
class CreateController extends Controller
{
    protected $_payment;
    public function __construct(PaymentRepository $payment) {
        $this->_payment = $payment;
    }
    
    public function index(Request $request)
    {
        $groupDetail = Group::orderBy('id','asc')->first();
        if(isset($request->groupId) && $request->groupId != null){
            $groupDetail = Group::find($request->groupId);
        }
        $group = Group::all();
        return view('pages.payment.create',[
            'group' => $group,
            'groupDetail' => $groupDetail
        ]);
    }
    
    public function submit(Request $request)
    {
        $this->_payment->created($request);
        $request->session()->flash('status', 'Berhasil Menambahkan Data Pembayaran baru');
        return redirect(route('payment'));
    }
}
