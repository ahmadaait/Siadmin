<?php
namespace App\Repositories;
use App\Models\Installation;

class InstallationRepository
{
   public function getPaginate($request)
   {
      $base = new Installation;
      $base = $base->leftJoin('groups','groups.id','=','installations.group_id');
      $base = $base->leftJoin('admins','admins.id','=','groups.admin_id');
      $base = $base->select('installations.*','groups.group_name as group_name','admins.admin_name as admin_name');
      return $base->get();
   }
   public function created($request)
   {
      $installation = new Installation;
      $installation->group_id = $request->group_id;
      $installation->installation_date = $request->installation_date;
      $installation->save();
      return $installation;
   }
   public function updated($request, $id)
   {
      $installation = Installation::find($id);
      $installation->installation_date = isset($request->installation_date) ? $request->installation_date: $installation->installation_date;
      $installation->save();
      return $installation;
   }
   public function getById($id)
   {
      $installation = Installation::find($id);
      return $installation;
   }
   public function deleted($id):void
   {
      $installation = Installation::find($id);
      $installation->delete();
   }
}
