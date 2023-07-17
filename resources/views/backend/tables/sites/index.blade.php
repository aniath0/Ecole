@extends("backend.layout.mainlayout")

@section("content")

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des sites</h5>
        <div class="card-text">
        <h5><a href="{{ route('sites.create') }}" title="Ajouter un site" style="text-decoration: none;">Ajouter un site<i class="bi bi-file-plus-fill"></i></a></h5>
            <div class="row">
                <table class="table table-bordered">
                    <thead class="text-black ">
                        <tr>
                                <th scope="cop" class="text-center">Id</th>
                                <th scope="cop" class="text-center">Noms des sites</th>
                                <th scope="cop" class="text-center">Directeurs</th>
                                <th scope="cop" class="text-center">Etablissements</th>
                                <th scope="cop" class="text-center" >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sites as $site)
                        <tr>

                             <td class="text-center">
                                
                                {{ $loop->iteration }}
                            </td>

                            <td class="text-center">
                                
                                {{ $site->nom }}
                            </td>

                            <td class="text-center">
                                
                                {{ $site->getuser->name }}
                            </td>

                            <td class="text-center">
                                {{ $site->getetablissement->nom }} 
                            </td>

                            <td class="text-center">
                                        <a class="btn bg-success text-white " href="{{ route('sites.edit', $site) }}" title="Modifier un rôle"><i class="bi bi-pencil-square"></i></a>

                                        <form method="POST" action="{{ route('sites.destroy', $site) }}" style="display: inline;">
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