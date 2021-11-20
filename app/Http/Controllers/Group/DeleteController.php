<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\GroupRepository;

class DeleteController extends Controller
{

    protected $_group;
    public function __construct(GroupRepository $group)
    {
        $this->_group = $group;
    }

    public function delete(Request $request, $id)
    {
        $results =  $this->_group->deleted($id);
        return redirect(route('group'));
    }
}
