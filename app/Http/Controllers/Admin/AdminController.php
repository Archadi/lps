<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        //nombre d'utilisateur inscrits
        $nb_users = DB::table("users")->count();

        $nb_series = DB::table("series")->count();

        $nb_series_vue = DB::select("select count(distinct serie_id) as serie_vue from consulter");

        $consulter = round(($nb_series_vue[0]->serie_vue / $nb_series) * 100);

        //dd($nb_series_vue[0]->serie_vue, $nb_users, $consulter);

        return view('Admin.dashboard', compact('nb_users', 'nb_series', 'consulter'));
    }

    public function actionsEditDelete(){
        $series = DB::table('series')->select('id', 'titre')->paginate(10);

        return view('Admin.edit', compact('series'));
    }

}
