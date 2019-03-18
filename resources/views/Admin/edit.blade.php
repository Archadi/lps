@extends('layouts.admin')
@section('title','LpProdSeries|Gestion Séries')

@section('body')
<section class="container-fluid">
        <div class="row">
            <!--<div class="col-lg-12">
                <h1 class="display-4">Nouveauté</h1><hr>
            </div>-->
            <div class="col-lg-12">
             <table class="table table-bordered text-center">
             <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Titre</th>
                    <th>Vues</th>
                    <th>J'aimes</th>
                    <th>J'aimes pas</th>
                    <th>Actions</th>
                </tr>
                </thead>
                @foreach($series as $serie)
                <tr>
                    <td>{{$serie->id}}</td>
                    <td>{{$serie->titre}}</td>
                    <td>{{DictSerie::getVues($serie->id)}}</td>
                    <td>{{DictSerie::getLikes($serie->id)}}</td>
                    <td>{{DictSerie::getDislikes($serie->id)}}</td>
                    <td><a class="btn btn-warning" href="#" >Modifier</a>&nbsp;&nbsp;<a class="btn btn-danger" href="#">Supprimer</a> 
                </tr>
                @endforeach
             </table> 
            </div>
        </div>
        <div class="row justify-content-md-center">{{$series->links()}}</div>
</section>

@endsection
