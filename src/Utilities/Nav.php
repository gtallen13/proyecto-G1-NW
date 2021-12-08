<?php

namespace Utilities;

class Nav {

    public static function setNavContext(){
        $tmpNAVIGATION = array();
        $userID = \Utilities\Security::getUserId();
        if (\Utilities\Security::isAuthorized($userID, "WW_Users")) {
            $tmpNAVIGATION[] = array(
                "nav_url" => "index.php?page=users_users",
                "nav_label" => "Usuarios"
            );
        }
        if (\Utilities\Security::isAuthorized($userID, "WW_Books")) {
            $tmpNAVIGATION[] = array(
                "nav_url" => "index.php?page=books_books",
                "nav_label" => "Libros"
            );
        }
        if (\Utilities\Security::isAuthorized($userID, "WW_Roles")) {
            $tmpNAVIGATION[] = array(
                "nav_url" => "index.php?page=mnt_roles",
                "nav_label" => "Roles"
            );
        }
        if (\Utilities\Security::isAuthorized($userID, "WW_Funcion")) {
            $tmpNAVIGATION[] = array(
                "nav_url" => "index.php?page=mnt_funciones",
                "nav_label" => "Funciones"
            );
        }
        if (\Utilities\Security::isAuthorized($userID, "Librerias")) {
            $tmpNAVIGATION[] = array(
                "nav_url" => "index.php?page=mnt_librerias",
                "nav_label" => "Library"
            );
        }
        if (\Utilities\Security::isAuthorized($userID, "Productos")) {
            $tmpNAVIGATION[] = array(
                "nav_url" => "index.php?page=productos_productos",
                "nav_label" => "Shop"
            );
        }
        
       
        \Utilities\Context::setContext("NAVIGATION", $tmpNAVIGATION);
    }


    private function __construct()
    {
        
    }
    private function __clone()
    {
        
    }
}
?>
