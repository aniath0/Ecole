<?php
namespace App\Http\Controllers;
use App\Models\Etablissements;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class EtablissementController extends Controller
{
    public function index()
    {
        $etablissements = Etablissements::orderBy('id', 'desc')->get();
        return view("backend.tables.etablissements.index", compact("etablissements"));
    }

    public function create()
    {
        return view('backend.tables.etablissements.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|unique:etablissements,nom|max:255',
        ]);

        $image = $request->logo;
        $name_image=null;
        if (!empty($image)) {
            $allowedfileExtension = ['jpeg','jpg','webp','png','JPEG','Jpg','PNG','WEBP'];
            $extension_image = $image->getClientOriginalExtension();
            $check = in_array($extension_image, $allowedfileExtension);
            if ($check) {
                $name_image= "logo_" . date('Ymd-His') . '.' . $extension_image;
                $image->storeAs('etablissements',$name_image, 'public');
            }else {
                return redirect()->back()->with("error","Echec de l'enregistrement de l'image");
            }


        $etablissement = new Etablissements();
        $etablissement->setAttribute("nom", $request->nom);
        $etablissement->setAttribute("adresse", $request->adresse);
        $etablissement->setAttribute("sigle", $request->sigle);
        $etablissement->setAttribute("anneecreation", $request->anneecreation);
        $etablissement->setAttribute("logo", $name_image);
        $etablissement->setAttribute("telephone", $request->telephone);
        $etablissement->setAttribute("created_at", new \DateTime()); 
        $etablissement->save();

        return redirect()->route("etablissements.index");
    }
}

    public function edit($id)
    
    {
        $etablissement = Etablissements::find($id);
        return view("backend.tables.etablissements.edit", compact("etablissement"));
    }

    public function update(Request $request, $id)
    {
        $etablissement = Etablissements::find($id);

        $this->validate($request, [
            'nom' => 'required',
            'logo' => 'nullable|max:1024',
        ]);

        $etablissement->nom = $request->nom;
        $etablissement->adresse = $request->adresse;
        $etablissement->sigle = $request->sigle;
        $etablissement->anneecreation = $request->anneecreation;
        $etablissement->logo = $request->logo;
        $etablissement->telephone = $request->telephone;

       

        $etablissement->save();

        return redirect()->route("etablissements.index");
    }

    public function destroy($id)
    {
        $etablissement = Etablissements::find($id);

        Storage::delete($etablissement->nom);

        $etablissement->delete();

        return redirect()->route('etablissements.index');
    }
}

