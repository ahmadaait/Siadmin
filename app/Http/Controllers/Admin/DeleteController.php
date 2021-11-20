<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AdminRepository;

class DeleteController extends Controller
{

    protected $_admin;
    public function __construct(AdminRepository $admin)
    {
        $this->_admin = $admin;
    }

    public function delete(Request $request, $id)
    {
        $results =  $this->_admin->deleted($id);
        return redirect(route('admin'));
    }
}
