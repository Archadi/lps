@extends('layouts.master')
@section('title','LpProdSeries|Accueil')

@section('body')

    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-4">Nouveauté</h1><hr>
            </div>
            <div class="col-lg-12">
                @if(isset($mot))
                    @if(count($series) == 0)
                    <div class="alert alert-danger" role="alert">
                        Aucun résultat pour <span class="font-italic">{{$mot}}</span>.
                    </div>
                    @endif
                @endif
                <div class="card-deck">
                    @foreach($series as $serie)
                        <div class="card mt-3 mb-3 ml-3 mr-3" style="width: 18rem;">
                            <img src="{{$serie->image}}" class="card-img-top" alt="le poster de la série" width="100%" height="350">
                            <div class="card-body">
                                <h4 class="card-text"><a href="{{route('serie.show', $serie->id)}}">{{$serie->titre}}</a></h4>
                                <small class="text-muted">{{$serie->annee}}</small>
                                <div class="row">
                                    <span><i class="fa fa-thumbs-up" ></i> : {{DictSerie::getLikes($serie->id)}}</span>&nbsp;&nbsp;
                                    <span><i class="fas fa-thumbs-down" ></i> : {{DictSerie::getDislikes($serie->id)}}</span>&nbsp;&nbsp;
                                    <span><i class="fas fa-eye"></i> : {{DictSerie::getVues($serie->id)}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-md-center"><a href="{{route('serie.plus')}}" title="Voir plus de nouveautés">plus de séries</a></div>
            </div>
        </div>
    </section>
    
    <!--<hr class="my-4">-->
    <br/>

    @auth
    @if(count($series_rcmd) != 0)
    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-4">Recommandation</h1><hr>
            </div>
            <div class="col-lg-12">
                <div class="card-deck">
                    @foreach($series_rcmd as $serie_rcmd)
                            <div class="card mt-3 mb-3 ml-3 mr-3" style="width: 18rem;">
                                <img src="{{$serie_rcmd->image}}" class="card-img-top" alt="le poster de la série" width="100%" height="350">
                                <div class="card-body">
                                    <h4 class="card-text"><a href="{{route('serie.show', $serie_rcmd->id)}}">{{$serie_rcmd->titre}}</a></h4>
                                    <small class="text-muted">{{$serie_rcmd->annee}}</small>
                                    <div class="row">
                                    <span><i class="fa fa-thumbs-up" ></i> : {{DictSerie::getLikes($serie_rcmd->id)}}</span>&nbsp;&nbsp;
                                    <span><i class="fas fa-thumbs-down" ></i> : {{DictSerie::getDislikes($serie_rcmd->id)}}</span>&nbsp;&nbsp;
                                    <span><i class="fas fa-eye"></i> : {{DictSerie::getVues($serie_rcmd->id)}}</span>
                                </div>
                                </div>
                            </div>
                    @endforeach
                </div>
                <div class="row justify-content-md-center"><a href="{{route('recommandations.plus')}}" title="Voir plus de recommandations">plus de séries</a></div>
            </div>
        </div>
    </section>
    @endif
    @endauth

    @if(count($series_pop) != 0)
    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-4">Tendances</h1><hr>
            </div>
            <div class="col-lg-12">
                <div class="card-deck">
                    @foreach($series_pop as $serie_pop)
                            <div class="card mt-3 mb-3 ml-3 mr-3" style="width: 18rem;">
                                <img src="{{$serie_pop->image}}" class="card-img-top" alt="le poster de la série" width="100%" height="350">
                                <div class="card-body">
                                    <h4 class="card-text"><a href="{{route('serie.show', $serie_pop->id)}}">{{$serie_pop->titre}}</a></h4>
                                    <small class="text-muted">{{$serie_pop->annee}}</small>
                                    <div class="row">
                                    <span><i class="fa fa-thumbs-up" ></i> : {{DictSerie::getLikes($serie_pop->id)}}</span>&nbsp;&nbsp;
                                    <span><i class="fas fa-thumbs-down" ></i> : {{DictSerie::getDislikes($serie_pop->id)}}</span>&nbsp;&nbsp;
                                    <span><i class="fas fa-eye"></i> : {{DictSerie::getVues($serie_pop->id)}}</span>
                                </div>
                                </div>
                            </div>
                    @endforeach
                </div>
                <div class="row justify-content-md-center"><a href="{{route('tendances.plus')}}" title="Voir plus de séries tendances">plus de séries</a></div>
            </div>
        </div>
    </section>
    @endif


@endsection