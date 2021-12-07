<?php

namespace Controllers\Productos;

use Controllers\PublicController;

class Productos extends PublicController
{
    public function run(): void
    {
        $viewData = array();
        $viewData["TopBooks"] = \Dao\Mnt\Books::obtenerMejoresLibros();
        $viewData["AllBooks"] = \Dao\Mnt\Books::obtenerLibros();
        $count = 0;
        
        if(!isset($viewData["TopBooks"]))
        {
            \Views\Renderer::render("productos/no-products", $viewData);
        }
        else
        {
            foreach($viewData["TopBooks"] as $image)
            {
                $path = './tempFiles/bookImg'.$count.'.png';
                file_put_contents($path,$viewData["TopBooks"][$count]["IMAGEN"]);
                $viewData["TopBooks"][$count] += ["tempImg"=>$path] ;
                $count += 1;
            }
            $count = 0;
            foreach($viewData["AllBooks"] as $image)
            {
                $path = './tempFiles/prodImg'.$count.'.png';
                file_put_contents($path,$viewData["AllBooks"][$count]["imglibro"]);
                $viewData["AllBooks"][$count] += ["tempImg"=>$path];
                $count =+ 1;
            }
            \Views\Renderer::render("productos/productos", $viewData);

        }
    }
}
