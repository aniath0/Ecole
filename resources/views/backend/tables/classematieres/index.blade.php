@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des classes</h5>
        <div class="card-text">
        <h5><a href="{{ route('classematieres.create') }}"  style="text-decoration: none;">Ajouter une classe et sa matière<i class="bi bi-file-plus-fill"></i></a></h5>
            <div class="row">
                <table class="table table-bordered">
                    <thead class="text-black ">
                        <tr>
                                <th scope="cop" class="text-center">N°</th>
                                <th scope="cop" class="text-center">Matieres</th>
                                <th scope="cop" class="text-center">Classes</th>
                                <th scope="cop" class="text-center">Sites</th>
                                <th scope="cop" class="text-center">Actions</th>
                               
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
                                <a class="btn bg-success text-white " href="{{ route('classematieres.edit', $classematiere) }}" title="Modifier une classe"><i class="bi bi-pencil-square"></i></a>

                                <form method="POST" action="{{ route('classematieres.destroy', $classematiere->id) }}" style="display: inline;">
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