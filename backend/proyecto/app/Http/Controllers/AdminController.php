<?php
/**
 * Controlador AdminController
 * Este controlador sirve para controlar el manejo del administrador de la app
 * 
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class AdminController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
       
        return view("admin.index");
    }
}