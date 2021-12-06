<?php
namespace Controllers\Menu;
use Controllers\PublicController;
use \Utilities\Validators;
use Exception;
class menuAdministrador extends PublicController
{
    private $Usuario = "";

    public function run() :void
    {
        if ($this->isPostBack()) {
            //$this->txtEmail = $_POST["txtUsuario"];
        }
        \Views\Renderer::render("menu/menuadministrador", array());
    }
}
?>
