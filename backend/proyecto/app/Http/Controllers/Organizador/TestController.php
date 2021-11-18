<?php
/**
 * Controlador testController
 * Este controlador sirve para controlar el manejo de las respuestas que tiene que validar el organizador de gymkana.
 *    
 *    - Podemos aceptar o rechazar la respuesta y se sumaran los puntos correspondientes
 * 
 */

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
        $group_test = Groups_test::all()->where("id_test", $id);
        // var_dump(Test::all()->where("id",4));

        // die();
        $group_test = Groups_test::find($id);
        // $score = Test::where("id", $id)->get(['score']); //REVISAR EL SCORE DB::(test)->
        // $group_test->score = $score;
        // SI CONTINUA FALLANDO USAR ESTA LINEA: 
        // $group_test->score = 2;
        // $group_test->checkup = 1;
        // $group_test->save();
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