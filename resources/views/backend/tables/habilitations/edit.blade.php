@extends("backend.layout.mainlayout")

@section("content")


<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Editer une habilitation</h5>
            <div class="card-text">
                <!-- Le formulaire est géré par la route "habilitation.update" -->
                <form method="POST" action="{{ route('habilitations.update', $habilitation) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="form-group col-12">
                    <label for="libelle"class="fw-bold">Libellé<i class="text-danger">*</i></label>
                        <!-- S'il y a un $post->libelle, on complète la valeur de l'input -->
                        <input type="text" name="libelle" value="{{ isset($habilitation->libelle) ? $habilitation->libelle : old('libelle') }}" id="libelle" class="form-control" placeholder="Le titre du habilitation">
                        <!-- Le message d'erreur pour "libelle" -->
                        @error("libelle")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-12 ">
                        <label for="description" class="fw-bold">Description<i class="text-danger">*</i></label>
                        <input type="text" name="description" value="{{ isset($habilitation->description) ? $habilitation->description : old('description') }}" id="description" class="form-control" placeholder="Le titre du role">
                        <!-- Le message d'erreur pour "description" -->
                        @error("description")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                    </div>

                    <div class="form-group col-12 ">
                        <label for="code" class="fw-bold">Code<i class="text-danger">*</i></label>
                        <input type="text" name="code" value="{{ isset($habilitation->code) ? $habilitation->code : old('code') }}" id="code" class="form-control">
                        <!-- Le message d'erreur pour "code" -->
                        @error("code")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                    </div>

                    <div class="form-group col-sm-12 mt-3">
                        <label for="site_id">Site</label>
                        <select name="site_id" id="site_id" class="form-select">

                            <optgroup label="valeur par défaut">
                                <option value="{{$habilitation->getsite->id}}">{{$habilitation->getsite->nom}}</option>
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
                        <a href="{{ route('habilitations.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>

                

                </form>
            </div>
        
        </div>
    </div>
  </div>
</div>

@endsection
