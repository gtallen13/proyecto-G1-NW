<?php

namespace Controllers\Productos;

use Controllers\PublicController;

class Productos extends PublicController
{
    public function run(): void
    {
        $viewData = array();
        $viewData["Books"] = \Dao\Mnt\Books::obtenerLibros();
        if(!isset($viewData["Books"]))
        {
            \Views\Renderer::render("productos/no-products", $viewData);
        }
        else
        {
            $path = './tempFiles/bookImg'.'.png';
            file_put_contents($path,$viewData["Books"]["IMAGEN"]);
            $viewData["Books"] += ["tempImg"=>$path] ;
            \Views\Renderer::render("productos/productos", $viewData);
        }
    }
}