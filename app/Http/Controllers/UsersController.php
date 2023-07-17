<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UsersController extends Controller
{
    public function index() {
        //On récupère tous les Post
        $users = User::orderBy('id', 'desc')->get();

        // On transmet les users à la vue
        return view("backend.tables.users.index", compact("users"));
    }
    

    public function create(){
        $roles = Roles::all();
        return view('backend.tables.users.create', compact('roles'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

    
      $users = new User();
      $users->setAttribute("name", $request->name);
      $users->setAttribute("prenom", $request->prenom);
      $users->setAttribute("email", $request->email);
      $users->setAttribute("telephone", $request->telephone);
      $users->setAttribute("password", $request->password);
      $users->setAttribute("role_id", $request->role_id);
      $users->setAttribute("created_at", new \DateTime()); 
      $users->save();
      // 4. On retourne vers tous les statuts : route("statuts.index")
      return redirect()->route("users.index");
    }
       
    
}