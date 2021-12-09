<?php
namespace Dao\Mnt;

use Dao\Table;

class Usuarios extends Table
{
    public static function obtenerUsuarios()
    {
        $sqlStr = "SELECT * from usuario;";
        return self::obtenerRegistros($sqlStr, array());
    }
    public static function obtenerUsuario($usercod)
    {
        $sqlStr = "SELECT * from usuario where usercod = :usercod;";
        return self::obtenerUnRegistro($sqlStr, array("usercod"=>intval($usercod)));
    }
    public static function obtenerUserName($username)
    {
        $sqlStr = "SELECT usercod from usuario where username = :username;";
        return self::obtenerUnRegistro($sqlStr, array("username"=>$username));
    }
    public static function editarUsuario($username,$userpswdest,$userest,$usertipo,$usercod)
    {
        
        $sqlstr = "UPDATE usuario SET 
        username = :username,
        userpswdest = :userpswdest,
        userest = :userest,
        usertipo = :usertipo
        WHERE usercod = :usercod;";
        $parametros = array(
            "username" => $username,
            "userpswdest" => $userpswdest,
            "userest" => $userest,
            "usertipo" => $usertipo,
            "usercod" => intval($usercod)
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }

    public static function eliminarUsuario($usercod)
    {
        $sqlstr = "UPDATE usuario SET 
        userest = 'INA'
        WHERE usercod = :usercod;";
        $parametros = array(
            "usercod" => intval($usercod)
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }
    public static function addUserRol($usercod, $rolescod,$roleuserest)
    {
        foreach($rolescod as $rol)
        {
            $rolExp = date('Y-m-d', time() + 7776000); 
            $sqlStr = "INSERT INTO roles_usuarios(usercod,rolescod,roleuserest,roleuserfch,roleuserexp)
            VALUES (:usercod,:rolescod,:roleuserest,now(),:roleuserexp)
            ";
            
            $parametros = array(
                "usercod"=>$usercod,
                "rolescod"=>$rol["rolescod"],
                "roleuserest"=>$roleuserest,
                "roleuserexp"=>$rolExp
            );
            
            return self::executeNonQuery($sqlStr,$parametros);
        }
    }
    public static function obtenerRoles()
    {

        $sqlStr = "SELECT * FROM roles";
        return self::obtenerRegistros($sqlStr,array());
    }
    public static function getLibreria($usercod)
    {
        $sqlStr = "SELECT libros.nomlibro AS NOMBRELIBRO, 
        libros.idlibro AS IDLIBRO,
        libros.imglibro AS IMAGENLIBRO, 
        libros.dsclibro AS DESCLIBRO,
        usuario.usercod AS USERCOD
        FROM libros
        JOIN libros_usuarios
        ON libros.idlibro = libros_usuarios.idlibro
        JOIN usuario
        ON libros_usuarios.usercod = usuario.usercod
        WHERE usuario.usercod = :usercod";
        return self::obtenerRegistros($sqlStr,array("usercod"=>intval($usercod)));
    }
}

?>
