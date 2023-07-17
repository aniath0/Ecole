@extends("layouts.app")

@section("content")
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card "style="margin-top: 120px;">
                    <h3 class="card-header text-center">Se connecter</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Se connecter</button>
                            </div>
                            <div class="d-flex">
                                    <h6>vous n'avez pas de compte?</h6>
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register-user') }}">
                                S'inscrire
                                    </a>
                                    
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</main>
@endsection
