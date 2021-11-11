<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\User_groupCollection;
use App\Http\Resources\V1\User_groupResource;
use App\Models\User_groups;
use Illuminate\Http\Request;

class User_groupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User_groupResource::collection(User_groups::all()), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_group = User_groups::create($request->all());
        return response()->json($user_group, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_groups  $user_User_group
     * @return \Illuminate\Http\Response
     */
    public function show($id_user)
    {
        return response()->json(User_groupResource::collection(User_groups::all()->where('id_user', $id_user)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User_groups  $user_User_group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_groups $user_group)
    {
        $user_group->update($request->all());
        return response()->json($user_group, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_groups  $user_User_group
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_groups $user_group)
    {
        $user_group->delete();
        return response()->json(null, 204);
    }
      /**
     * Display the specified resource.
     *
     * @param  $id
     */
    public function getUserGroupById($id)
    {
        return response()->json(User_groupResource::collection(User_groups::all()->where("id_user", $id)));
    } 

    /**
     * 
     */
    public function getAllUserGroup()
    {
        return response()->json(User_groupResource::collection(User_groups::all()));
        
    }
}
