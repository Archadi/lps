<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLogin;

class LoginController extends Controller
{
    //connexion de user
    public function login(Request $request){
        //valisation des inputs
        $requestValidator = new StoreLogin;
        $validator = Validator::make($request->all(), $requestValidator->rules(), $requestValidator->messages());

        //si errors redirection vers le form avec errors
        if ($validator->fails()) {
            //si le valididor est faux on redirige avec les erreurs
            return back()->withErrors($validator)->withInput();
        }else{
            
            $credentials = $request->only('pseudo', 'password');
            //vérification des coordonnées
            if (Auth::attempt($credentials)){
                //l'authetification est ok
                return redirect('/')->with('success', 'Vous êtes connecté');
            }else{
                //sinon redirection avec message d'err
                return redirect('/login')->with('no_login', 'Connexion impossible :( ! Veuillez entrez le bon mot de passe');
            }
        }
    }

    //deconnexion de user
    public function logout(){
        Auth::logout();
        //redirection avec message
        return redirect('/')->with('success', 'Vous êtes déconnecté');
    }
}
