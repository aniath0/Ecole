<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Matieres;
use App\Models\Sites;
class MatieresController extends Controller
{
    public function index()
    {
        //On récupère tous les statut
        $matieres = Matieres::orderBy('id', 'desc')->get();
        $matieres = Sites::where('statut_id', 1)->get();
        $matieres = Matieres::with('getsite')
        ->whereHas('getsite', function ($query) {
            $query->where('statut_id', 1);
        })
        ->get();


    // On transmet les statut à la vue
        return view("backend.tables.matieres.index", compact("matieres"));
   
    }

    public function create() {
        $sites = Sites::where('statut_id', 1)->get();
        return view('backend.tables.matieres.create', compact("sites"));
     }

    public function store(Request $request) {

          // 1. Validation

          $this->validate($request, [
            'libelle' => 'required|unique:matieres,libelle|max:255',
           
        ]);
    
        $matieres = new Matieres();
        $matieres->setAttribute("libelle", $request->libelle);
        $matieres->setAttribute("description", $request->description);
        $matieres->setAttribute("coefficient", $request->coefficient);
        $matieres->setAttribute("notemax", $request->notemax);
        $matieres->setAttribute("notesoumise", $request->notesoumise);
        $matieres->setAttribute("site_id", $request->site_id);
        $matieres->setAttribute("statut_id", 1);
        $matieres->setAttribute("created_at", new \DateTime()); 
        $matieres->save();
        // 4. On retourne vers tous les matieres : route("matieres.index")
        return redirect()->route("matieres.index");
     }

     

    public function edit($id) {
        $sites = Sites::all();
        $matiere = Matieres::find($id);
        return view("backend.tables.matieres.edit", compact("matiere", "sites"));
    }

    public function update(Request $request, $id) {

        $matiere = Matieres::find($id);

        $this->validate($request, [
            'libelle' => 'required',
        ]);
    
        $matiere->setAttribute("libelle", $request->libelle);
        $matiere->setAttribute("description", $request->description);
        $matiere->setAttribute("coefficient", $request->coefficient);
        $matiere->setAttribute("notemax", $request->notemax);
        $matiere->setAttribute("notesoumise", $request->notesoumise);
        $matiere->setAttribute("site_id", $request->site_id);
        
        $matiere->setAttribute("updated_at", new \DateTime()); 
        $matiere->update();
        // 4. On retourne vers tous les matieres : route("matieres.index")
        return redirect(route("matieres.index"));
     }

    public function destroy($id) { 
        
        {
            $matiere = Matieres::find($id);
    
            $matiere->update(['statut_id' => 2]);
            return redirect()->route('matieres.index');
        }
    }
}
