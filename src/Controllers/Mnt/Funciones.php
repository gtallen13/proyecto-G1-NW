<?php
namespace Controllers\Mnt;
use Controller\PrivateController;
use Views\Renderer;


class Funciones extends PrivateController
{
    public function run() :void
    {
        $viewData = array();
        $viewData["items"] = \Dao\Mnt\Funciones::obtenerFunciones();
        $viewData["new_enabled"] = $this-isFeatureAuthorized("mnt_funciones_new");
        $viewData["new_edit"] = $this-isFeatureAuthorized("mnt_funciones_edit");
        $viewData["new_delete"] = $this-isFeatureAuthorized("mnt_funciones_delete");

        Renderer::render("mnt/funciones",$viewData);
    }
}

?>