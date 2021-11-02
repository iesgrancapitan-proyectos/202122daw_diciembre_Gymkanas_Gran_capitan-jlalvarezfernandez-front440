<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participants;
use App\Models\Groups;
use App\Models\Gymkana_instance;

class ParticipantController extends Controller{
    /**
     * Show all participants
     * 
     */
    public function all(){
        $participants = Participants::all();
        return view("admin.participants", compact('participants'));
    }

    /**
     * Add a new participant to the DB
     */
    public function add(){
        $groups = Groups::all();
        $gkInstance = Gymkana_instance::all();
        return view("admin.newParticipant", compact("groups", "gkInstance"));
    }

    /**
     * Create a new participant.
     *
     * @param  Request $request
     */
    public function create(Request $request){
        Participants::create([
            'id_group' => $request->id_group,
            'id_gymkana_instance' => $request->id_gymkana_instance,
        ]);
        return redirect("admin/participants")->with("status", "Participante añadido correctamente");    
    }

    /**
     * Destroy a user-group
     * 
     * @param Gymkana $gymkana
     */
    public function destroy($id){
        $participants = Participants::find($id);
        $participants->delete();
    
        return redirect("admin/participants")->with("status", "Participante eliminado correctamente");
    }
}