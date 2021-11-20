<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PaymentRepository;
class UpdateController extends Controller
{
    protected $_payment;
    public function __construct(PaymentRepository $payment) {
        $this->_payment = $payment;
    }
    
    public function index(Request $request, $id)
    {
        $payment = $this->_payment->getById($id);
        return view('pages.payment.update')->with('payment', $payment);
    }
    
    public function update(Request $request, $id)
    {
        // $this->validation($request);
        $this->_payment->updated($request, $id);
        $request->session()->flash('status', 'Berhasil Melakukan Update Data Pembayaran');
        return redirect(route('payment'));
    }
    // function validation($request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|unique:areas|max:255|min:2'
    //     ]);
    // }
}
