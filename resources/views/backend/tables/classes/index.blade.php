@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des classes</h5>
        <div class="card-text">
        <h5><a href="{{ route('classes.create') }}"  style="text-decoration: none;">Ajouter une classe<i class="bi bi-file-plus-fill"></i></a></h5>
            <div class="row">
                <table class="table table-bordered">
                    <thead class="text-black ">
                        <tr>
                                <th scope="cop" class="text-center">N°</th>
                                <th scope="cop" class="text-center">Sigles</th>
                                <th scope="cop" class="text-center">Libellés</th>
                                <th scope="cop" class="text-center">Effectifs</th>
                                <th scope="cop" class="text-center">Noms maîtres</th>
                                <th scope="cop" class="text-center">Sites</th>
                                <th scope="cop" class="text-center">Actions</th>
                               
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $classe)
                        <tr>

                            <td class="text-center">
                                
                                {{ $loop->iteration }}
                            </td>
                            
                            <td class="text-center">
                                {{ $classe->sigle }}
                            </td>

                            <td class="text-center">
                                {{ $classe->libelle}}
                            </td>

                            <td class="text-center">
                                {{ $classe->effectif}}
                            </td>

                            <td class="text-center">
                                {{ $classe->getuser->name }}
                            </td>

                            <td class="text-center">
                                {{ $classe->getsite->nom }}
                            </td>

                            <td class="text-center">
                                <a class="btn bg-success text-white " href="{{ route('classes.edit', $classe) }}" title="Modifier une classe"><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $classe->id }}"><i class="bi bi-trash" title="Supprimer"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal_{{ $classe->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Voulez-vous vraiment supprimer cette classe ?</p>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <form method="POST" action="{{ route('classes.destroy', $classe) }}" style="display: inline;">
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