<?php
namespace Dao\Mnt;

use Dao\Table;

class Librerias extends Table
{
    public static function obtenerLibrerias()
    {
        $sqlStr = "SELECT * from librerias;";
        return self::obtenerRegistros($sqlStr, array());
    }
    public static function obtenerLibreria($catid)
    {
        $sqlStr = "SELECT * from librerias where catid = :catid;";
        return self::obtenerUnRegistro($sqlStr, array("catid"=>intval($catid)));
    }
    public static function crearLibrerias($catnom, $catest)
    {
        $sqlstr = "INSERT INTO librerias (catnom, catest) values (:catnom, :catest);";
        $parametros = array(
            "catnom" => $catnom,
            "catest" => $catest
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }

    public static function editarLibrerias($catnom, $catest, $catid)
    {
        $sqlstr = "UPDATE librerias set catnom=:catnom, catest=:catest where catid = :catid;";
        $parametros = array(
            "catnom" =>  $catnom,
            "catest" =>  $catest,
            "catid" => intval($catid)
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }

    public static function eliminarLibrerias($catid)
    {
        $sqlstr = "DELETE FROM librerias where catid=:catid;";
        $parametros = array(
            "catid" => intval($catid)
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }
}
