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
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $etablissement->id }}"><i class="bi bi-trash" title="Supprimer"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal_{{ $etablissement->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Voulez-vous vraiment supprimer cet etablissement ?</p>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <<form method="POST" action="{{ route('etablissements.destroy', $etablissement) }}" style="display: inline;">
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