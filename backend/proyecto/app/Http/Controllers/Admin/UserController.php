<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    /**
     * Show all users
     * 
     */
    public function all(){
        $users = User::all();
        return view("admin.users", compact('users'));
    }

    /**
     * Add a new user to the DB
     */
    public function add(){
        return view("admin.newUser");
    }

    /**
     * Normalize a string
     * 
     * @param $string
     */
    public function normalize($string){
        $originales = 'ÁÉÍÓÚáéíóú';
        $modificadas = 'AEIOUaeiou';
        $string = utf8_decode($string);
        $string = strtr($string, utf8_decode($originales), $modificadas);
        $string = strtolower($string);
        return utf8_encode($string);
    }

    /**
     * Create a new user.
     *
     * @param  Request $request
     */
    public function create(Request $request){
        User::create([
            'name' => $this->normalize($request->name),
            'email' => $request->email,
            'surname' => $this->normalize($request->surname),
            'password' => Hash::make($request->password),
            'perfil' => $request->perfil,
            'curso' => $request->curso,
            'estado' => "0",
        ]);
        return redirect()->back()->with("status", "Usuario añadida correctamente");
    }

    /**
     * Destroy a user
     * 
     * @param $id
     */
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        
        return redirect("admin/users")->with("status", "Usuario eliminada correctamente");
    }
    
    /**
     * Update view for an user
     * 
     * @param Request $request
     */
    public function edit(Request $request){
        $id = $request->id;
        return view("admin.updateUser", compact("id"));
    }
    
    /**
     * Update an user
     * 
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->perfil = $request->perfil;
        $user->curso = $request->curso;
        $user->save();
        return redirect("admin/users")->with("status", "Usuario modificado correctamente");
    }

    /**
     * Activate an user
     * 
     * @param $id
     */
    public function activate($id){
        $user = User::find($id);
        $user->estado = 1;
        $user->save();
        return redirect("admin/users")->with("status", "Usuario activado correctamente");
    }

    /**
     * Deactivate an user
     * 
     * @param $id
     */
    public function deactivate($id){
        $user = User::find($id);
        $user->estado = 0;
        $user->save();
        return redirect("admin/users")->with("status", "Usuario desactivado correctamente");
    }

    /**
     * Change the profile of a user to organizer
     * 
     * @param $id
     */
    public function makeOrganizer($id){
        $user = User::find($id);
        $user->perfil = "organizador";
        $user->save();
        return redirect("admin/users")->with("status", "Perfil usuario modificado correctamente");
    }
}