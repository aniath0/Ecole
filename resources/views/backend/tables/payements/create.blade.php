@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer un statut payement</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('payements.store') }}" class="mt-4">
                    @csrf
                    <div class="row">

                    <div class="form-group col-12 ">
                        <label for="libelle"class="fw-bold">Libellé<i class="text-danger">*</i></label>
                        <input type="text" name="libelle" id="libelle" class="form-control" required>
                    </div>

                    <div class="form-group col-12 ">
                        <label for="description" class="fw-bold">Description<i class="text-danger">*</i></label>
                        <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                    </div>

                    
                    <div class="col-12">
                        <label for="user_id" class="col-md-3 col-form-label"> site</label>
                        <select name="site_id" id="site_id" class="form-control form-select" required>
                            <option value="">Sélectionnez un site</option>
                            @foreach ($sites as $site)
                                <option value="{{ $site->id }}"> {{ $site->nom }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                    <div class="form-group col-sm-8 mt-3">
                        <button type="submit" class="btn btn-primary">Créer</button>
                        <a href="{{ route('payements.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
        
      </div>
    </div>
</div>

@endsection
