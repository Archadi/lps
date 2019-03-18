<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegister;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

     /**
     * create a new utilisateur.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //validation des inputs
        $requestValidator = new StoreRegister;
        $validator = Validator::make($request->all(), $requestValidator->rules(), $requestValidator->messages());
        
        if ($validator->fails()) {
            //si le valididor est faux on redirige avec les erreurs
            return back()->withErrors($validator)->withInput();
        }else{
            //sinon on créer l'user
            $utilisateur_id = DB::table('users')->insertGetId(
                ['pseudo' => e($request->input('pseudo')),
                 'email' => e($request->input('email')), 
                 'password' => Hash::make($request->input('password')),
                 ]
            );

            //on connecte l'user
            Auth::attempt($request->only('pseudo', 'password'));

            //on le redirige vers l'accueil            
            return redirect('/')->with('success', 'Vous êtes connecté');
        }

    }

    public function postRegister(Request $request){
        if($request->isMethod('get')){
            //pour l'affichage du form
            $genres = DB::table('genres')->pluck('libelle', 'id');
            return view('post-register', compact('genres'));
        }else{
            //pour la soumission du form
           
            if(count($request->except('_token')) >= 3){
                dd($request->except('_token'), count($request->except('_token')));
            }else{
                return back()->with('error', 'Veuillez selectionner au moins 3 genres!')->withInput();
            }
        }
        
    }
}
