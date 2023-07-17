@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer un maître</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('maitres.store') }}" class="mt-4">
                    @csrf

                    <div class="form-group col-12 mb-5">
                        <label for="nom"class="fw-bold">Nom<i class="text-danger">*</i></label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>

                    <div class="form-group col-12 mb-5">
                        <label for="prenom"class="fw-bold">Prénom<i class="text-danger">*</i></label>
                        <input type="text" name="prenom" id="prenom" class="form-control" required>
                    </div>

                    
                    <div>
                        <label for="user_id"></label>
                        <select name="user_id" id="user_id">
                        <option value="">Sélectionner un utilisateur</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{ $user->name }} {{ $user->prenom }} </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group col-sm-8 mt-3">
                        <button type="submit" class="btn btn-primary">Créer</button>
                        <a href="{{ route('maitres.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
        
      </div>
    </div>
</div>

@endsection
