<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        switch(Auth::user()->perfil){
            case "alumno":
                return redirect()->route('alumno');
            break;
            case "admin":
                return redirect()->route('admin');
            break;
            default:
                return view('home');
            break;
        }
    }

    /**
     * allUsers
     *
     */

    public function allUsers(){
        $users = User::all();
        return view("admin.users", compact('users'));
    }
}
