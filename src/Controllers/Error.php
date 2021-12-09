<?php

namespace Controllers;

class Error extends PublicController
{
    public function run() :void
    {
        \Utilities\Site::addLink("public/css/errorpage.css");
        http_response_code(400);
        \Views\Renderer::render(
            "error",
            array("page_title"=>"¡No se encuentra el recurso solicitado!")
        );
    }
}


?>
