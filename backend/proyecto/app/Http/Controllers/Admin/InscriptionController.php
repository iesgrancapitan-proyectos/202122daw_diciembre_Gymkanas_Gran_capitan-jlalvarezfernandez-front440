<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscriptions;

class InscriptionController extends Controller{
    /**
     * Show all participants
     * 
     */
    public function all(){
        $inscriptions = Inscriptions::all();
        return view("admin.inscriptions", compact('inscriptions'));
    }

    /**
     * Accept an inscription.
     *
     * @param  Request $request
     * @param $id
     */
    public function accept(Request $request, $id){
       $inscription = Inscriptions::find($id);
       $inscription->checkup = 1;
       $inscription->save();
        return redirect("admin/inscriptions")->with("status", "Inscripcion aceptada correctamente");    
    }

    /**
     * Deny an inscription.
     * 
     * @param Gymkana $gymkana
     */
    public function deny($id){
        $inscription = Inscriptions::find($id);
        $inscription->delete();
        return redirect("admin/inscriptions")->with("status", "Inscripcion eliminada correctamente");
    }
}