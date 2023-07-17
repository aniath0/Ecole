@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des maîtres</h5>
        <div class="card-text">
        <h5><a href="{{ route('maitres.create') }}"  style="text-decoration: none;">Ajouter un maitre<i class="bi bi-file-plus-fill"></i></a></h5>
            <div class="row">
                <table class="table table-bordered">
                    <thead class="text-black ">
                        <tr>
                                <th scope="cop" class="text-center">N°</th>
                                <th scope="cop" class="text-center">Nom</th>
                                <th scope="cop" class="text-center">Prenoms</th>
                                <th scope="cop" class="text-center">User</th>
                                <!--th scope="cop" class="text-center">ACTIONS</th-->
                               
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maitres as $maitre)
                        <tr>

                            <td class="text-center">
                                
                                {{ $loop->iteration }}
                            </td>
                            
                            <td class="text-center">
                                {{ $maitre->nom }}
                            </td>

                            <td class="text-center">
                                {{ $maitre->prenom}}
                            </td>

                            <td class="text-center">
                                {{ $maitre->getuser->name }}
                            </td>
                            <td class="text-center">
                                <!--a class="btn bg-success text-white " href="{{ route('maitres.edit', $maitre) }}" title="Modifier un maitre"><i class="bi bi-pencil-square"></i></a>

                                <form method="POST" action="{{ route('maitres.destroy', $maitre) }}" style="display: inline;">
                                    
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger">
                                         <i class="bi bi-trash"></i> 
                                    </button>

                                    
                                </form-->
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