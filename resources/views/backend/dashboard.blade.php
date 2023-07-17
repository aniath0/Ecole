@extends('backend.layout.mainlayout')

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Users Card -->
        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Nombre d'utilisateur</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $countuser }}</h6>
                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Directeurs Card -->
        

        <!-- Rôles Card -->
        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Nombre de rôle</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $countrole }}</h6>
                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statuts Card -->
        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Nombre de statut</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $countstatut }}</h6>
                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Nombre de classe</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $countclasse }}</h6>
                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Liste des habilitations</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $counthabilitations }}</h6>
                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Nombre d'habilitation</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $countetablissement }}</h6>
                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"></a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Nombre de matiere</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $countmatiere }}</h6>
                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        
</section>

@endsection
