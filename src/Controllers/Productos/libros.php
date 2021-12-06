<?php

namespace Controllers\Productos;

use Controllers\PublicController;
use \Utilities\Validators;
use Exception;
class Libros extends PublicController
{
    public function run() :void
    {
        if ($this->isPostBack()) {
            //codigo
        }
        $dataView = get_object_vars($this);
        \Views\Renderer::render("productos/libros", array());
    }
}
?>
