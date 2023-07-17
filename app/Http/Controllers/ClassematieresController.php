<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Matieres;
use App\Models\Classematieres;
use App\Models\Sites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClassematieresController extends Controller
{
    public function index() {
        //On récupère tous les Post
        $classematieres = Classematieres::orderBy('id', 'desc')->get();

        // On transmet les classes à la vue
        return view("backend.tables.classematieres.index", compact("classematieres"));
    }
    

    public function create(){
        
        $matieres = Matieres::all();
        $sites = Sites::all();
        $classes = Classes::all();
        return view('backend.tables.classematieres.create', compact('matieres', 'classes', 'sites'));
    }

    public function store(Request $request){

        $request->validate([
            'matiere_id' => 'required',
        ]);

    
      $classematieres = new Classematieres();
      $classematieres->setAttribute("matiere_id", $request->matiere_id);
      $classematieres->setAttribute("classe_id", $request->classe_id);
      $classematieres->setAttribute("site_id", $request->site_id);
      $classematieres->setAttribute("created_at", new \DateTime()); 
      $classematieres->save();
      // 4. On retourne vers tous les statuts : route("statuts.index")
      return redirect()->route("classematieres.index");

    }

    public function edit($id) {

        $classematiere = Classematieres::find($id);
        $matieres = Matieres::all();
        $classes = Classes::all();
        $sites = Sites::all();
        return view("backend.tables.classematieres.edit", compact("classematiere", "matieres", "classes", "sites"));
    }

    public function update(Request $request, $id) {

        $classematiere = Classematieres::find($id);

        $this->validate($request, [
            'matiere_id' => 'required',
        ]);
    
        $classematiere->setAttribute("matiere_id", $request->matiere_id);
        $classematiere->setAttribute("classe_id", $request->classe_id);
        $classematiere->setAttribute("site_id", $request->site_id);
        $classematiere->setAttribute("updated_at", new \DateTime()); 
        $classematiere->update();
        // 4. On retourne vers tous les classes : route("classes.index")
        return redirect(route("classematieres.index"));
     }

    
    public function destroy($id) { 

        $classematiere = Classematieres::find($id);
        $classe = Classes::find($id);
       
        // On les informations du $statut de la table "statuts"
        $classematiere->delete();

        // Redirection route "statuts.index"
        return redirect(route('classematieres.index'));
    }
    
}
