<?php

namespace App\Http\Controllers;
use App\Models\Inscription;
use App\Models\Sites;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class inscriptions extends Controller
{
    //
    public function index()
    {
        //On récupère tous les statut
        $inscriptions = Inscription::orderBy('id', 'desc')->get();
        $inscriptions = Inscription::where('statut_id', 1)->get();
        
        $inscriptions = Inscription::with('getsite')
        ->whereHas('getsite', function ($query) {
            $query->where('statut_id', 1);
        })
        ->get();

    // On transmet les statut à la vue
        return view("backend.tables.inscriptions.index", compact("inscriptions"));
   
    }

    public function create() {
        $sites = Sites::where('statut_id', 1)->get();
        return view('backend.tables.inscriptions.create', compact("sites"));
     }

    public function store(Request $request) {

          // 1. Validation

          $this->validate($request, [
            'libelle' => 'required|unique:inscriptions,libelle|max:255',
           
        ]);
    
        $inscriptions = new inscription();
        $inscriptions->setAttribute("libelle", $request->libelle);
        $inscriptions->setAttribute("description", $request->description);
        $inscriptions->setAttribute("site_id", $request->site_id);
        $inscriptions->setAttribute("statut_id", 1); 
        $inscriptions->setAttribute("created_at", new \DateTime()); 
        $inscriptions->save();
        // 4. On retourne vers tous les roles : route("roles.index")
        return redirect()->route("inscriptions.index");
     }

     
    public function edit($id) {

        $sites = Sites::all();
        $inscriptions = Inscription::find($id);
        return view("backend.tables.inscriptions.edit", compact("inscriptions","sites"));
    }

    public function update(Request $request, $id) {

        $inscriptions = Inscription::find($id);

        $this->validate($request, [
            'libelle' => 'required',
        ]);
    
        $inscriptions->setAttribute("libelle", $request->libelle);
        $inscriptions->setAttribute("description", $request->description);
        $inscriptions->setAttribute("site_id", $request->site_id);
        $inscriptions->setAttribute("updated_at", new \DateTime()); 
        $inscriptions->update();
        // 4. On retourne vers tous les roles : route("roles.index")
        return redirect(route("inscriptions.index"));
     }

    public function destroy(Inscription $inscription) { 

        $inscription = Inscription::find($i);

        // On les informations du $statut de la table "statuts"
        $inscription->update(['statut_id' => 2]);
    
        // Redirection route "statuts.index"
        return redirect(route('inscriptions.index'));
    }
}
