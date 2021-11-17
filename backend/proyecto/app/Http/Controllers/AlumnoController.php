<?php
/**
 * Controlador AlumnoController
 * Este controlador sirve para controlar el manejo de los alumnos participantes
 *   
 * 
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gymkana;
class AlumnoController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        // $gymkanas = Gymkana::where('activo', '>', '1')->get();
        $gymkanas = Gymkana::all();
        return view("alumno.index", compact('gymkanas'));
    }
}
