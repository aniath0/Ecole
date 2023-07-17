@extends("backend.layout.mainlayout")

@section("content")


<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Editer un site</h5>
            <div class="card-text">
                <!-- Le formulaire est géré par la route "site.update" -->
                <form method="POST" action="{{ route('sites.update', $site) }}" enctype="multipart/form-data">
                    <!-- Le token CSRF -->
                    @csrf
                    @method('put')
                    <div class="row">
                    <div class="form-group col-4">
                    <label for="nom"class="fw-bold">Nom<i class="text-danger">*</i></label>
                        <input type="text" name="nom" value="{{ isset($site->nom) ? $site->nom : old('nom') }}" id="nom" class="form-control">
                        @error("nom")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    
                    <div class="form-group col-4 ">
                        <label for="users_id"class="fw-bold">Utilisateur<i class="text-danger">*</i></label>
                           
                            <input type="text" name="users_id" value="{{ isset($site->users_id) ? $site->users_id : old('users_id') }}" id="users_id" class="form-control" >
                         
                            @error("users_id")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>


                    <div class="form-group col-4 ">
                        <label for="etablissement_id"class="fw-bold">etablissement<i class="text-danger">*</i></label>
                           
                            <input type="text" name="etablissement_id" value="{{ isset($site->etablissement_id) ? $site->etablissement_id : old('etablissement_id') }}" id="etablissement_id" class="form-control" >
                         
                            @error("etablissement_id")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                </div>

                    

                    <div class="form-group col-sm-12 mt-3">
                        <button type="submit" class="btn btn-primary">Valider</button>
                        <a href="{{ route('sites.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>

                

                </form>
            </div>
        
        </div>
    </div>
  </div>
</div>

@endsection
