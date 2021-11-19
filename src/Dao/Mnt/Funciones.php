<?php
namespace Dao\Mnt;

use Dao\Table;

class Roles extends Table
{
    public static function obtenerRoles()
    {
        $sqlStr = "SELECT * from roles;";
        return self::obtenerRegistros($sqlStr, array());
    }
    public static function obtenerRol($rolescod)
    {
        $sqlStr = "SELECT * from roles where rolescod = :rolescod;";
        return self::obtenerUnRegistro($sqlStr, array("rolescod"=> $rolescod));
    }
    public static function crearRol($rolesdsc, $rolesest)
    {
        $upperCod = strtoupper($rolesdsc);
        $sqlstr = "INSERT INTO roles (rolescod,rolesdsc, rolesest) values (:rolescod,:rolesdsc, :rolesest);";
        $parametros = array(
            "rolescod" => $upperCod,
            "rolesdsc" => $rolesdsc,
            "rolesest" => $rolesest
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }

    public static function editarRol($rolesdsc, $rolesest, $rolescod)
    {
        $sqlstr = "UPDATE roles set rolesdsc=:rolesdsc, rolesest=:rolesest where rolescod = :rolescod;";
        $parametros = array(
            "rolesdsc" =>  $rolesdsc,
            "rolesest" =>  $rolesest,
            "rolescod" => $rolescod
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }

    public static function eliminarRol($rolescod)
    {
        $sqlstr = "DELETE FROM roles where rolescod=:rolescod;";
        $parametros = array(
            "rolescod" => $rolescod
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }
}

?>
