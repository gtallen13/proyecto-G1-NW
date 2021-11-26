<?php
namespace Controllers\Books;
use Controllers\PublicController;
use Views\Renderer;

class Books extends PublicController
{
    public function run() :void
    {
        $viewData = array();
        Renderer::render("books/books",$viewData);
    }
}
?>