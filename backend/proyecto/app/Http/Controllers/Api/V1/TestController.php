<?php
/**
 * Controlador TestController de la Api
 * Este controlador sirve para hacer las peticiones pertinentes respecto a los test de las gymkanas
 * 
 */

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TestCollection;
use App\Http\Resources\V1\TestResource;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        return response()->json(TestResource::collection(Test::all()->where("id_gymkana", $id)), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $Test = Test::create($request->all());
        return response()->json($Test, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        return response()->json(TestResource::collection(Test::all()->where("id", $id)));
    }

    /**
     * Display the specified resource.
     *
     * @param   $id_gymkana
     * @return \Illuminate\Http\Response
     */

    public function getTest($id_gymkana)
    {
        return response()->json(TestResource::collection(Test::all()->where("id_gymkana", $id_gymkana)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $Test
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Test $Test)
    {
        $Test->update($request->all());
        return response()->json($Test, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $Test
     * @return \Illuminate\Http\Response
     */

    public function destroy(Test $Test)
    {
        $Test->delete();
        return response()->json(null, 204);
    }
}
