<?php

namespace App\Http\Controllers;
use App\Models\Roles;
use App\Models\Sites;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        //On récupère tous les statut
        $roles = Roles::orderBy('id', 'desc')->get();

    // On transmet les statut à la vue
        return view("backend.tables.roles.index", compact("roles"));
   
    }

    public function create() {
        $sites = Sites::all();
        return view('backend.tables.roles.create', compact("sites"));
     }

    public function store(Request $request) {

          // 1. Validation

          $this->validate($request, [
            'libelle' => 'required|unique:roles,libelle|max:255',
           
        ]);
    
        $roles = new Roles();
        $roles->setAttribute("libelle", $request->libelle);
        $roles->setAttribute("description", $request->description);
        $roles->setAttribute("site_id", $request->site_id);
        $roles->setAttribute("created_at", new \DateTime()); 
        $roles->save();
        // 4. On retourne vers tous les roles : route("roles.index")
        return redirect()->route("roles.index");
     }

     public function show(Roles $role) { }

    public function edit($id) {
        $sites = Sites::all();
        $role = Roles::find($id);
        return view("backend.tables.roles.edit", compact("role", "sites"));
    }

    public function update(Request $request, $id) {

        $role = Roles::find($id);

        $this->validate($request, [
            'libelle' => 'required',
        ]);
    
        $role->setAttribute("libelle", $request->libelle);
        $role->setAttribute("description", $request->description);
        $role->setAttribute("site_id", $request->site_id);
        $role->setAttribute("updated_at", new \DateTime()); 
        $role->update();
        // 4. On retourne vers tous les roles : route("roles.index")
        return redirect(route("roles.index"));
     }

    public function destroy(Roles $role) { 

        Storage::delete($role->libelle);

        // On les informations du $statut de la table "statuts"
        $role->delete();
    
        // Redirection route "statuts.index"
        return redirect(route('roles.index'));
    }
}
