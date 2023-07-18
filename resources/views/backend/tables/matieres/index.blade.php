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
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $matiere->id }}"><i class="bi bi-trash" title="Supprimer"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal_{{ $matiere->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Voulez-vous vraiment supprimer cet enregistrement ?</p>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <<form method="POST" action="{{ route('matieres.destroy', $matiere->id) }}" style="display: inline;">
                                            <!-- CSRF token -->
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">
                                                 <i class="bi bi-trash"></i> 
                                            </button>

                                            
                                        </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                        
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