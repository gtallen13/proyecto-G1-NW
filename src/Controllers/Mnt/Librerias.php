<?php

namespace Controllers\Producto;

use Controllers\PrivateController;

class Producto extends PrivateController
{

    public function run(): void
    {
        $viewData = array();
        \Views\Renderer::render("mnt/librerias", $viewData);
    }
}
