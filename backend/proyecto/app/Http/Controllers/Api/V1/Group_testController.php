<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Group_testCollection;
use App\Http\Resources\V1\Group_testResource;
use App\Models\Groups_test;
use Illuminate\Http\Request;

class Group_testController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Group_testResource::collection(Groups_test::all()), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group_test = Groups_test::create($request->all());
        return response()->json($group_test, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Groups_test  $Group_test
     * @return \Illuminate\Http\Response
     */
    public function show(Groups_test $group_test)
    {
        return response()->json(Group_testResource::collection(Groups_test::find($group_test)));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Groups_test  $Group_test
     * @return \Illuminate\Http\Response
     */
    public function getResponses($id_group, $id_test)
    {
        return response()->json(Group_testResource::collection(Groups_test::all()->where("id_group", $id_group)->where("id_test", $id_test)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Groups_test  $group_test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groups_test $group_test)
    {
        $group_test->update($request->all());
        return response()->json($group_test, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group_test  $Group_test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groups_test $group_test)
    {
        $group_test->delete();
        return response()->json(null, 204);
    }
}
