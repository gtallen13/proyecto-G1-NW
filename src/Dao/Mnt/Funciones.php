<?php
namespace Dao\Mnt;

use Dao\Table;

class Funciones extends Table
{
    public static function obtenerFunciones()
    {
        $sqlStr = "SELECT * from funciones;";
        return self::obtenerRegistros($sqlStr, array());
    }
    public static function obtenerFuncion($fncod)
    {
        $sqlStr = "SELECT * from funciones where fncod = :fncod;";
        return self::obtenerUnRegistro($sqlStr, array("fncod"=> $fncod));
    }
    //crear funciones no esta ya que las funciones se crean automaticamente

    public static function editarFuncion($fndsc, $fnest, $fntyp,$fncod)
    {
        $sqlstr = "UPDATE funciones set fndsc=:fndsc, fnest=:fnest, fntyp=:fntyp where fncod = :fncod;";
        $parametros = array(
            "fndsc" =>  $fndsc,
            "fnest" =>  $fnest,
            "fntyp" => $fntyp,
            "fncod" => $fncod
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }

    public static function eliminarFuncion($fncod)
    {
        $sqlstr = "UPDATE funciones SET fnest='INA' where fncod=:fncod;";
        $parametros = array(
            "fncod" => $fncod
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }
}

?>
