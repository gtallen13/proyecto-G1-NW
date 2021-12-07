<?php

namespace Controllers\Mnt;

use Controllers\PrivateController;

class Librerias extends PrivateController
{
    public function run(): void
    {
        $viewData = array();
        \Views\Renderer::render("mnt/librerias", $viewData);
    }
}
