<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Helpers\Dict\Serie;

class LikeAndDislikeController extends Controller
{
    public function like(Request $request){
        //on vérifie si user à deja liké
        if(Serie::userLike($request->serie_id, $request->user_id)){
            //si oui evaluer 0
            $like = DB::table('consulter')
                        ->updateOrInsert(
                            ['serie_id' => $request->serie_id, 'user_id' => $request->user_id],
                            ['evaluer' => 0]
                        ); 
            
            $active = "";

        }else{
            //si non evaluer 1
            $like = DB::table('consulter')
                        ->updateOrInsert(
                            ['serie_id' => $request->serie_id, 'user_id' => $request->user_id],
                            ['evaluer' => 1]
                        ); 
            
            $active = "active";
        }

        
        $response = array(
            'active' => $active,
            'nb_like' => Serie::getLikes($request->serie_id),
            'nb_dislike' => Serie::getDislikes($request->serie_id)
        );

        return response()->json(["message" => "OK", "statusCode" => "200", "response" => $response]);
    }

    public function dislike(Request $request){
        //on vérifie si user à deja disliké
        if(Serie::userDislike($request->serie_id, $request->user_id)){
            //si oui evaluer 0
            $dislike = DB::table('consulter')
                    ->updateOrInsert(
                        ['serie_id' => $request->serie_id, 'user_id' => $request->user_id],
                        ['evaluer' => 0]
                    );

            $active = "";
        }else{
            //si non evaluer 0
            $dislike = DB::table('consulter')
                    ->updateOrInsert(
                        ['serie_id' => $request->serie_id, 'user_id' => $request->user_id],
                        ['evaluer' => -1]
                    );

            $active = "active";
        }

        $response = array(
            'active' => $active,
            'nb_like' => Serie::getLikes($request->serie_id),
            'nb_dislike' => Serie::getDislikes($request->serie_id)
        );

        return response()->json(["message" => "OK", "statusCode" => "200", "response" => $response]);
    }
}
