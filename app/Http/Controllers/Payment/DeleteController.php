<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PaymentRepository;

class DeleteController extends Controller
{

    protected $_payment;
    public function __construct(PaymentRepository $payment)
    {
        $this->_payment = $payment;
    }

    public function delete(Request $request, $id)
    {
        $results =  $this->_payment->deleted($id);
        return redirect(route('payment'));
    }
}
