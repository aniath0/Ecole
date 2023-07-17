@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer un Directeur</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "directeurs.update" -->
                <form method="POST" action="{{ route('directeurs.update', $directeur) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="form-group col-12 ">
                    <label for="nom"class="fw-bold">Nom<i class="text-danger">*</i></label>
                        <input type="text" name="nom" value="{{ isset($directeur->nom) ? $directeur->nom : old('nom') }}" id="nom" class="form-control" placeholder="Le titre du directeur">
                        @error("nom")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group col-12 ">
                        <label for="prenom">Prenom</label>
                        <input type="text" name="prenom" value="{{ isset($directeur->prenom) ? $directeur->prenom : old('prenom') }}" id="prenom" class="form-control" placeholder="Prenom">
                        <!-- Le message d'erreur pour "email" -->
                        @error("prenom")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                    </div>

                    

                    
                    
                    <div class="form-group col-sm-12 mt-3">
                        <button type="submit" class="btn btn-primary">Valider</button>
                        <a href="{{ route('directeurs.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

  </div>
</div>

@endsection
