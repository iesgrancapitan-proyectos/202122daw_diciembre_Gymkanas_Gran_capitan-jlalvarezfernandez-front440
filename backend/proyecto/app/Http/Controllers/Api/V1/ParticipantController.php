<?php
/**
 * Controlador ParticipantController de la Api
 * Este controlador sirve para hacer las peticiones pertinentes respecto a los participantes de las gymkanas
 * 
 */

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ParticipantCollection;
use App\Http\Resources\V1\ParticipantResource;
use App\Models\Participants;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return response()->json(ParticipantResource::collection(Participants::all()), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $participant = Participants::create($request->all());
        return response()->json($participant, 201);
    }
    

    /**
     * Show the specified resource.
     *
     * @param  \App\Models\Participants  $participant
     * @return \Illuminate\Http\Response
     */

    public function show($id_group)
    {
        return response()->json(ParticipantResource::collection(Participants::all()->where('id_group', $id_group)));
    }

    /**
     * Get participant by id
     *
     * @param  $id
     */
    public function getParticipantById($id)
    {
        return response()->json(ParticipantResource::collection(Participants::all()->where("id", $id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participants  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participants $participant)
    {
        $participant->update($request->all());
        return response()->json($participant, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participants  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participants $participant)
    {
        $participant->delete();
        return response()->json(null, 204);
    }

    public function getShowParticipant($id_gymkana_instance, $id_group)
    {
        return response()->json(ParticipantResource::collection(Participants::all()->where("id_gymkana_instance", $id_gymkana_instance)->where("id_group", $id_group)));

    }

}
