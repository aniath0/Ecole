@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des habilitations</h5>
        <div class="card-text">
        <h5><a href="{{ route('habilitations.create') }}" title="Ajouter un rôle" style="text-decoration: none;">Ajouter une habilitations<i class="bi bi-file-plus-fill"></i></a></h5>
            <div class="row">
                <table class="table table-bordered">
                    <thead class="text-black ">
                        <tr>
                                <th scope="cop" class="text-center">N°</th>
                                <th scope="cop" class="text-center">Libellés</th>
                                <th scope="cop" class="text-center">Descriptions</th>
                                <th scope="cop" class="text-center">Code</th>
                                <th scope="cop" class="text-center">Sites</th>
                                <th scope="cop" class="text-center" >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($habilitations as $habilitations)
                        <tr>

                             <td class="text-center">
                                
                                {{ $loop->iteration }}
                            </td>

                            <td class="text-center">
                                
                                {{ $habilitations->libelle }}
                            </td>

                            <td class="text-center">
                                
                                {{ $habilitations->description }}
                            </td>

                            <td class="text-center">
                                
                                {{ $habilitations->code }}
                            </td>

                            <td class="text-center">
                                {{ $habilitations->getsite->nom }}
                            </td>

                            <td class="text-center">
                                        <a class="btn bg-success text-white " href="{{ route('habilitations.edit', $habilitations) }}" title="Modifier un rôle"><i class="bi bi-pencil-square"></i></a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $habilitations->id }}"><i class="bi bi-trash" title="Supprimer"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal_{{ $habilitations->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Voulez-vous vraiment supprimer cet habilitation ?</p>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <form method="POST" action="{{ route('habilitations.destroy', $habilitations) }}" style="display: inline;">
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