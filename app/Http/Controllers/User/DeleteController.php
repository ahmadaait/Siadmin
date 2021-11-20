<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class DeleteController extends Controller
{

    protected $_user;
    public function __construct(UserRepository $user)
    {
        $this->_user = $user;
    }

    public function delete(Request $request, $id)
    {
        $results =  $this->_user->deleted($id);
        return redirect(route('user'));
    }
}
