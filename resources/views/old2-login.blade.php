<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LpProdSeries|Authentification</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
    <div class="row justify-content-md-center"><a href="#"><h1 class="display-1">LpProdSeries</h1></a></div><br/><br/>
    <div class="row">
        <div class="col col-sm-6" style="border-right: 1px solid hsla(200, 10%, 50%,100);">

            <div class="row justify-content-md-center"><h4 class="display">Connexion</h4></div><br/><br/><br/>

            <form method="POST" action="/login">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pseudo</label>
                    <div class="col-sm-10">
                        <input type="text" name="pseudo" class="form-control" placeholder="Entez votre pseudo">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" placeholder="Entez votre mot de passe">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
        </div>


        <div class="col col-sm-6" style="border-left: 1px solid hsla(200, 10%, 50%,100);">
            
            <div class="row justify-content-md-center md-3"><h4 class="display">Inscription</h4></div><br/><br/><br/>

            <form method="POST" action="/register">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pseudo</label>
                    <div class="col-sm-10">
                        <input type="text" name="pseudo" class="form-control" placeholder="Entez votre pseudo">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" placeholder="Entez votre email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" placeholder="Entez votre mot de passe">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">S'inscrire</button>
            </form>
        </div>
    </div>
    </div>
    <!--<script src="js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  </body>
</html>



