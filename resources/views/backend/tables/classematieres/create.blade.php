@extends("backend.layout.mainlayout")

@section("content")

<div class="row">

    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer une classe et sa matière</h3>
        <div class="card-text">
            <div class="">
            
                <form method="POST" action="{{ route('classematieres.store') }}" class="mt-4">
                    @csrf

                   <div class="row">
                    <div class="col-md-4">
                        <label for="matiere_id" class="fw-bold">Sélectionné une matière <i class="text-danger">*</i> </label>
                        <select name="matiere_id" id="matiere_id" class="form-control form-select" required>
                            <option value="">Sélectionnez un matière</option>
                            @foreach ($matieres as $matiere)
                                <option value="{{ $matiere->id }}"> {{ $matiere->libelle }} </option>
                            @endforeach
                        </select>
                    </div>

                       
                        <div class="col-md-4">
                            <label for="classe_id" class="fw-bold">Sélectionné une classe<i class="text-danger">*</i></label>
                            <select name="classe_id" id="classe_id" class="form-control form-select" required>
                                <option value="">Sélectionnez un classe</option>
                                @foreach ($classes as $classe)
                                    <option value="{{ $classe->id }}"> {{ $classe->sigle }} </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-4">
                            <label for="site_id" class="fw-bold">Sélectionné un site<i class="text-danger">*</i></label>
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
                        <a href="{{ route('classematieres.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
        
      </div>
    </div>


@endsection
