<?php

namespace Controllers\Clients;

class Client extends \Controllers\PrivateController
{
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
        \Views\Renderer::render("clients/client", array());
    }
}
?>
