@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Créer un etablissement</h3>
        <div class="card-text">
            <div class="">
            
                <form action="{{ route('etablissements.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <div class="row">
                        <div class="form-group col-4 ">
                            <label for="nom"class="fw-bold">Nom<i class="text-danger">*</i></label>
                            <input type="text" name="nom" id="nom" class="form-control" required>
                        </div>
    
                        <div class="form-group col-4 ">
                            <label for="adresse" class="fw-bold">Adresse<i class="text-danger">*</i></label>
                            <input type="text" name="adresse" id="adresse" class="form-control" required>
                        </div>
    
                        <div class="form-group col-4 ">
                            <label for="sigle"class="fw-bold">Sigle<i class="text-danger">*</i></label>
                            <input type="text" name="sigle" id="sigle" class="form-control" required>
                        </div>
    
                        <div class="form-group col-4 ">
                            <label for="anneecreation"class="fw-bold">Année de creation<i class="text-danger">*</i></label>
                            <input type="text" name="anneecreation" id="anneecreation" class="form-control" required>
                        </div>
    
                        <div class="form-group col-4 ">
                            <label for="telephone"class="fw-bold">Telephone<i class="text-danger">*</i></label>
                            <input type="text" name="telephone" id="telephone" class="form-control" required>
                        </div>
    
                        <div class="form-group col-4 ">
                            <label for="logo"class="fw-bold">Logo<i class="text-danger">*</i></label>
                            <input type="file" name="logo" id="logo" class="form-control" >
    
                        </div>
    
                    </div>
                    
                    <div class="form-group col-sm-8 ">
                        <button class="btn btn-primary">Créer</button>
                        <a href="{{ route('etablissements.index') }}" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
        
      </div>
    </div>
</div>

@endsection
