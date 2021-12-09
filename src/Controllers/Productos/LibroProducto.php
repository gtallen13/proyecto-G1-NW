<?php

namespace Controllers\Productos;

use Controllers\PublicController;

class LibroProducto extends PublicController
{
    private function nope()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=productos_productos",
            "Ocurrió algo inesperado. Intente Nuevamente."
        );
    }
    private function yeah()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=productos_productos",
            "Producto Agregado a la carretilla !"
        );
    }
    public function run(): void
    {
        \Utilities\Site::addLink("public/css/producto.css");
        $viewData = array(
            "userName"=>"",
            "usecod"=>"",
            "agregado"=>"",
            "show" =>"none"
        );
        if ($this->isPostBack())
        {
            
            $viewData["userName"] = $_POST["userName"];
            $viewData["dsc"] = $_POST["dsc"];
            $viewData["precio"] = $_POST["precio"];
            $viewData["idlibro"] = $_POST["idlibro"];
            $viewData["nomlibro"] = $_POST["nomlibro"];
            
            $tmpUser = \Dao\Mnt\Usuarios::obtenerUserName($viewData["userName"]);
            $viewData["usercod"] = $tmpUser["usercod"];
            if (\Dao\Mnt\Cart::crearOrden(
                $viewData["usercod"],
                $viewData["idlibro"],
                $viewData["nomlibro"],
                $viewData["dsc"],
                $viewData["precio"],

            )){
    
                $this->yeah();
            }
            else{
                $this->nope();
            }
        }
        else{
            $viewData = array();
            $idLibro=$_GET["book"]; 
            $tmpbook = \Dao\Mnt\Books::obtenerLibro($idLibro);
            $viewData["nombre"] = $tmpbook["nomlibro"];
            $viewData["precio"] = $tmpbook["preciolibro"];
            $viewData["dsc"] = $tmpbook["dsclibro"];
            $viewData["img"] = $tmpbook["imglibro"];
            $viewData["idlibro"] = $tmpbook["idlibro"];
        }

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