<?php
namespace Dao\Mnt;

use Dao\Table;

class Scores extends Table
{
    public static function obtenerScores()
    {
        $sqlStr = "SELECT * from scores;";
        return self::obtenerRegistros($sqlStr, array());
    }
    public static function obtenerScore($scoreid)
    {
        $sqlStr = "SELECT * from scores where scoreid = :scoreid;";
        return self::obtenerUnRegistro($sqlStr, array("scoreid"=>intval($scoreid)));
    }
    public static function crearScore($scoredsc, $scoreauthor, $scoregenre, $scoreyear,$scoresales,$scoreprice,$scoredocurl,$scoreest)
    {
        $sqlstr = "INSERT INTO scores 
        (scoredsc, scoreauthor, scoregenre, scoreyear, scoresales,scoreprice ,scoredocurl, scoreest) 
        values (:scoredsc, :scoreauthor, :scoregenre, :scoreyear, :scoresales,:scoreprice, :scoredocurl, :scoreest);";
        $parametros = array(
            "scoredsc"=>$scoredsc,
            "scoreauthor"=>$scoreauthor,
            "scoregenre"=> $scoregenre,
            "scoreyear"=> $scoreyear, 
            "scoresales"=> $scoresales,
            "scoreprice"=> $scoreprice,
            "scoredocurl"=> $scoredocurl,
            "scoreest"=> $scoreest,
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }

    public static function editarScore($scoredsc, $scoreauthor, $scoregenre, $scoreyear,$scoresales,$scoreprice,$scoredocurl,$scoreest,$scoreid)
    {
        $sqlstr = "UPDATE scores 
        set scoredsc=:scoredsc, 
        scoreauthor=:scoreauthor, 
        scoregenre=:scoregenre,
        scoreyear=:scoreyear,
        scoresales=:scoresales,
        scoreprice=:scoreprice,
        scoredocurl=:scoredocurl,
        scoreest=:scoreest
        where scoreid = :scoreid;";
        $parametros = array(
            "scoredsc"=>$scoredsc,
            "scoreauthor"=>$scoreauthor,
            "scoregenre"=> $scoregenre,
            "scoreyear"=> $scoreyear, 
            "scoresales"=> $scoresales,
            "scoreprice"=> $scoreprice,
            "scoredocurl"=> $scoredocurl,
            "scoreest"=> $scoreest,
            "scoreid" => intval($scoreid)
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }

    public static function eliminarScore($scoreid)
    {
        $sqlstr = "DELETE FROM scores where scoreid=:scoreid;";
        $parametros = array(
            "scoreid" => intval($scoreid)
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }
}

?>
