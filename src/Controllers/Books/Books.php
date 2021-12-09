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
        $count = 0;
        foreach($viewData["items"] as $item)
        {
            $path = './tempFiles/bookImg'.$count.'.png';
            file_put_contents($path, $viewData["items"][$count]["imglibro"]);
            $viewData["items"][$count] += ["tempImg"=>$path];
            $count += 1;
        }
        
        $viewData["CanInsert"] = self::isFeatureAutorized("Controllers\Books\Books\New");
        $viewData["CanEdit"] = self::isFeatureAutorized("Controllers\Books\Books\Upd");
        $viewData["CanDelete"] = self::isFeatureAutorized("Controllers\Books\Books\Del");
        $viewData["CanView"] = self::isFeatureAutorized("Controllers\Books\Books\DSP");
        Renderer::render("books/books",$viewData);
    }
}
?>