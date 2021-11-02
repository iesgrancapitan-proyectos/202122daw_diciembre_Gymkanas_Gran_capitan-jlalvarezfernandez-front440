<?php

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
        // $gymkanas = Gymkana::where('activo', '>', '1')->get();
        // $gymkanas = Gymkana::all();
        // $users = User::all();
        return view("admin.index");
    }
}