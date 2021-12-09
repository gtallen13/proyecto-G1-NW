<?php

namespace Controllers\Clients;

class Cart extends \Controllers\PrivateController
{
    private function nope()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=productos_productos",
            "Ocurrió algo inesperado. Intente Nuevamente."
        );
    }
    private function yeah()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=productos_productos",
            "Producto Eliminado de la carretilla !"
        );
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        // $userInRole = \Utilities\Security::isInRol(
        //     \Utilities\Security::getUserId(),
        //     "ADMIN"
        // );
        parent::__construct();
    }
    /** 
     * Ejecuta el controlador
     */
    public function run() :void
    {
        \Utilities\Site::addLink("public/css/cart.css");
        if ($this->isPostBack())
        {
            $usercod = $_POST["usercod"]; 
            $idlibro = $_POST["idlibro"];
            $mode = $_POST["mode"];
            if (isset($mode))
            {
                switch ($mode)
                {
                    case 'DEL':
                        
                        if(\Dao\Mnt\Cart::eliminarProductoCart($idlibro,$usercod))
                        {
                            $this->yeah();
                        }
                        else{
                            $this->nope();
                        }
                    break;
                }
            }
        }
        else{
            $viewData["user"] = $_GET["user"];
            $viewData["orders"] = \Dao\Mnt\Cart::obtenerOrden($viewData["user"]);
        }
        
        \Views\Renderer::render("clients/cart", $viewData);
    }
}
?>
