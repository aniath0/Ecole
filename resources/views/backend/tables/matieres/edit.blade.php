@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer une matière</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('matieres.update', $matiere) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="form-group col-12 ">
                    <label for="libelle"class="fw-bold">Libellé<i class="text-danger">*</i></label>
                        <!-- S'il y a un $post->libelle, on complète la valeur de l'input -->
                        <input type="text" name="libelle" value="{{ isset($matiere->libelle) ? $matiere->libelle : old('libelle') }}" id="libelle" class="form-control" placeholder="Le titre du matiere">
                        <!-- Le message d'erreur pour "libelle" -->
                        @error("libelle")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-12 ">
                        <label for="description">Description</label>
                        <input type="text" name="description" value="{{ isset($matiere->description) ? $matiere->description : old('description') }}" id="description" class="form-control" placeholder="Le titre du matiere">
                        <!-- Le message d'erreur pour "description" -->
                        @error("description")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-12 ">
                        <label for="coefficient"class="fw-bold">Coefficient<i class="text-danger">*</i></label>
                          
                            <input type="text" name="coefficient" value="{{ isset($matiere->coefficient) ? $matiere->coefficient : old('coefficient') }}" id="coefficient" class="form-control" placeholder="Le titre du matiere">
                      
                            @error("coefficient")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                        <div class="form-group col-12 ">
                            <label for="notemax"class="fw-bold">Note maximale<i class="text-danger">*</i></label>
                                
                                <input type="text" name="notemax" value="{{ isset($matiere->notemax) ? $matiere->notemax : old('notemax') }}" id="notemax" class="form-control" placeholder="Le titre du matiere">
                               
                                @error("notemax")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-12 ">
                                <label for="notesoumise"class="fw-bold">Note soumise<i class="text-danger">*</i></label>
                                    <!-- S'il y a un $post->notesoumise, on complète la valeur de l'input -->
                                    <input type="text" name="notesoumise" value="{{ isset($matiere->notesoumise) ? $matiere->notesoumise : old('notesoumise') }}" id="notesoumise" class="form-control" placeholder="Le titre du matiere">
                                    <!-- Le message d'erreur pour "notesoumise" -->
                                    @error("notesoumise")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-12 mt-3">
                                    <label for="site_id">Site</label>
                                    <select name="site_id" id="site_id" class="form-select">
            
                                        <optgroup label="valeur par défaut">
                                            <option value="{{$matiere->getsite->id}}">{{$matiere->getsite->nom}}</option>
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
                        <a href="{{ route('matieres.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

  </div>
</div>

@endsection
