<?php
namespace App\Repositories;
use App\Models\Group;

class GroupRepository
{
   public function getPaginate($request)
   {
      $base = new Group;
      $base = $base->leftJoin('admins','admins.id','=','groups.admin_id');
      $base = $base->select('groups.*','admins.admin_name as admin_name');
      return $base->get();
   }
   public function created($request)
   {
      $group = new Group;
      $group->admin_id = $request->admin_id;
      $group->group_name = $request->group_name;
      $group->group_link = $request->group_link;
      $group->total_member = $request->total_member;
      $group->payment_price = $request->payment_price;
      $group->save();
      return $group;
   }
   public function updated($request, $id)
   {
      $group = Group::find($id);
      $group->group_name = isset($request->group_name) ? $request->group_name: $group->group_name;
      $group->group_link = isset($request->group_link) ? $request->group_link: $group->group_link;
      $group->total_member = isset($request->total_member) ? $request->total_member: $group->total_member;
      $group->payment_price = isset($request->payment_price) ? $request->payment_price: $group->payment_price;
      $group->save();
      return $group;
   }
   public function getById($id)
   {
      $group = Group::find($id);
      return $group;
   }
   public function deleted($id):void
   {
      $group = Group::find($id);
      $group->delete();
   }
}
