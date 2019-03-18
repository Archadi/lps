<?php
//app/Helpers/Dict/Serie.php
namespace App\Helpers\Dict;
 
use Illuminate\Support\Facades\DB;
 
class Serie {
    /**
     * @param int $serie_id Serie-id
     * 
     * @return int le nombre de vues
     */
    public static function getVues($serie_id) {
        $vues = DB::table('consulter')->where('serie_id', $serie_id)->count();
        //dd($vues);
        return (isset($vues) ? $vues : 0);
    }

    /**
     * @param int $serie_id Serie-id
     * 
     * @return int le nombre de likes
     */
    public static function getLikes($serie_id) {
        $likes = DB::table('consulter')->where('serie_id', $serie_id)->where('evaluer', '=', 1)->count();
        //dd($likes);
        return (isset($likes) ? $likes : 0);
    }

    /**
     * @param int $serie_id Serie-id
     * 
     * @return int le nombre de dislikes
     */
    public static function getDislikes($serie_id) {
        $likes = DB::table('consulter')->where('serie_id', $serie_id)->where('evaluer', '=', -1)->count();
        //dd($likes);
        return (isset($likes) ? $likes : 0);
    }

    /**
     * @param int $serie_id Serie-id
     * 
     * @return string le(s) genre(s) de la série
     */
    public static function getGenres($serie_id) {
        $genres = DB::select("select GROUP_CONCAT(DISTINCT libelle SEPARATOR ' - ') as genres
        from genres, corespondre, series 
        where genres.id = corespondre.genre_id 
        and corespondre.serie_id = series.id 
        and series.id = ?", [$serie_id]);
        //dd($genres[0]->genres);
        return (isset($genres[0]->genres) ? $genres[0]->genres : 'Inconnu(s)');
    }

    /**
     * @param int $serie_id Serie-id
     * @param int $user_id User-id,
     *      * 
     * @return int 1 si user à deja liké sinon 0
     */
    public static function userLike($serie_id, $user_id) {
        //on vérifie si user à deja liker
        $likded = DB::table('consulter')
                        ->where('serie_id', $serie_id)
                        ->where('user_id', $user_id)
                        ->where('evaluer', 1)
                        ->exists();
                        
        return ($likded ? 1  : 0);
    }

    /**
     * @param int $serie_id Serie-id
     * @param int $user_id User-id,
     *      * 
     * @return int 1 si user à deja disliké sinon 0
     */
    public static function userDislike($serie_id, $user_id) {
        //on vérifie si user à deja liker
        $likded = DB::table('consulter')
                        ->where('serie_id', $serie_id)
                        ->where('user_id', $user_id)
                        ->where('evaluer', -1)
                        ->exists();
                        
        return ($likded ? 1  : 0);
    }
}

?>