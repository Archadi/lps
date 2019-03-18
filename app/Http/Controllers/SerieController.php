<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class SerieController extends Controller
{
    public function show($id){
        //la série dont l'id est $id
        $serie = DB::table('series')->select('*')->where('id', $id)->get();

        if (Auth::check()) {
            //id de l'user connecté
           $user_id = Auth::id();
           $serie_consulter = DB::select("select * from consulter where serie_id = ? and user_id = ?", [$id, $user_id]);
           if(count($serie_consulter) == 0){
                $serie_consulter = DB::table('consulter')->insertGetId(['serie_id' => $id, 'user_id' => $user_id]);
           }
           //dd($serie_consulter, count($serie_consulter));
        }

        return view('Serie.show', compact('serie'));
    }

    public function search(Request $request){
        //requete de recherche par mot clé
        $mot = $request->input('motCle');
        
        /*$series = DB::select('select series.*
        from series, avoir, termes
        where series.id = avoir.serie_id
        and avoir.terme_id = termes.id
        and motCle like ?
        order by tf*idf desc', [$mot]);*/

        $series = DB::table('avoir')
                    ->join('series', 'avoir.serie_id', '=', 'series.id')
                    ->join('termes', 'avoir.terme_id', '=', 'termes.id')
                    ->select('series.*')
                    ->where('termes.motCle', 'like', $mot)
                    ->orderByRaw('tf*idf DESC')
                    ->paginate(10);

        

        //requete de recherche par titre
        if(count($series) == 0){
            //$series = DB::select('select series.* from series where titre like ?', ['%'.$mot.'%']);
            $series = DB::table('series')->where('titre', 'like', '%'.$mot.'%')->paginate(9);
        }

        //dd(empty($series));

        //recommandation : si l'user est connecté
        /*if (Auth::check()) {
            //id de l'user connecté
           $user_id = Auth::id();
           $series_rcmd = DB::select("select series.*, count(corespondre.genre_id) as nb_genres
           from series, corespondre, genres, preferer, users
           where series.id = corespondre.serie_id
           and corespondre.genre_id = genres.id
           and genres.id = preferer.genre_id
           and users.id = ?
           group by series.id
           HAVING nb_genres > 1
           order by nb_genres desc
           limit 6", [$user_id]);

           return view('Serie.index', compact('series', 'series_rcmd', 'mot'));

        }else{
            return view('Serie.index', compact('series', 'mot'));
        }*/
        
        return view('Serie.index', compact('series', 'mot'));
    }

    public function plusSeries(){
        $series = DB::table('series')->orderBy('annee', 'desc')->paginate(10); 
        return view('Serie.voir-plus-series', compact('series'));
    }

    public function plusRecommandations(){
        //id de l'user connecté
        $user_id = Auth::id();
        
        $res = DB::select("select series.*, count(*) as correspondance
           from series, corespondre
           where series.id = corespondre.serie_id
           and genre_id in (select genre_id from preferer where user_id = ?)
           GROUP by series.id
           having correspondance >= 1 
           ORDER BY correspondance  DESC", [$user_id]);

        /*$series = new Collection($res);

        // Paginate
        $perPage = 10; // Item per page
        $currentPage = Input::get('page') - 1; // url.com/test?page=2
        $pagedData = $series->slice($currentPage * $perPage, $perPage)->all();
        $series = new Paginator($pagedData, $perPage);
        //$collection= Paginator::make($pagedData, count($collection), $perPage);*/

        $collection = collect($res);

        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;

        $series = new LengthAwarePaginator($collection->forPage($page, $perPage), $collection->count(), $perPage, $page, ['path'=>url('/recommandations')]);

        //$series = new LengthAwarePaginator($res, 10, ['path'=>url('/recommandations')]);

        return view('Serie.voir-plus-recommandations', compact('series'));
    }

    public function plusTendances(){
        //id de l'user connecté
        $user_id = Auth::id();
        
        $res = DB::select("select series.*, count(*) as nb_vue, sum(evaluer) as ratio_like_dislike, count(*) + sum(evaluer) as score_popularite
        from series,consulter
        where series.id = consulter.serie_id
        group by series.id  
        ORDER BY score_popularite  DESC, ratio_like_dislike DESC");

        $collection = collect($res);

        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;

        $series = new LengthAwarePaginator($collection->forPage($page, $perPage), $collection->count(), $perPage, $page, ['path'=>url('/recommandations')]);

        //$series = new LengthAwarePaginator($res, 10, ['path'=>url('/recommandations')]);

        return view('Serie.voir-plus-tendances', compact('series'));
    }
}
