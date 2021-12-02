<?php

namespace Controllers\Producto;

use Controllers\PublicController;

/**
 * Listado del WW para administrar las Partituras que estaran desplegadas en
 * el catálogo.
 *
 * @category Public
 * @package  Controllers
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @link     http://
 */
class Producto extends PublicController
{

    public function run() :void
    {
        $viewData = array();
        \Views\Renderer::render("producto/producto", $viewData);
    }
}


?>
