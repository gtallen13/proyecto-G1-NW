<?php
/**
 * PHP Version 7.2
 *
 * @category Public
 * @package  Controllers
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @version  CVS:1.0.0
 * @link     http://
 */
namespace Controllers;

/**
 * Index Controller
 *
 * @category Public
 * @package  Controllers
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @link     http://
 */
class Index extends PublicController
{
    /**
     * Index run method
     *
     * @return void
     */
    public function run() :void
    {
        // Addlink para agregar archivos css propios de la pantalla
        // sin afectar todo el layout
        \Utilities\Site::addLink("public/css/test.css");

        //Para agregar scripts de javascript externos
        // \Utilities\Site::addEndScript("public/js/sayhello.js");

        $viewData = array();
        $viewData["Books"] = \Dao\Mnt\Books::obtenerMejoresLibros();
        $count = 0;
        //En case que no hay libros en la BD se muestra una vista de Cerrado
        if(!isset($viewData["Books"]))
        {
            \Views\Renderer::render("closed", $viewData);
        }
        else
        {
            foreach($viewData["Books"] as $image)
            {
                $path = './tempFiles/bookImg'.$count.'.png';
                file_put_contents($path,$viewData["Books"][$count]["IMAGEN"]);
                $viewData["Books"][$count] += ["tempImg"=>$path] ;
                $count += 1;
            }
            \Views\Renderer::render("index", $viewData);

        }
    }
}
?>
