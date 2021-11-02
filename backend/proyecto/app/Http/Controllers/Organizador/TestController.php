<?php

namespace App\Http\Controllers\Organizador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Gymkana;
use App\Models\Groups_test;

class TestController extends Controller{
    /**
     * Show all tests
     * 
     */
    public function all(){
        $tests = Test::all()->where("review", 1);
        return view("organizador.tests", compact('tests'));
    }

    /**
     * Show all answer tests
     * 
     */
    public function allAnswer($id){
        // $group_test = Groups_test::all()->where("id_test", $id)->where("checkup", 0);
        $group_test = Groups_test::all()->where("id_test", $id);
        $tests = Test::all()->where("id", $id);
        return view("organizador.testsAnswer", compact('group_test', 'tests'));
    }

    /**
     * Change the score of the group_test to correct answer
     * 
     */
    public function correctAnswer($id){
        // $group_test = Groups_test::all()->where("id_test", $id);
        $group_test = Groups_test::find($id);
        $score = Test::all()->where("id", $id)->first()->score;
        $group_test->score = $score;
        $group_test->checkup = 1;
        $group_test->save();
        return redirect("organizador/tests")->with("status", "Prueba corregida correctamente");
    }
    /**
     * Change the score of the group_test to incorrect answer
     * 
     */
    public function incorrectAnswer($id){
        // $group_test = Groups_test::all()->where("id_test", $id);
        $group_test = Groups_test::find($id);
        $group_test->score = 0;
        $group_test->checkup = 1;
        $group_test->save();
        return redirect("organizador/tests")->with("status", "Prueba corregida correctamente");
    }
}