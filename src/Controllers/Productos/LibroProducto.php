<?php

namespace Controllers\Productos;

use Controllers\PublicController;

class LibroProducto extends PublicController
{
    public function run(): void
    {
        \Utilities\Site::addLink("public/css/producto.css");
        $viewData = array();
        $idLibro=$_GET["book"];
        $tmpbook = \Dao\Mnt\Books::obtenerLibro($idLibro);
        $viewData["nombre"] = $tmpbook["nomlibro"];
        $viewData["precio"] = $tmpbook["preciolibro"];
        $viewData["dsc"] = $tmpbook["dsclibro"];
        $viewData["img"] = $tmpbook["imglibro"];

        if(!isset($tmpbook))
        {
            \Views\Renderer::render("productos/no-products", $viewData);
        }
        else
        {

            $path = './tempFiles/bookImg'.'.png';
            file_put_contents($path,$viewData["img"]);
            $viewData["tmpimage"] = $path ;
            \Views\Renderer::render("productos/producto", $viewData);
        }
    }
}