<?php
namespace Controllers\Books;
use Controllers\PrivateController;
use Views\Renderer;

class Books extends PrivateController
{
    public function run() :void
    {
        $viewData = array();
        $viewData["items"] = \Dao\Mnt\Books::obtenerLibros();
        // header("Content-type: image");
        // echo $viewData["items"][0]["imglibro"];
        // die();
        
        $viewData["CanInsert"] = self::isFeatureAutorized("Controllers\Books\Books\New");
        $viewData["CanEdit"] = self::isFeatureAutorized("Controllers\Books\Books\Upd");
        $viewData["CanDelete"] = self::isFeatureAutorized("Controllers\Books\Books\Del");
        $viewData["CanView"] = self::isFeatureAutorized("Controllers\Books\Books\DSP");
        Renderer::render("books/books",$viewData);
    }
}
?>