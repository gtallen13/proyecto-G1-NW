<?php
namespace Dao\Mnt;
 
use Dao\Table;

class Cart extends Table
{
    public static function obtenerOrden($usercod)
    {
        $sqlStr = "SELECT * from carretilla where usercod = :usercod AND estadoCompra = 'ACT';";
        return self::obtenerRegistros($sqlStr, array("usercod"=>$usercod));
    }
    public static function crearOrden(
        $usercod,
        $idlibro,
        $nomlibro,
        $dsclibro,
        $preciolibro,
    )
    {
        
        $sqlstr = "INSERT INTO carretilla (
            usercod,
            idlibro,
            fchagregado,
            nomlibro,
            dsclibro,
            preciolibro,
            estadoCompra
            ) 
            values (
                :usercod,
                :idlibro,
                now(),
                :nomlibro,
                :dsclibro,
                :preciolibro,
                'ACT'
            );";
        $parametros = array(
            "usercod"=> intval($usercod),
            "idlibro"=> intval($idlibro),
            "dsclibro"=> $dsclibro,
            "nomlibro"=>$nomlibro,
            "preciolibro"=> $preciolibro,
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }
    public static function eliminarProductoCart($idlibro,$usercod)
    {
        $sqlstr = "DELETE FROM carretilla where idlibro=:idlibro AND usercod = :usercod AND estadoCompra = 'ACT';";
        $parametros = array(
            "idlibro" => intval($idlibro),
            "usercod" => intval($usercod)
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }

    public static function finalizarOrden($usercod)
    {
        $sqlStr = "UPDATE carretilla SET estadoCompra = 'INA' where usercod = :usercod AND estadoCompra = 'ACT'";
        $parametros = array(
            "usercod" => $usercod
        );
        return self::executeNonQuery($sqlStr,$parametros);
    }
}
