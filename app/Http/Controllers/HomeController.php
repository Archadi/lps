<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        //rqt série nouveautés
        $series = DB::select("select * from series order by annee desc limit 5");
        //$series = DB::table('series')->paginate(5);      

        //Tendances séries mieux notées
        $series_pop = DB::select("select series.*, count(*) as nb_vue, sum(evaluer) as ratio_like_dislike, count(*) + sum(evaluer) as score_popularite
        from series,consulter
        where series.id = consulter.serie_id
        group by series.id  
        ORDER BY score_popularite  DESC, ratio_like_dislike DESC 
        limit 5");

        //recommandation : si l'user est connecté
        if (Auth::check()) {
            //id de l'user connecté
           $user_id = Auth::id();
           $series_rcmd = DB::select("select series.*, count(*) as correspondance
           from series, corespondre
           where series.id = corespondre.serie_id
           and genre_id in (select genre_id from preferer where user_id = ?)
           GROUP by series.id
           having correspondance >= 1 
           ORDER BY correspondance  DESC 
           limit 5", [$user_id]);

           return view('home', compact('series', 'series_rcmd', 'series_pop'));

        }else{
            //dd($series);
            return view('home', compact('series', 'series_pop'));
        }
    }
}
