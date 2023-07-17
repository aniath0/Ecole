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

                                <form method="POST" action="{{ route('classes.destroy', $classe) }}" style="display: inline;">
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