<?php
/**
 * Controlador GymkanaController
 * Este controlador sirve para controlar el manejo de la parte de los alumnos participantes en cada gymkana.
 *    - Podemos inscribirnos en una gymkana.
 *    - Ver tods las gymkanas existentes.
 * 
 */

namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gymkana;
use App\Models\Gymkana_instance;
use Carbon\Carbon;

class GymkanaController extends Controller{

    /**
     * Show all gymkanas
     * 
     */

    public function all(){
        $date = Carbon::now();
        $gymkanas = Gymkana::all()->where('finis_date','>',$date);
        return view("alumno.gymkanas", compact('gymkanas'));
    }

    /**
     * Add a new gymkana to the DB
     */

    public function add(){
        return view("admin.newGymkana");
    }
    
    /**
     * Edit view for a gymkana
     * 
     * @param Request $request
     */

    public function edit(Request $request){
        $id = $request->id;
        return view("admin.updateGk", compact("id"));
    }
    
    /**
     * Update a gymkana
     * 
     * @param Gymkana $gymkana
     */

    public function update(Request $request, $id){
        $gymkana = Gymkana::find($id);
        $gymkana->name = $request->name;
        $gymkana->description = $request->description;
        $gymkana->type = $request->type;
        $gymkana->period = $request->period;
        $gymkana->save();
        return redirect("admin/gymkanas")->with("status", "Gymkana modificada correctamente");
    }

    /**
     * Start a gymkana with a gymkana instance
     * @param $id
     */

    public function start($id){
        $gymkana = Gymkana::find($id);
        return view("admin.startGymkana", compact("gymkana"));
    }

    /**
     * Create the gymkana instance related with the gymkana
     * @param Request $request
     */
    
    public function startGymkana(Request $request){
        $period = $request->period;
        $hours = $period[0];
        $minutes =  str_replace("m", "", substr($period, 2));
        $start_date =new Carbon($request->start_date);
        $start_date->addHours($hours); 
        $start_date->addMinutes($minutes); 
        $finish_date = $start_date->format('Y-m-d H:i:s');

        Gymkana_instance::create([
            'id_gymkana' => $request->id_gymkana,
            'start_date' => $request->start_date,
            'finish_date' => $finish_date,
            'observations' => $request->observations,
            'description' => $request->description,
        ]);
        return redirect()->back()->with("status", $period."Instancia Gymkana añadida correctamente");
    }
}