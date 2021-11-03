<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gymkana_instance;
use App\Models\Gymkana;
use Carbon\Carbon;

class GkInstanceController extends Controller{
    /**
     * Show all the gymkana instance
     * 
     */
    public function all(){
        $gk_instance = Gymkana_instance::all();
        return view("admin.gymkanasInstance", compact('gk_instance'));
    }

    /**
     * Add a new gymkana instance to the DB
     */
    public function add(){
        $gymkanas = Gymkana::all();
        return view("admin.newGkInstance", compact("gymkanas"));
    }

    /**
     * Check image
     * 
     */
    public function checkImage($image){
        $validType = array('jpg', 'png', 'gif', 'jpeg');
        if(isset($image) && $image != ''){
            $temp = $image['tmp_name'];
            $type = $image['type'];

            if(in_array($type, $validType)){
                $name = 'gk'.date('Y-m-d H:i:s');
                if(move_uploaded_file($temp, '../../../resources/images/'. $name)){
                    chmod('../../../resources/images/'. $name, 0777);
                    return $name;
                }
            }
        }else{
            return "";
        }
    }

    /**
     * Create a new gymkana instance.
     *
     * @param  Request $request
     */
    public function create(Request $request){
        
        //$period = Gymkana::all()->where("id", $request->id_gymkana)->get('period');
        $period = Gymkana::all()->where("id", $request->id_gymkana)->first();
        //var_dump($period['period']);
        $hours = $period['period'];
        //$hours = $period[0];
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
        return redirect("admin/gk-instance")->with("status", "Instancia Gymkana añadida correctamente");
    }

    /**
     * Destroy a gymkana instance
     * 
     * @param $id
     */
    public function destroy($id){
        $gk_instance = Gymkana_instance::find($id);
        $gk_instance->delete();
        
        return redirect("admin/gk-instance")->with("status", "Instancia gymkana eliminada correctamente");
    }
    
    /**
     * Update view for a gymkana instance
     * 
     * @param Request $request
     */
    public function edit(Request $request){
        $id = $request->id;
        return view("admin.updateGkInstance", compact("id"));
    }
    
    /**
     * Update a gymkana instance
     * 
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $gkInstance = Gymkana_instance::find($id);
        $gkInstance->start_date = $request->start_date;
        $gkInstance->finish_date = $request->finish_date;
        $gkInstance->observations = $request->observations;
        $gkInstance->description = $request->description;
        $gkInstance->save();
        return redirect("admin/gk-instance")->with("status", "Instancia Gymkana modificada correctamente");
    }
}