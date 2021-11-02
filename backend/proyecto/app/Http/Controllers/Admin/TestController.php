<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Gymkana;
use Carbon\Carbon;
class TestController extends Controller{
    /**
     * Show all tests
     * 
     */
    public function all(){
        $test = Test::all();
        $gymkanas = Gymkana::all();
        return view("admin.testsGk", compact('test', 'gymkanas'));
    }

    /**
     * Show all the test of one gymkana
     * 
     */
    public function testGk($id){
        $tests = Test::all()->where("id_gymkana", $id);
        return view("admin.test", compact('tests'));
    }

    /**
     * Add a new test to the DB
     */
    public function add(){
        $gymkanas = Gymkana::all();
        return view("admin.newTest", compact('gymkanas'));
    }

    /**
     * Create a new test.
     *
     * @param  Request $request
     */
    public function create(Request $request){
        if(isset($request->image)){
            $validExtension = array('jpg', 'png', 'jpeg', 'gif');
            if(in_array($request->image->extension(), $validExtension)){
                $image = $request->file('image');
                $date = Carbon::now();
                $date = $date->format('d-m-Y-h-i-s');
                $extension = $request->image->extension();
                $imageName = "gk".$request->id_gymkana."test".$date.".".$extension;
                $image->move(public_path("images/tests/".$request->id_gymkana."/"), $imageName);
            }else{
                $imageName = '';
            }
        }else{
            $imageName = '';
        }

        $max_period = $request->hours."h".$request->minutes."m";
        Test::create([
            'id_gymkana' => $request->id_gymkana,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'max_period' => $max_period,
            'difficulty' => $request->difficulty,
            'acceptance_criteria' => $request->acceptance_criteria,
            'score' => $request->difficulty,
            'review' => $request->review,
        ]);
        return redirect("admin/tests")->with("status", "Test añadido correctamente");    
    }

    /**
     * Destroy a gymkana
     * 
     * @param Gymkana $gymkana
     */
    public function destroy($id){
        $test = Test::find($id);
        $test->delete();
        
        return redirect("admin/tests")->with("status", "Test eliminado correctamente");
    }
    
    /**
     * Update view for a test
     * 
     * @param Request $request
     */
    public function edit(Request $request){
        $id = $request->id;
        return view("admin.updateTest", compact("id"));
    }
    
    /**
     * Update a group
     * 
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $test = Test::find($id);
        $test->name = $request->name;
        $test->description = $request->description;
        $test->difficulty = $request->difficulty;
        $test->acceptance_criteria = $request->acceptance_criteria;
        $test->score = $request->score;
        $test->max_period = $request->max_period;

        $test->save();
        return redirect("admin/tests")->with("status", "Gymkana modificada correctamente");
    }
}