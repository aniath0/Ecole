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

                                        <form method="POST" action="{{ route('habilitations.destroy', $habilitations) }}" style="display: inline;">
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