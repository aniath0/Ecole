@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des matiètres</h5>
        <div class="card-text">
        <h5><a href="{{ route('etablissements.create') }}" title="Ajouter un etablissement" style="text-decoration: none;">Ajouter un etablissement<i class="bi bi-file-plus-fill"></i></a></h5>
            <div class="row">
                <table class="table table-bordered">
                    <thead class="text-black ">
                        <tr>
                                <th scope="cop" class="text-center">N°</th>
                                <th scope="cop" class="text-center">Sigle</th>
                                <th scope="cop" class="text-center">Nom</th>
                                <th scope="cop" class="text-center">Adresse</th>
                                <th scope="cop" class="text-center">Année de creation</th>
                                <th scope="cop" class="text-center">Logo</th>
                                <th scope="cop" class="text-center">Téléphone</th>
                                <th scope="cop" class="text-center" >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etablissements as $etablissement)
                        <tr>

                            <td class="text-center">
                                
                                {{ $loop->iteration }}
                            </td>

                            <td class="text-center">
                                
                                {{ $etablissement->sigle }}
                            </td>

                            <td class="text-center">
                                
                                {{ $etablissement->nom }}
                            </td>

                            <td class="text-center">
                                
                                {{ $etablissement->adresse }}
                            </td>

                            <td class="text-center">
                                
                                {{ $etablissement->anneecreation }}
                            </td>

                            <td class="text-center">
                                
                                {{ $etablissement->logo }}
                            </td>

                            <td class="text-center">
                                
                                {{ $etablissement->telephone }}
                            </td>
                            <td class="text-center">
                                        <a class="btn bg-success text-white " href="{{ route('etablissements.edit', $etablissement) }}" title="Modifier un rôle"><i class="bi bi-pencil-square"></i></a>

                                        <form method="POST" action="{{ route('etablissements.destroy', $etablissement) }}" style="display: inline;">
                                            <!-- CSRF token -->
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">
                                                 <i class="bi bi-trash"></i> 
                                            </button>

                                            
                                        </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection