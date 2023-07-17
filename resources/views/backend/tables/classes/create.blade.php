@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer une classe</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('classes.store') }}" class="mt-4">
                    @csrf

                    <div class="form-group col-12 mb-5">
                        <label for="sigle"class="fw-bold">Sigle<i class="text-danger">*</i></label>
                        <input type="text" name="sigle" id="sigle" class="form-control" required>
                    </div>

                    <div class="form-group col-12 mb-5">
                        <label for="libelle"class="fw-bold">Libellé<i class="text-danger">*</i></label>
                        <input type="text" name="libelle" id="libelle" class="form-control" required>
                    </div>

                    <div class="form-group col-12 mb-5">
                        <label for="effectif"class="fw-bold">Effectif<i class="text-danger">*</i></label>
                        <input type="text" name="effectif" id="effectif" class="form-control" required>
                    </div>

                    <label for="user_id" class="col-md-3 col-form-label">Sélectionné un maître</label>
                    <div class="col-md-6">
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="">Sélectionnez un maitre</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"> {{ $user->name }} </option>
                            @endforeach
                        </select>
                    </div>

                        <label for="user_id" class="col-md-3 col-form-label">Sélectionné un site</label>
                        <div class="col-md-6">
                            <select name="site_id" id="site_id" class="form-control" required>
                                <option value="">Sélectionnez un site</option>
                                @foreach ($sites as $site)
                                    <option value="{{ $site->id }}"> {{ $site->nom }} </option>
                                @endforeach
                            </select>
                        </div>

                    
                    <div class="form-group col-sm-8 mt-3">
                        <button type="submit" class="btn btn-primary">Créer</button>
                        <a href="{{ route('classes.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
        
      </div>
    </div>
</div>

@endsection
