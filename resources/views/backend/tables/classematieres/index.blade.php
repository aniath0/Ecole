@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des classes</h5>
        <div class="card-text">
        <h5><a href="{{ route('classematieres.create') }}" style="text-decoration: none;">Ajouter une classe et sa matière<i class="bi bi-file-plus-fill"></i></a></h5>
            <div class="row">
                <table class="table table-bordered">
                    <thead class="text-black">
                        <tr>
                            <th scope="col" class="text-center">N°</th>
                            <th scope="col" class="text-center">Matieres</th>
                            <th scope="col" class="text-center">Classes</th>
                            <th scope="col" class="text-center">Sites</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classematieres as $classematiere)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-center">
                                {{ $classematiere->getmatiere->libelle }}
                            </td>
                            <td class="text-center">
                                {{ $classematiere->getclasse->sigle }}
                            </td>
                            <td class="text-center">
                                {{ $classematiere->getsite->nom }}
                            </td>
                            <td class="text-center">
                                <a class="btn btn-success text-white" href="{{ route('classematieres.edit', $classematiere) }}" title="Modifier une classe"><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $classematiere->id }}"><i class="bi bi-trash" title="Supprimer"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal_{{ $classematiere->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <form method="POST" action="{{ route('classematieres.destroy', $classematiere->id) }}" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Oui</button>
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
</div>
@endsection
