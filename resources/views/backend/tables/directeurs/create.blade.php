@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer un directeur</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('directeurs.store') }}" class="mt-4">
                    @csrf

                    <div class="form-group col-12 ">
                        <label for="nom"class="fw-bold">Nom<i class="text-danger">*</i></label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>

                    <div class="form-group col-12 ">
                        <label for="prenom" class="fw-bold">Prenom<i class="text-danger">*</i></label>
                        <input type="text" name="prenom" id="prenom" class="form-control" rows="3" required></textarea>
                    </div>

                    <label for="user_id" class="fw-bold">Utilisateur<i class="text-danger">*</i></label>
                    <div class="col-12">
                        <select name="users_id" id="users_id" class="form-control" required>
                            <option value="">Sélectionnez un utilisateur</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}"> {{ $user->name }} {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-8 mt-3">
                        <button type="submit" class="btn btn-primary">Créer</button>
                        <a href="{{ route('directeurs.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
        
      </div>
    </div>
</div>

@endsection
