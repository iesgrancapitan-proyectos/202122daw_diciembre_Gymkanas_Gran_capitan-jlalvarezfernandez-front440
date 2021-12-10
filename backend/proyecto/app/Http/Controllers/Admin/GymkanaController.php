<?php

/**
 * Controlador GymkanaController
 * Este controlador sirve para controlar las gymkanas.
 *    - Podemos crear nuevas gymkanas, empezar a jugarlas(indicando la hora de inicio), modificarlas, eliminarlas
 *    - Podemos activarla para que se pueda jugar o eliminarla
 * 
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gymkana;
use App\Models\Gymkana_instance;
use Carbon\Carbon;

class GymkanaController extends Controller
{
    /**
     * Show all gymkanas
     * 
     */

    public function all()
    {
        $gymkanas = Gymkana::all();
        return view("admin.gymkanas", compact('gymkanas'));
    }

    /**
     * Add a new gymkana to the DB
     */

    public function add()
    {
        return view("admin.newGymkana");
    }

    /**
     * Create a new gymkana instance.
     *
     * @param  Request $request
     */

    public function create(Request $request)
    {
        if (isset($request->image)) {
            $validExtension = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($request->image->extension(), $validExtension)) {
                $image = $request->file('image');
                $date = Carbon::now();
                $date = $date->format('d-m-Y-h-i-s');
                $extension = $request->image->extension();
                $imageName = "gk" . $request->tipo . $date . "." . $extension;
                $image->move(public_path("images/gymkanas"), $imageName);
            }
        } else {
            $imageName = '';
        }
        $period = $request->hours . "h" . $request->minutes . "m";
        Gymkana::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'type' => $request->tipo,
            'period' => $period,
        ]);
        return redirect("admin/gymkanas")->with("status", "Gymkana añadida correctamente");
    }

    /**
     * Destroy a gymkana
     * 
     * @param Gymkana $gymkana
     */

    public function destroy($id)
    {
        $gymkana = Gymkana::find($id);
        $gymkana->delete();

        return redirect("admin/gymkanas")->with("status", "Gymkana eliminada correctamente");
    }

    /**
     * Edit view for a gymkana
     * 
     * @param Request $request
     */

    public function edit(Request $request)
    {
        $id = $request->id;
        return view("admin.updateGk", compact("id"));
    }

    /**
     * Update a gymkana
     * 
     * @param Gymkana $gymkana
     */

    public function update(Request $request, $id)
    {
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

    public function start($id)
    {
        $gymkana = Gymkana::find($id);
        return view("admin.startGymkana", compact("gymkana"));
    }

    /**
     * Create the gymkana instance related with the gymkana
     * @param Request $request
     */
    
    public function startGymkana(Request $request)
    {
        $period = Gymkana::all()->where("id", $request->id_gymkana)->first();
        $hours = $period['period'];
        $hours = $period[0];
        $minutes =  str_replace("m", "", substr($period, 2));
        $start_date = new Carbon($request->start_date);
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
        return redirect()->back()->with("status", $period->name . " Instancia Gymkana añadida correctamente");
    }
}
