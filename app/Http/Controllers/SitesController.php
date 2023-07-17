<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\Sites;
use App\Models\Etablissements;
use App\Models\User;


use Illuminate\Http\Request;

class SitesController extends Controller
{
    //
    public function index() {
        //On récupère tous les Post
        $sites = Sites::orderBy('id', 'desc')->get();

        // On transmet les sites à la vue
        return view("backend.tables.sites.index", compact("sites"));
    }
    

    public function create(){
        $etablissements = Etablissements::all();
        $users = User::where('role_id', 4)->get();
        return view('backend.tables.sites.create', compact('etablissements','users'));
    }

    public function store(Request $request){

        $request->validate([
            'nom' => 'required',

        ]);

    
      $sites = new Sites();
      $sites->setAttribute("nom", $request->nom);
      $sites->setAttribute("users_id", $request->users_id);
      $sites->setAttribute("etablissement_id", $request->etablissement_id);
      $sites->setAttribute("created_at", new \DateTime()); 
      $sites->save();
      // 4. On retourne vers tous les statuts : route("statuts.index")
      return redirect()->route("sites.index");
    }

    public function edit($id)
    {
        $site = Sites::find($id);
        return view("backend.tables.sites.edit", compact("site"));
    }

    public function update(Request $request, $id)
    {
        $site = Sites::find($id);

        $this->validate($request, [
            'nom' => 'required',
        ]);

        $site->nom = $request->nom;
        $site->users_id = $request->users_id;
        $site->etablissement_id = $request->etablissement_id;
        $site->save();

        return redirect()->route("sites.index");
    }

    public function destroy($id)
    {
        $etablissement = Sites::find($id);

        Storage::delete($etablissement->nom);

        $etablissement->delete();

        return redirect()->route('sites.index');
    }
}
