@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
            <h5 class="card-title">Editer un maitre</h5>
            <div class="">
                <!-- Le formulaire est géré par la route "maitres.update" -->
                <form method="POST" action="{{ route('maitres.update', $maitre) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="form-group col-12 ">
                    <label for="nom"class="fw-bold">Nom<i class="text-danger">*</i></label>
                        <!-- S'il y a un $post->nom, on complète la valeur de l'input -->
                        <input type="text" name="nom" value="{{ isset($maitre->nom) ? $maitre->nom : old('nom') }}" id="nom" class="form-control" placeholder="Le titre du maitre">
                        <!-- Le message d'erreur pour "nom" -->
                        @error("nom")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-12 ">
                        <label for="prenom"class="fw-bold">Prénom<i class="text-danger">*</i></label>
                            <!-- S'il y a un $post->prenom, on complète la valeur de l'input -->
                            <input type="text" name="prenom" value="{{ isset($maitre->prenom) ? $maitre->prenom : old('prenom') }}" id="prenom" class="form-control" placeholder="Le titre du maitre">
                            <!-- Le message d'erreur pour "nom" -->
                            @error("prenom")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-12 ">
                            <label for="telephone"class="fw-bold">Téléphone<i class="text-danger">*</i></label>
                                <!-- S'il y a un $post->telephone, on complète la valeur de l'input -->
                                <input type="text" name="telephone" value="{{ isset($maitre->telephone) ? $maitre->telephone : old('telephone') }}" id="telephone" class="form-control" placeholder="Le titre du maitre">
                                <!-- Le message d'erreur pour "telephone" -->
                                @error("telephone")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-12 ">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" value="{{ isset($maitre->password) ? $maitre->password : old('password') }}" id="password" class="form-control" placeholder="Le titre du maitre">
                                <!-- Le message d'erreur pour "password" -->
                                @error("password")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                
                            </div>
                    
                    <div class="form-group col-sm-12 mt-3">
                        <button type="submit" class="btn btn-primary">Valider</button>
                        <a href="{{ route('maitres.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

  </div>
</div>

@endsection
