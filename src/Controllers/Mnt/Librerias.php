<?php

namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;


class Librerias extends PublicController
{
    public function run() :void 
    {
        $viewData = array();
        $viewData["items"] = \Dao\Mnt\Librerias::obtenerLibrerias();
        Renderer::render("mnt/librerias", $viewData);
    }
}
