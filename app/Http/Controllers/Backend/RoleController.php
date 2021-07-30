<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\PremissionModel;
use App\Models\Backend\RolesModel;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $rolesModel;
    protected $permissionModel ;

    public function __construct(RolesModel $rolesModel , PremissionModel $premissionModel)
    {
        $this->rolesModel = $rolesModel;
        $this->permissionModel = $premissionModel ;
    }

    public function index()
    {
        $roles = $this->rolesModel->all();
        $data = [];
        $data['roles'] = $roles;
        return view("backend.role.index", $data);
    }

    public function create()
    {
        $parent = $this->permissionModel->where("parent_id" , 0)->get();

        $data = [] ;
        $data['parent'] = $parent ;
        return view("backend.role.create" , $data);
    }
}
