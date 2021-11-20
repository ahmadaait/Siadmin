<?php
namespace App\Repositories;
use App\Models\Payment;

class PaymentRepository
{
   public function getPaginate($request)
   {
      $base = new Payment;
      $base = $base->leftJoin('groups','groups.id','=','payments.group_id');
      $base = $base->leftJoin('admins','admins.id','=','groups.admin_id');
      $base = $base->select('payments.*','groups.group_name as group_name','admins.admin_name as admin_name');
      return $base->get();
   }
   public function created($request)
   {
      $payment = new Payment;
      $payment->group_id = $request->group_id;
      $payment->payment_amount = $request->payment_amount;
      if($request->payment_status != 'Pending')
      {
         $name = time().'.jpg';
         $request->transfer_slip->storeAs('public', $name);
         $payment->transfer_slip = 'storage/'. $name;
      }
      $payment->payment_status = $request->payment_status;
      $payment->save();
      return $payment;
   }
   public function updated($request, $id)
   {
      $payment = Payment::find($id);
      $payment->payment_amount = isset($request->payment_amount) ? $request->payment_amount: $payment->payment_amount;
      if($request->payment_status != 'Pending')
      {
         $name = time().'.jpg';
         $request->transfer_slip->storeAs('public', $name);
         $payment->transfer_slip = 'storage/'. $name;
      }
      else {
         $payment->transfer_slip = null;
      }
      $payment->payment_status = isset($request->payment_status) ? $request->payment_status: $payment->payment_status;
      $payment->save();
      return $payment;
   }
   public function getById($id)
   {
      $payment = Payment::find($id);
      return $payment;
   }
   public function deleted($id):void
   {
      $payment = Payment::find($id);
      $payment->delete();
   }
}
