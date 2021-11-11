<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\GroupCollection;
use App\Http\Resources\V1\GroupResource;
use App\Models\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return response()->json(GroupResource::collection(Groups::all(), 200));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Group = Groups::create($request->all());
        return response()->json($Group, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function getGroupDescription($id)
    {
        return response()->json(GroupResource::collection(Groups::all()->where("id", $id)));
    }

    /**
     * Display the specified resource.
     *
     * @param   $id_gymkana
     * @return \Illuminate\Http\Response
     */
    public function getGroup($id_gymkana)
    {
        return response()->json(GroupResource::collection(Groups::all()->where("id_gymkana", $id_gymkana)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $Group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groups $Group)
    {
        $Group->update($request->all());
        return response()->json($Group, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $Group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groups $Group)
    {
        $Group->delete();
        return response()->json(null, 204);
    }

    /**
     * 
     */
    public function getDescriptionById($id)
    {
        return response()->json(GroupResource::collection(Groups::all()->where("id", $id)));
    }
}
