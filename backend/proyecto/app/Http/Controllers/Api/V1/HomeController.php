<?php

/**
 * Controlador HomeController de la Api
 * Este controlador sirve para hacer las peticiones pertinentes respecto a la Home de la app
 * 
 */

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        return view('home');
    }
}
