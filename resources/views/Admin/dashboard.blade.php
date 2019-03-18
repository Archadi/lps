@extends('layouts.admin')
@section('title','LpProdSeries|Tableau de bord')

@section('body')
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-4">Informations générales</h1><hr>
            </div>
            <div class="col-lg-12">
                <div class="card-deck">
                    
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><span class="text-muted">Séries</span></h5>
                            <p class="card-text"><span class="text-muted"><i class="fas fa-eye" style="font-size:100px;color:silver;"></i></span></p>
                            <p class="card-text">pourcentage de série consultées</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $consulter }}%;" aria-valuenow="{{ $consulter }}" aria-valuemin="0" aria-valuemax="100">{{ $consulter }}%</div>
                            </div>
                        </div>
                    </div>

                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><span class="text-muted">Visite du jour</span></h5>
                            <p class="card-text"><span class="font-weight-bold">245</span></p>
                            <span><img src="{{ asset('icons/analytics.svg') }}" alt="icons graphiques" width="140" height="140"></span>
                        </div>
                    </div>

                    <!--<div class="card text-center" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Séries</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                    </div>-->

                    <div class="">
                        <div class="row">
                            <div class="card mb-1" style="width: 18rem;">
                                <div class="card-body">
                                    <h6 class="card-title text-center"><span class="text-muted">Total séries</span></h6>
                                    <span><i class="fas fa-film" style="font-size:25px;"></i></span>
                                    <p class="card-text text-center font-weight-bold">{{ $nb_series }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="card mt-3" style="width: 18rem;">
                                <div class="card-body">
                                    <h6 class="card-title text-center"><span class="text-muted">Utilisateurs inscrits</span></h6>
                                    <span><i class="fas fa-user-alt" style="font-size:25px;"></i></span>
                                    <p class="card-text text-center font-weight-bold">{{ $nb_users }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </section>
    
    <!--<hr class="my-4">-->
    <br/>

    
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-4">Actions sur séries</h1><hr>
            </div>
            <div class="col-lg-12">
                <div class="card-deck">
                    
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><span class="text-muted">Ajouter</span></h5>
                            <p class="card-text"><span class="text-muted"><i class="fas fa-plus" style="font-size:200px;color:silver;"></i></span></p>
                        </div>
                    </div>

                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><span class="text-muted">Modifier</span></h5>
                            <p class="card-text"><span class="text-muted"><i class="fas fa-edit" style="font-size:200px;color:silver;"></i></span></p>
                        </div>
                    </div>

                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><span class="text-muted">Supprimer</span></h5>
                            <p class="card-text"><span class="text-muted"><i class="fas fa-trash-alt" style="font-size:200px;color:silver;"></i></span></p>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </section>

@endsection
