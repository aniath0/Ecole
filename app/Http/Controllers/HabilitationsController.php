<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habilitations;
use App\Models\Sites;
use Illuminate\Support\Facades\Storage;

class HabilitationsController extends Controller
{
    public function index()
    {
        //On récupère toutes les habilitations
        $habilitations = Habilitations::orderBy('id', 'desc')->get();

    // On transmet les habilitations à la vue
        return view("backend.tables.habilitations.index", compact("habilitations"));
   
    }

    public function create() {
        $sites = Sites::all();
        return view('backend.tables.habilitations.create', compact("sites"));
     }

    public function store(Request $request) {

          // 1. Validation

          $this->validate($request, [
            'libelle' => 'required|unique:habilitations,libelle|max:255',
           
           
        ]);
    
        $habilitations = new Habilitations();
        $habilitations->setAttribute("libelle", $request->libelle);
        $habilitations->setAttribute("code", $request->code);
        $habilitations->setAttribute("description", $request->description);
        $habilitations->setAttribute("site_id", $request->site_id);
        $habilitations->setAttribute("created_at", new \DateTime()); 
        $habilitations->save();
        // 4. On retourne vers tous les habilitations : route("habilitations.index")
        return redirect()->route("habilitations.index");
     }

     public function show(Habilitations $habilitation) { }

    public function edit($id) {
        $sites = Sites::all();
        $habilitation = Habilitations::find($id);
        return view("backend.tables.habilitations.edit", compact("habilitation", "sites"));
    }

    public function update(Request $request, $id) {

        $habilitation = Habilitations::find($id);

        $this->validate($request, [
            'libelle' => 'required',
            'code' => 'required',
        ]);
    
        $habilitation->setAttribute("libelle", $request->libelle);
        $habilitation->setAttribute("code", $request->code);
        $habilitation->setAttribute("description", $request->description);
        $habilitation->setAttribute("updated_at", new \DateTime()); 
        $habilitation->update();
        // 4. On retourne vers tous les habilitations : route("habilitations.index")
        return redirect(route("habilitations.index"));
     }

    public function destroy(Habilitations $habilitation) { 

        Storage::delete($habilitation->libelle);

        // On les informations du $habilitations de la table "statuts"
        $habilitation->delete();
    
        // Redirection route "statuts.index"
        return redirect(route('habilitations.index'));
    }
}