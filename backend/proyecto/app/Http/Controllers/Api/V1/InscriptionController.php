<?php

/**
 * Controlador Group_testController de la Api
 * Este controlador sirve para hacer las peticiones pertinentes respecto a las inscripciones de las gymkanas
 * 
 */

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\InscriptionCollection;
use App\Http\Resources\V1\InscriptionResource;
use App\Models\Inscriptions;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function all()
    {
        return response()->json(InscriptionResource::collection(Inscriptions::all()), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $inscription = Inscriptions::create($request->all());
        return response()->json($inscription, 201);
    }

    /**
     * Show the specified resource.
     *
     * @param  \App\Models\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */

    public function show($id_gymkana_instance, $id_participant)
    {
        return response()->json(InscriptionResource::collection(Inscriptions::all()->where("id_gymkana_instance", $id_gymkana_instance)->where("id_participant", $id_participant)));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Inscriptions $inscription)
    {
        $inscription->update($request->all());
        return response()->json($inscription, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */

    public function destroy(Inscriptions $inscription)
    {
        $inscription->delete();
        return response()->json(null, 204);
    }
}
