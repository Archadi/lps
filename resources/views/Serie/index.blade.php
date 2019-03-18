@extends('layouts.master')
@section('title','LpProdSeries|Recherche')

@section('body')
<div class="container">
    <section class="container pt-3">
        <div class="row">
            <div class="col-lg-12">
                <p><a href="{{route('home')}}">Accueil</a> > Résultat(s) pour : <span class="font-italic">{{$mot}}</span></p>
            </div>
            <!--<div class="col-lg-12">
                <h4 class="display">Résultat(s) pour : <span class="font-italic">{{$mot}}</span></h4>
            </div>-->
            <div class="col-lg-12">
                @if(isset($mot))
                    @if(count($series) == 0)
                    <div class="alert alert-danger" role="alert">
                        Aucun résultat pour <span class="font-italic">{{$mot}}</span>.
                    </div>
                    @endif
                @endif
                <div class="row mt-5 justify-content-center">
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
                <div class="row justify-content-md-center">{{$series->appends(['motCle' => $mot])->links()}}</div>
            </div>
        </div>
    </section>
</div>

@endsection
