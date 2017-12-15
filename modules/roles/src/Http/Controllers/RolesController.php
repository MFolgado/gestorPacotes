<?php

namespace Blit\Roles\Http\Controllers;

use App\Http\Controllers\Controller;
use Blit\Accounts\Models\Account;
use Blit\Domains\Models\Domain;
use Blit\Domains\Models\Permission;
use Blit\Roles\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index(){

        $roles = Role::paginate(10);

        return view('BlitRoles::roles.index', compact('roles'));
    }


    public function create(){

        $accounts = Account::all();

        return view('BlitRoles::roles.create', compact('accounts'));
    }


    public function store(Request $request)
    {
        Role::create($request->all());

        return redirect(route('roles.index'));
    }


    public function permissions($id){

        $role = Role::find($id);
        $permissions = Permission::all();
        $domains = Domain::all();

        return view('BlitRoles::roles.permissions', compact('role','permissions', 'domains'));
    }

    public function tooglePermissions(Request $request){

        $input = $request->all();
        $role = Role::find($input['role_id']);
        $permission = Permission::find($input['permission_id']);

        if($role->permissions()->find($permission->id)){
            $role->permissions()->detach($permission->id);
        }else{
            $role->permissions()->attach($permission->id, ['active' => 1]);
        }



        return json_encode($role);

    }



}
