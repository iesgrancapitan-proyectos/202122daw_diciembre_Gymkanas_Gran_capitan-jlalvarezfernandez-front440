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
use App\Models\Groups;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Gymkana;
use App\Models\Groups_test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * Show all tests
     * 
     */

    public function all()
    {


        $group_test = Groups_test::groupBy("id_test")->where("checkup", 1)->get();
        $tests = Test::all()->where("review", 1);
        return view("organizador.tests", compact('tests', 'group_test'));
    }

    /**
     * Show all answer tests
     * 
     */

    public function allAnswer($id)
    {
        // $group_test = Groups_test::all()->where("id_test", $id)->where("checkup", 0);
        $group_test = Groups_test::all()->where("id_test", $id)->where("checkup", 1);
        $tests = Test::all()->where("id", $id);
        return view("organizador.testsAnswer", compact('group_test', 'tests'));
    }

    /**
     * Change the score of the group_test to correct answer
     * 
     */
    public function correctAnswer(Request $request)
    {
        $score = Test::find($request->id)->score;
        Groups_test::where('id_test', $request->id)->where("id_group", $request->id_group)->update(['score' => $score, 'checkup' => 0]);
        return redirect("organizador/tests")->with("status", "Prueba corregida correctamente");
    }
    /**
     * Change the score of the group_test to incorrect answer
     * 
     */

    public function incorrectAnswer(Request $request)
    {
        Groups_test::where('id_test', $request->id)->where("id_group", $request->id_group)->update(['score' => 0, 'checkup' => 0]);
        return redirect("organizador/tests")->with("status", "Prueba corregida correctamente");
    }
}
