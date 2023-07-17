@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer une classe</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "roles.update" -->
                <form method="POST" action="{{ route('classes.update', $classe) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="form-group col-12 ">
                    <label for="sigle"class="fw-bold">Sigle<i class="text-danger">*</i></label>
                        <!-- S'il y a un $post->sigle, on complète la valeur de l'input -->
                        <input type="text" name="sigle" value="{{ isset($classe->sigle) ? $classe->sigle : old('sigle') }}" id="sigle" class="form-control" placeholder="Le titre du classe">
                        <!-- Le message d'erreur pour "sigle" -->
                        @error("sigle")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-12 ">
                        <label for="libelle"class="fw-bold">Libellé<i class="text-danger">*</i></label>
                            <!-- S'il y a un $post->libelle, on complète la valeur de l'input -->
                            <input type="text" name="libelle" value="{{ isset($classe->libelle) ? $classe->libelle : old('libelle') }}" id="libelle" class="form-control" placeholder="Le titre du matiere">
                            <!-- Le message d'erreur pour "libelle" -->
                            @error("libelle")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-12 ">
                            <label for="effectif"class="fw-bold">Effectif<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->effectif, on complète la valeur de l'input -->
                                <input type="text" name="effectif" value="{{ isset($classe->effectif) ? $classe->effectif : old('effectif') }}" id="effectif" class="form-control" placeholder="Le titre du matiere">
                                <!-- Le message d'erreur pour "effectif" -->
                                @error("effectif")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>


                        <div class="form-group col-sm-12 mt-3">
                            <label for="user_id">Maître</label>
                            <select name="user_id" id="user_id" class="form-select">
    
                                <optgroup label="valeur par défaut">
                                    <option value="{{$classe->getuser->id}}">{{$classe->getuser->name}}</option>
                                </optgroup>
                                <optgroup label="liste disponible">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>

                        <div class="form-group col-sm-12 mt-3">
                            <label for="site_id">Site</label>
                            <select name="site_id" id="site_id" class="form-select">
    
                                <optgroup label="valeur par défaut">
                                    <option value="{{$classe->getsite->id}}">{{$classe->getsite->nom}}</option>
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
                            <a href="{{ route('classes.index') }}" class="btn btn-secondary">Annuler</a>
                        </div>

                </form>
            </div>
        </div>
    </div>

  </div>
</div>

@endsection
