<?php

namespace Controllers\Clients;

use Controllers\PrivateController;

class Librerias extends PrivateController
{
    public function run(): void
    {
        $viewData = array(
            "busqueda" => "",
            "usercod" => "",
            "hasErrors" => "",
            "Errors" => array(),
            "show"=>"none"
        );
        $usercod  = $_GET["user"];
        $count = 0;
        $viewData["Libros"] = \Dao\Mnt\Usuarios::getLibreria($usercod);
        if (!isset($viewData["Libros"]))
        {
            $viewData["show"] = "flex";
        }
        else{
            foreach ($viewData["Libros"] as $image)
            {
                $path = './tempFiles/bookImg'.$count.'.png';
                file_put_contents($path,$viewData["Libros"][$count]["IMAGENLIBRO"]);
                $viewData["Libros"][$count] += ["tempImg"=>$path];
                $count += 1;
            }
        }
        
        // print_r($viewData["Libros"][0]["tempImg"]);
        // die();
        \Views\Renderer::render("clients/librerias", $viewData);
    }
}
