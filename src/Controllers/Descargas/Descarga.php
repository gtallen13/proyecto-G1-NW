<?php

namespace Controllers\Descargas;

use Controllers\PublicController;

class Descarga extends PublicController
{
    public function run(): void
    {
        $viewData = array();
        $id = $_GET['idlibro'];
        if (isset($_GET['idlibro'])) {
            $libroinfo = \Dao\Mnt\Books::obtenerLibro($id);
            // $stat = $db->prepare("SELECT * FROM libros where idlibro=$id");
            // $libroinfo->bindParam(1, $id);
            // $libroinfo->execute();
            // $data = $libroinfo->fetch();

            $file = 'tempFiles/' . $libroinfo['nomlibro'] . ".pdf"; /* . $libroinfo['nomlibro'];*/
            file_put_contents($file, $libroinfo['pdflibro']);

            if (file_exists($file)) {
                header("Content-disposition: attachment; filename=$file");
                header("Content-Type: application/pdf");
                readfile($file);
                exit;
            }
        }
        \Views\Renderer::render("descarga/descarga", $viewData);
    }
}
