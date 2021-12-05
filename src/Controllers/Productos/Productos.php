<?php

namespace Controllers\Productos;

use Controllers\PublicController;

class Productos extends PublicController
{
    public function run(): void
    {
        $viewData = array();
        $viewData["Books"] = \Dao\Mnt\Books::obtenerMejoresLibros();    
        $count = 0;
        foreach($viewData["Books"] as $image)
        {
            $path = './tempFiles/bookImg'.$count.'.png';
            file_put_contents($path,$viewData["Books"][$count]["IMAGEN"]);
            $viewData["Books"][$count] += ["tempImg"=>$path] ;
            $count += 1;
        }
        \Views\Renderer::render("productos/productos", $viewData);
    }
}
