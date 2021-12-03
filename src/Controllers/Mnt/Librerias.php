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
        $viewData["new_enabled"] = true;
        $viewData["edit_enabled"] = true;
        $viewData["delete_enabled"] = true;
        Renderer::render("mnt/librerias", $viewData);
    }
}
