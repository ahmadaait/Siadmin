<?php

namespace App\Http\Controllers\Installation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\InstallationRepository;

class DeleteController extends Controller
{

    protected $_installation;
    public function __construct(InstallationRepository $installation)
    {
        $this->_installation = $installation;
    }

    public function delete(Request $request, $id)
    {
        $results =  $this->_installation->deleted($id);
        return redirect(route('installation'));
    }
}
