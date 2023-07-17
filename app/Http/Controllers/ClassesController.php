<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sites;
use App\Models\User;
use App\Models\Classes;
use Illuminate\Support\Facades\Storage;

class ClassesController extends Controller
{
    public function index() {
        //On récupère tous les Post
        $classes = Classes::orderBy('id', 'desc')->get();

        // On transmet les classes à la vue
        return view("backend.tables.classes.index", compact("classes"));
    }
    

    public function create(){
        $sites = Sites::all();
        $users = User::where('role_id', 4)->get();
        return view('backend.tables.classes.create', compact('users', 'sites'));
    }

    public function store(Request $request){

        $request->validate([
            'sigle' => 'required|unique:classes,sigle|max:255',
        ]);

    
      $classes = new Classes();
      $classes->setAttribute("sigle", $request->sigle);
      $classes->setAttribute("libelle", $request->libelle);
      $classes->setAttribute("effectif", $request->effectif);
      $classes->setAttribute("user_id", $request->user_id);
      $classes->setAttribute("site_id", $request->site_id);
      $classes->setAttribute("created_at", new \DateTime()); 
      $classes->save();
      // 4. On retourne vers tous les statuts : route("statuts.index")
      return redirect()->route("classes.index");

    }

    public function edit($id) {

        $classe = Classes::find($id);
        $users = User::where('role_id', 4)->get();
        $sites = Sites::all();
        return view("backend.tables.classes.edit", compact("classe", "sites", "users"));
    }

    public function update(Request $request, $id) {

        $classe = Classes::find($id);

        $this->validate($request, [
            'sigle' => 'required',
        ]);
    
        $classe->setAttribute("sigle", $request->sigle);
        $classe->setAttribute("libelle", $request->libelle);
        $classe->setAttribute("effectif", $request->effectif);
        $classe->setAttribute("user_id", $request->user_id);
        $classe->setAttribute("site_id", $request->site_id);
        $classe->setAttribute("updated_at", new \DateTime()); 
        $classe->update();
        // 4. On retourne vers tous les classes : route("classes.index")
        return redirect(route("classes.index"));
     }

    
    public function destroy(Classes $classe, $id) { 

        $classe = Classes::find($id);
        
        
        // On les informations du $statut de la table "statuts"
        $classe->delete();

        // Redirection route "statuts.index"
        return redirect(route('classes.index'));
    }
    
}
