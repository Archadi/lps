<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LpProdSeries|Préférences</title>

    <style>
        html,
        body{
        height: 100%;
        }

        #cover {
        background:  url('') center center no-repeat;
        background-size: cover;
        height: 100%;
        text-align: center;
        display: flex;
        align-items: center;
        }

        #cover-caption {
        width: 100%;
        }
    </style>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  </head>
  <body>
    <section id="cover">
        <div id="cover-caption">
            <div id="container" class="container">
                @if (session('error'))
                    <div class="row justify-content-md-center">
                            <div class="alert alert-danger">
                                <p>{{ session('error') }}</p>
                            </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-6 offset-sm-3 text-center">
                        <div class="card text-center">
                            <div class="card-header">
                                <h1 class="display-4">LpProdSeries</h1>
                            </div>
                            <div class="card-body">
                                <div class="info-form">
                                    <p>Quelles sont tes préférences ?<br/><span class="text-muted">(au moins 3 genres)</span></p>
                                    <form action="/post-register" method="post" class="form-inlin justify-content-center">
                                        @csrf
                                        @foreach($genres as $id => $libelle)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="genres_{{$id}}" value="{{ $id }}">
                                                <label class="form-check-label" for="inlineCheckbox1">{{ $libelle }}</label>
                                            </div>
                                        @endforeach
                                        <br/><br/>
                                        <button type="submit" class="btn btn-success ">okay, go!</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<script src="js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  </body>
</html>



