<?php

/**
 * Controlador UserGroupController
 * Este controlador sirve para controlar los grupos que van aparticipar en la app
 *    - podemos editarlos o eliminarlos
 *     
 * 
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_Groups;
use App\Models\User;
use App\Models\Groups;

class UserGroupController extends Controller{
    /**
     * Show all user-group
     * 
     */

    public function all(){
        $users_groups = User_groups::all();
        return view("admin.usersGroups", compact('users_groups'));
    }

    /**
     * Add a new user-group to the DB
     */

    public function add(){
        $users = User::all()->where("perfil", "alumno");
        $groups = Groups::all();
        return view("admin.newUserGroup", compact("users", "groups"));
    }

    /**
     * Create a new user-group.
     *
     * @param  Request $request
     */

    public function create(Request $request){
        User_groups::create([
            'id_user' => $request->id_user,
            'id_group' => $request->id_group,
        ]);
        return redirect("admin/users-groups")->with("status", "Grupo añadido correctamente");
    }

    /**
     * Destroy a user-group
     * 
     * @param Gymkana $gymkana
     */

    public function destroy($id){
        $group =User_groups::find($id);
        $group->delete();
    
        return redirect("admin/users-groups")->with("status", "Grupo de Usuarios eliminado correctamente");
    }
    
    /**
     * Edit view for an user-group
     * 
     * @param Request $request
     */

    public function edit(Request $request){
        $id = $request->id;
        return view("admin.updateUserGroup", compact("id"));
    }
    
    /**
     * Update a group
     * 
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $group = User_groups::find($id);
        $group->id_group = $request->id_group;
        $group->save();
        return redirect("admin/users-groups")->with("status", "Grupo modificado correctamente");
    }

}