@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer une habilitation</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('habilitations.store') }}" class="mt-4">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="libelle"class="fw-bold">Libellé<i class="text-danger">*</i></label>
                            <input type="text" name="libelle" id="libelle" class="form-control" required>
                        </div>
                        
                        <div class="col-6">
                            <label for="code" class="fw-bold">Code<i class="text-danger">*</i></label>
                            <input name="code" id="code" class="form-control" rows="3" required></input>
                        </div>
    
                       
                            <div class="col-6">
                                <label for="user_id" class="form-label">Sélectionné un site</label>
                                <select name="site_id" id="site_id" class="form-control" required>
                                    <option value="">Sélectionnez un site</option>
                                    @foreach ($sites as $site)
                                        <option value="{{ $site->id }}"> {{ $site->nom }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class=" col-8">
                            <label for="description" class="fw-bold">Description<i class="text-danger">*</i></label>
                            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>

                    

                    <div class="col-4 pt-5">
                        <button type="submit" class="btn btn-primary">Créer</button>
                        <a href="{{ route('habilitations.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
        
      </div>
    </div>
</div>

@endsection
