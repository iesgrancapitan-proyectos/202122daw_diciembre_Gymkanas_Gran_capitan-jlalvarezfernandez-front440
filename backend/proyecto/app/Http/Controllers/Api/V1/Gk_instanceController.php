<?php

/**
 * Controlador GkInstanciaController de la Api
 * Este controlador sirve para hacer las peticiones pertinentes respecto a las instancias de gymkana
 * 
 */

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Gk_instanceCollection;
use App\Http\Resources\V1\Gk_instanceResource;
use App\Http\Resources\V1\GymkanaResource;
use App\Models\Gymkana_instance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Gk_instanceController extends Controller
{
    /**
     * Activate all instancia de gymkana.
     *
     * @return \Illuminate\Http\Response
     */

    public function allActive()
    {
        $date = Carbon::now();
        $date = $date->format('Y-m-d h:i:s');
        return response()->json(Gk_instanceResource::collection(Gymkana_instance::all()->where("finish_date", ">",$date)));
    }

    /**
     * Activate all futures instancia de gymkana.
     *
     * @return \Illuminate\Http\Response
     */

    public function allFuture()
    {
        $date = Carbon::now();
        $date = $date->format('Y-m-d h:i:s');
        return response()->json(Gk_instanceResource::collection(Gymkana_instance::all()->where("start_date", "<",$date)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $gymkana = Gymkana_instance::create($request->all());
        return response()->json($gymkana, 201);
    }

    /**
     * show the specified resource.
     *
     * @param  \App\Models\Gymkana_instance  $gymkana
     * @return \Illuminate\Http\Response
     */

    public function show(Gymkana_instance $gk_instance)
    {

        $date = Carbon::now();
        $date = $date->format('d-m-Y-h-i-s');
        return response()->json(Gk_instanceResource::collection(Gymkana_instance::all()));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gymkana_instance  $Gk_instance
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Gymkana_instance $gk_instance)
    {
        $gk_instance->update($request->all());
        return response()->json($gk_instance, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gymkana  $gymkana
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Gymkana_instance $gk_instance)
    {
        $gk_instance->delete();
        return response()->json(null, 204);
    }

    /**
     * @param  \App\Models\Gymkana  $gymkana
     * @return \Illuminate\Http\Response
     */

    public function getGymkanaByIdInstancia($id)
    {
        return response()->json(Gk_instanceResource::collection(Gymkana_instance::all()->where("id", $id)));
    }
}
