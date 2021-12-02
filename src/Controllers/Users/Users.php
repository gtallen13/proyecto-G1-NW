<?php
namespace Controllers\Users;
use Controllers\PrivateController;
use Views\Renderer;

class Users extends PrivateController
{
    public function run() :void
    {
        $viewData = array();
        $viewData["Users"] = \Dao\Security\Security::getUsuarios(); 
        $viewData["CanInsert"] = self::isFeatureAutorized("Controllers\Users\Users\New");
        $viewData["CanEdit"] = self::isFeatureAutorized("Controllers\Users\Users\Upd");
        $viewData["CanDelete"] = self::isFeatureAutorized("Controllers\Users\Users\Del");
        $viewData["CanView"] = self::isFeatureAutorized("Controllers\Users\Users\DSP");
        Renderer::render("users/users",$viewData);
    }
}
?>