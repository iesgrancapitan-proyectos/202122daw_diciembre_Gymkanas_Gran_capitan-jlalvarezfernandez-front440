<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\GymkanaCollection;
use App\Http\Resources\V1\GymkanaResource;
use App\Models\Gymkana;
use Illuminate\Http\Request;

class GymkanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(GymkanaResource::collection(Gymkana::all()), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gymkana = Gymkana::create($request->all());
        return response()->json($gymkana, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gymkana  $gymkana
     * @return \Illuminate\Http\Response
     */
    public function show(Gymkana $gymkana)
    {
        return response()->json(GymkanaResource::collection(Gymkana::find($gymkana))); //all()->where()
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gymkana  $gymkana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gymkana $gymkana)
    {
        $gymkana->update($request->all());
        return response()->json($gymkana, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gymkana  $gymkana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gymkana $gymkana)
    {
        $gymkana->delete();
        return response()->json(null, 204);
    }
}
