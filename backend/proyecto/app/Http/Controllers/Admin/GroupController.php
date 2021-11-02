<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Groups;

class GroupController extends Controller{
    /**
     * Show all groups
     * 
     */
    public function all(){
        $groups = Groups::all();
        return view("admin.groups", compact('groups'));
    }

    /**
     * Add a new group to the DB
     */
    public function add(){
        return view("admin.newGroup");
    }

    /**
     * Create a new group.
     *
     * @param  Request $request
     */
    public function create(Request $request){
        Groups::create([
            'description' => $request->description,
        ]);
        return redirect("admin/groups")->with("status", "Grupo añadido correctamente");    
    }

    /**
     * Destroy a gymkana
     * 
     * @param Gymkana $gymkana
     */
    public function destroy($id){
        $group = Groups::find($id);
        $group->delete();
        
        return redirect("admin/groups")->with("status", "Grupo eliminado correctamente");
    }
    
    /**
     * Update view for a group
     * 
     * @param Request $request
     */
    public function edit(Request $request){
        $id = $request->id;
        return view("admin.updateGroup", compact("id"));
    }
    
    /**
     * Update a group
     * 
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $group = Groups::find($id);
        $group->description = $request->description;
        $group->save();
        return redirect("admin/groups")->with("status", "Grupo modificado correctamente");
    }
}