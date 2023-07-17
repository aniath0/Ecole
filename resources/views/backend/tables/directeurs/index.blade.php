@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des directeurs</h5>
        <div class="card-text">
        <h5><a href="{{ route('directeurs.create') }}"  style="text-decoration: none;">Ajouter un Directeur<i class="bi bi-file-plus-fill"></i></a></h5>
            <div class="row">
                <table class="table table-bordered">
                    <thead class="text-black ">
                        <tr>
                                <th scope="cop" class="text-center">N°</th>
                                <th scope="cop" class="text-center">Nom</th>
                                <th scope="cop" class="text-center">Prenoms</th>
                                <th scope="cop" class="text-center">Users</th>
                               
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($directeurs as $directeur)
                        <tr>

                            <td class="text-center">
                                
                                {{ $loop->iteration }}
                            </td>
                            
                            <td class="text-center">
                                {{ $directeur->nom }}
                            </td>

                            <td class="text-center">
                                {{ $directeur->prenom}}
                            </td>


                            <td class="text-center">
                                {{ $directeur->getuser->id }}
                            </td>


                            <!--td class="text-center">
                                <a class="btn bg-success text-white " href="{{ route('directeurs.edit', $directeur) }}" title="Modifier un rôle"><i class="bi bi-pencil-square"></i></a>

                                <form method="POST" action="{{ route('directeurs.destroy', $directeur) }}" style="display: inline;">
                                   
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger">
                                         <i class="bi bi-trash"></i> 
                                    </button>

                                    
                                </form>
                            </td-->
                            

                           

                            
                            
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