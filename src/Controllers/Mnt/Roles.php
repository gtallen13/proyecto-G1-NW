<?php

namespace Controllers\Mnt;

use Controllers\PrivateController;
use Views\Renderer;


class Roles extends PrivateController
{
    public function run() :void 
    {
        $viewData = array();
        $viewData["items"] = \Dao\Mnt\Roles::obtenerRoles();
        $viewData["new_enabled"] = $this->isFeatureAutorized("mnt_roles_new");
        $viewData["edit_enabled"] = $this->isFeatureAutorized("mnt_roles_edit");
        $viewData["delete_enabled"] = $this->isFeatureAutorized("mnt_roles_delete");
        
        Renderer::render("mnt/roles", $viewData);
    }
}
