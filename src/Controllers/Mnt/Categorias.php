<?php

namespace Controllers\Mnt;

use Controllers\PrivateController;
use Views\Renderer;


class Categorias extends PrivateController
{
    public function run() :void 
    {
        $viewData = array();
        $viewData["items"] = \Dao\Mnt\Categorias::obtenerCategorias();
        $viewData["new_enabled"] = $this->isFeatureAutorized("mnt_categorias_new");
        $viewData["edit_enabled"] = $this->isFeatureAutorized("mnt_categorias_edit");
        $viewData["delete_enabled"] = $this->isFeatureAutorized("mnt_categorias_delete");
        Renderer::render("mnt/categorias", $viewData);
    }
}
