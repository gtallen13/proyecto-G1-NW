<?php
namespace Controllers\Users;
use Controllers\PublicController;
use Views\Renderer;

class Users extends PublicController
{
    public function run() :void
    {
        $viewData = array();
        Renderer::render("users/users",$viewData);
    }
}
?>