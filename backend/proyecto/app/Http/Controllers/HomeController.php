<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Controllers\Auth;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        switch(\Auth::user()->perfil){
            case "alumno":
                return view('alumno.index');
            break;
            case "admin":
                return view('admin.index');
            break;
            case "organizador":
                return view('organizador.index');
            break;
            default:
                return view('home');
            break;
        }
    }
}
