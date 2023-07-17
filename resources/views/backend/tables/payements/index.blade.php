@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des statuts payements</h5>
        <div class="card-text">
        <h5><a href="{{ route('payements.create') }}" title="Ajouter un rôle" style="text-decoration: none;">Ajouter un rôle<i class="bi bi-file-plus-fill"></i></a></h5>
            <div class="row">
                <table class="table table-bordered">
                    <thead class="text-black ">
                        <tr>
                                <th scope="cop" class="text-center">N°</th>
                                <th scope="cop" class="text-center">Libellés</th>
                                <th scope="cop" class="text-center">Descriptions</th>
                                <th scope="cop" class="text-center">Site</th>
                                <th scope="cop" class="text-center" >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payements as $payement)
                        <tr>
                            <td class="text-center">
                                
                                {{ $loop->iteration }}
                            </td>
                            
                            <td class="text-center">
                                
                                {{ $payement->libelle }}
                            </td>

                            <td class="text-center">
                                
                                {{ $payement->description }}
                            </td>

                            <td class="text-center">
                                {{ $payement->getsite->nom }}
                            </td>

                            <td class="text-center">
                                        <a class="btn bg-success text-white " href="{{ route('payements.edit', $payement) }}" title="Modifier un rôle"><i class="bi bi-pencil-square"></i></a>

                                        <form method="POST" action="{{ route('payements.destroy', $payement) }}" style="display: inline;">
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