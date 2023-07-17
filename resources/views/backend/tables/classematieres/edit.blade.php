@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer une classematiere et sa matière</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('classematieres.update', $classematiere->id) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="form-group col-sm-12 mt-3">
                        <label for="matiere_id">Matière</label>
                        <select name="matiere_id" id="matiere_id" class="form-select">

                            <optgroup label="valeur par défaut">
                                <option value="{{$classematiere->getmatiere->matiere_id}}">{{$classematiere->getmatiere->libelle}}</option>
                            </optgroup>
                            <optgroup label="liste disponible">
                                @foreach($matieres as $matiere)
                                <option value="{{$matiere->id}}">{{$matiere->libelle}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 mt-3">
                        <label for="classe_id">Classe</label>
                        <select name="classe_id" id="classe_id" class="form-select">

                            <optgroup label="valeur par défaut">
                                <option value="{{$classematiere->getclasse->classe_id}}">{{$classematiere->getclasse->sigle}}</option>
                            </optgroup>
                            <optgroup label="liste disponible">
                                @foreach($classes as $classe)
                                <option value="{{$classe->id}}">{{$classe->sigle}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group col-sm-12 mt-3">
                        <label for="site_id">Site</label>
                        <select name="site_id" id="site_id" class="form-select">

                            <optgroup label="valeur par défaut">
                                <option value="{{$classematiere->getsite->site_id}}">{{$classematiere->getsite->nom}}</option>
                            </optgroup>
                            <optgroup label="liste disponible">
                                @foreach($sites as $site)
                                <option value="{{$site->id}}">{{$site->nom}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>

                    

                        
                        <div class="form-group col-sm-12 mt-3">
                            <button type="submit" class="btn btn-primary">Valider</button>
                            <a href="{{ route('classematieres.index') }}" class="btn btn-secondary">Annuler</a>
                        </div>

                </form>
            </div>
        </div>
    </div>

  </div>
</div>

@endsection
