@extends('layouts.master')
@section('title','LpProdSeries|Série')



@section('body')
<div class="container">
    <div class="row"> <a href="{{ URL::previous() }}"><i class="fa fa-arrow-left" style="font-size:36px"></i></a> </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-sm-4">
                <img src="{{$serie[0]->image}}" class="rounded float-left" alt="le poster de la série" width="100%" height="350">
            </div>
            <div class="col-sm-8">
                <h2 class="display">{{$serie[0]->titre}}</h2>
                <p class="text-muted">{{$serie[0]->annee}}</p>
                <p>
                    <span id="nb_like"><i class="fa fa-thumbs-up" ></i> : {{DictSerie::getLikes($serie[0]->id)}}</span>&nbsp;&nbsp;
                    <span id="nb_dislike"><i class="fas fa-thumbs-down" ></i> : {{DictSerie::getDislikes($serie[0]->id)}}</span>&nbsp;&nbsp;
                    <span><i class="fas fa-eye"></i> : {{DictSerie::getVues($serie[0]->id)}}</span>
                </p>
                <p>Genre(s) : {{DictSerie::getGenres($serie[0]->id)}}</p>
                <p>{{$serie[0]->synopsis}}</p>
            </div>
        </div>
        @auth
            <div class="row justify-content-md-center">
                @if(DictSerie::userLike($serie[0]->id, Auth::id()))
                    <a class="btn btn-outline-primary btn-sm active" id="like">J'aime <i class="fa fa-thumbs-up" ></i></a>&nbsp;&nbsp;
                    <a class="btn btn-outline-danger btn-sm" id="dislike">J'aime pas <i class="fas fa-thumbs-down" ></i></a>&nbsp;&nbsp;
                @elseif(DictSerie::userDislike($serie[0]->id, Auth::id()))
                    <a class="btn btn-outline-primary btn-sm" id="like">J'aime <i class="fa fa-thumbs-up" ></i></a>&nbsp;&nbsp;
                    <a class="btn btn-outline-danger btn-sm active" id="dislike">J'aime pas <i class="fas fa-thumbs-down" ></i></a>&nbsp;&nbsp;
                @else
                    <a class="btn btn-outline-primary btn-sm" id="like">J'aime <i class="fa fa-thumbs-up" ></i></a>&nbsp;&nbsp;
                    <a class="btn btn-outline-danger btn-sm" id="dislike">J'aime pas <i class="fas fa-thumbs-down" ></i></a>&nbsp;&nbsp;
                @endif
            </div>
        @endauth
    </div>
</div>

@endsection

@section('js')
    @auth
    <script>
        $("#like").click(function(){
            $.ajax({
                    dataType: "html",
                    method: "POST",
                    url: "{{route('api.serie.like')}}",
                    data: {serie_id:"{{$serie[0]->id}}", user_id:"{{Auth::id()}}"},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    success: function (dataJSON) { 
                        $("#like").attr("class", "btn btn-outline-primary btn-sm " + dataJSON.response.active);
                        $("#dislike").attr("class", "btn btn-outline-danger btn-sm"); 
                        $("#nb_like").html("<i class='fa fa-thumbs-up' ></i> : " + dataJSON.response.nb_like);
                        $("#nb_dislike").html("<i class='fas fa-thumbs-down' ></i> : " + dataJSON.response.nb_dislike);
                    }
                });    
        });

        $("#dislike").click(function(){ 
            $.ajax({
                    dataType: "html",
                    method: "POST",
                    url: "{{route('api.serie.dislike')}}",
                    data: {serie_id:"{{$serie[0]->id}}", user_id:"{{Auth::id()}}"},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    success: function (dataJSON) {
                        console.log(dataJSON.response);
                        $("#dislike").attr("class", "btn btn-outline-danger btn-sm " + dataJSON.response.active);
                        $("#like").attr("class", "btn btn-outline-primary btn-sm");
                        $("#nb_like").html("<i class='fa fa-thumbs-up' ></i> : " + dataJSON.response.nb_like);
                        $("#nb_dislike").html("<i class='fas fa-thumbs-down' ></i> : " + dataJSON.response.nb_dislike);                       
                    }
                });    
        });
    </script>
    @endauth
@endsection
