<?php
namespace App\Repositories;
use App\Models\Admin;

class AdminRepository
{
   public function getPaginate($request)
   {
      $base = new Admin;
      return $base->get();
   }
   public function created($request)
   {
      $admin = new Admin;
      $admin->admin_name = $request->admin_name;
      $admin->bank_name = $request->bank_name;
      $admin->rekening_number = $request->rekening_number;
      $admin->bank_personal_name = $request->bank_personal_name;
      $admin->save();
      return $admin;
   }
   public function updated($request, $id)
   {
      $admin = Admin::find($id);
      $admin->admin_name = isset($request->admin_name) ? $request->admin_name: $admin->admin_name;
      $admin->bank_name = isset($request->bank_name) ? $request->bank_name: $admin->bank_name;
      $admin->rekening_number = isset($request->rekening_number) ? $request->rekening_number: $admin->rekening_number;
      $admin->bank_personal_name = isset($request->bank_personal_name) ? $request->bank_personal_name: $admin->bank_personal_name;
      $admin->save();
      return $admin;
   }
   public function getById($id)
   {
      $admin = Admin::find($id);
      return $admin;
   }
   public function deleted($id):void
   {
      $admin = Admin::find($id);
      $admin->delete();
   }
}
