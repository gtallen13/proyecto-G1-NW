<?
if (isset($_GET['idlibro'])) {
    $id = $_GET['idlibro'];
    $libroinfo = \Dao\Mnt\Books::obtenerLibro($id);
    // $stat = $db->prepare("SELECT * FROM libros where idlibro=$id");
    // $libroinfo->bindParam(1, $id);
    // $libroinfo->execute();
    // $data = $libroinfo->fetch();

    $file = 'tempFiles/' . $data['nomlibro'];          /* . $libroinfo['nomlibro'];*/

    if (file_exists($file)) {
        header("Content-disposition: attachment; filename=$file");
        header("Content-Type: application/pdf");
        readfile($file);
        exit;
    }
}
