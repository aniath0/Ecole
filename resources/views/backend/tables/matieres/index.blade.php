@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des matiètres</h5>
        <div class="card-text">
        <h5><a href="{{ route('matieres.create') }}" title="Ajouter une matière" style="text-decoration: none;">Ajouter une matière<i class="bi bi-file-plus-fill"></i></a></h5>
            <div class="row">
                <table class="table table-bordered">
                    <thead class="text-black ">
                        <tr>
                                <th scope="cop" class="text-center">N°</th>
                                <th scope="cop" class="text-center">Libellés</th>
                                <th scope="cop" class="text-center">Descriptions</th>
                                <th scope="cop" class="text-center">Coefficients</th>
                                <th scope="cop" class="text-center">Notes maximales</th>
                                <th scope="cop" class="text-center">Notes soumises</th>
                                <th scope="cop" class="text-center">Site</th>
                                <th scope="cop" class="text-center" >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matieres as $matiere)
                        <tr>

                            <td class="text-center">
                                
                                {{ $loop->iteration }}
                            </td>

                            <td class="text-center">
                                
                                {{ $matiere->libelle }}
                            </td>

                            <td class="text-center">
                                
                                {{ $matiere->description }}
                            </td>

                            <td class="text-center">
                                
                                {{ $matiere->coefficient }}
                            </td>

                            <td class="text-center">
                                
                                {{ $matiere->notemax }}
                            </td>

                            <td class="text-center">
                                
                                {{ $matiere->notesoumise }}
                            </td>

                            <td class="text-center">
                                {{ $matiere->getsite->nom }}
                            </td>

                            <td class="text-center">
                                        <a class="btn bg-success text-white " href="{{ route('matieres.edit', $matiere) }}" title="Modifier un rôle"><i class="bi bi-pencil-square"></i></a>

                                        <form method="POST" action="{{ route('matieres.destroy', $matiere->id) }}" style="display: inline;">
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