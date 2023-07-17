<?php

namespace App\Http\Controllers;
use App\Models\Payement;
use App\Models\Sites;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class payements extends Controller
{
    //
    public function index()
    {
        //On récupère tous les statut
        $payements = Payement::orderBy('id', 'desc')->get();

    // On transmet les statut à la vue
        return view("backend.tables.payements.index", compact("payements"));
   
    }

    public function create() {
        $sites = Sites::all();
        return view('backend.tables.payements.create',compact("sites"));
     }

    public function store(Request $request) {

          // 1. Validation

          $this->validate($request, [
            'libelle' => 'required|unique:payements,libelle|max:255',
           
        ]);
    
        $payements = new Payement();
        $payements->setAttribute("libelle", $request->libelle);
        $payements->setAttribute("description", $request->description);
        $payements->setAttribute("site_id", $request->site_id);
        $payements->setAttribute("created_at", new \DateTime()); 
        $payements->save();
        // 4. On retourne vers tous les roles : route("roles.index")
        return redirect()->route("payements.index");
     }

    

    public function edit($id) {
        $sites = Sites::all();
        $payements = Payement::find($id);
        return view("backend.tables.payements.edit", compact("payements","sites"));
    }

    public function update(Request $request, $id) {

        $payements = Payement::find($id);

        $this->validate($request, [
            'libelle' => 'required',
        ]);
    
        $payements->setAttribute("libelle", $request->libelle);
        $payements->setAttribute("description", $request->description);
        $payements->setAttribute("site_id", $request->site_id);
        $payements->setAttribute("updated_at", new \DateTime()); 
        $payements->update();
        // 4. On retourne vers tous les roles : route("roles.index")
        return redirect(route("payements.index"));
     }

    public function destroy(Payement $payement) { 

        Storage::delete($payement->libelle);

        // On les informations du $statut de la table "statuts"
        $payement->delete();
    
        // Redirection route "statuts.index"
        return redirect(route('payements.index'));
    }
}
