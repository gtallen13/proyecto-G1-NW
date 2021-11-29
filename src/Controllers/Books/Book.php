<?php

namespace Controllers\Books;

use Controllers\PublicController;

class Book extends PublicController
{
    private function nope()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=books_books",
            "Ocurrio algo inesperado. Intente Nuevamente"
        );
    }
    private function yeah()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=books_books",
            "Operacion ejecutada Satisfactoriamente!"
        );
    }
    public function run(): void
    {
        $viewData = array(
            "mode_dsc" => "",
            "mode" => "",
            "idlibro" => "",
            "nomlibro" => "",
            "dsclibro" => "",
            "preciolibro" => "",
            "imglibro" => "",
            "pdflibro" => "",
            "fchpublicacion" => "",
            "fchlistado" => "",
            "autor" => "",
            "categoria_ACCION" => "",
            "categoria_AVENTURA" => "",
            "categoria_COMEDIA" => "",
            "categoria_NOVELA" => "",
            "categoria_FANTASIA" => "",
            "categoria_HORROR" => "",
            "categoria_ROMANCE" => "",
            "categoria_SUSPENSO" => "",
            "categoria_HISTORIA" => "",
            "categoria_CONTEMPORANEO"=> "",
            "hasErrors" => false,
            "Errors" => array(),
            "showaction" => true,
            "readonly" => false,
            "show" => "none"
        );
        $modeDscArr = array(
            "INS" => "Nueva Libro",
            "UPD" => "Editando Libro (%s) %s",
            "DEL" => "Eliminando Libro (%s) %s",
            "DSP" => "Detalle de Libro (%s) %s"
        );

        if ($this->isPostBack()) {
            $viewData["mode"] = $_POST["mode"];
            $viewData["idlibro"] = $_POST["idlibro"];
            $viewData["nomlibro"] = $_POST["nomlibro"];
            $viewData["dsclibro"] = $_POST["dsclibro"];
            $viewData["preciolibro"] = $_POST["preciolibro"];
            $viewData["imglibro"] = $_POST["imglibro"];
            $viewData["pdflibro"] = $_POST["pdflibro"];
            $viewData["fchpublicacion"] = $_POST["fchpublicacion"];
            $viewData["autor"] = $_POST["autor"];
            $viewData["categoria"] = $_POST["categoria"];
            $viewData["xsrftoken"] = $_POST["xsrftoken"];

            // Validate XSRF Token
            if (!isset($_SESSION["xsrftoken"]) || $viewData["xsrftoken"] != $_SESSION["xsrftoken"]) {
                $this->nope();
            }
            //validaciones
            if (\Utilities\Validators::IsEmpty($viewData["nomlibro"]))
            {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "El nombre no puede ir vacio";
            }
            if (\Utilities\Validators::IsEmpty($viewData["dsclibro"]))
            {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "Porfavor ingrese una descripcion";
            }
            if (\Utilities\Validators::IsEmpty($viewData["preciolibro"]))
            {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "Porfavor ingrese el valor del libro";
            }
            if (\Utilities\Validators::IsEmpty($viewData["imglibro"]))
            {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "Porfavor elija la imagen del libro";
            }
            if (\Utilities\Validators::IsEmpty($viewData["pdflibro"]))
            {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "Porfavor elija el documento del libro";
            }
            if (\Utilities\Validators::IsEmpty($viewData["autor"]))
            {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "Ingrese el nombre del autor";
            }
            if (\Utilities\Validators::IsEmpty($viewData["categoria"]))
            {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "Seleccione una categoria";
            }
            if (($viewData["categoria"] == "N/A"))
            {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "Estado de categoria incorrecto";
            }
            if (!$viewData["hasErrors"]) {
                switch ($viewData["mode"]) {
                    case "INS":
                        if (\Dao\Mnt\Books::crearLibro(
                            $viewData["nomlibro"],
                            $viewData["dsclibro"],
                            $viewData["preciolibro"],
                            file_get_contents($viewData["imglibro"], FILE_USE_INCLUDE_PATH),
                            file_get_contents($viewData["pdflibro"], FILE_USE_INCLUDE_PATH),
                            $viewData["fchpublicacion"],
                            $viewData["autor"],
                            $viewData["categoria"],
                            )) {
                            $this->yeah();
                        }
                        break;
                    case "UPD":
                        if (\Dao\Mnt\Books::editarLibro(
                            $viewData["nomlibro"],
                            $viewData["dsclibro"],
                            $viewData["preciolibro"],
                            $viewData["imglibro"],
                            $viewData["pdflibro"],
                            $viewData["fchpublicacion"],
                            $viewData["autor"],
                            $viewData["categoria"],
                            $viewData["idlibro"]
                        )) {
                            $this->yeah();
                        }
                        break;
                    case "DEL":
                        if (\Dao\Mnt\Books::eliminarLibro($viewData["idlibro"])) {
                            $this->yeah();
                        }
                        break;
                }
            }
        } else {
            if (isset($_GET["mode"])) {

                if (!isset($modeDscArr[$_GET["mode"]])) {
                    $this->nope();
                }
                $viewData["mode"] = $_GET["mode"];
                if (isset($_GET["idlibro"])) {
                    $viewData["idlibro"] = $_GET["idlibro"];
                } else {
                    $this->nope();
                }
                if (isset($_GET["idlibro"])) {
                    $viewData["idlibro"] = $_GET["idlibro"];
                } else {
                    if ($viewData["mode"] !== "INS") {
                        $this->nope();
                    }
                }
            }
        }
        if ($viewData["mode"] == "INS") {
            $viewData["mode_dsc"] = $modeDscArr["INS"];
            $viewData["show"] = "block";
        } else {
            $tmpLibro = \Dao\Mnt\Books::obtenerLibro($viewData["idlibro"]);
            $viewData["nomlibro"] = $tmpLibro["nomlibro"];
            $viewData["dsclibro"] = $tmpLibro["dsclibro"];
            $viewData["preciolibro"] = $tmpLibro["preciolibro"];
            $viewData["imglibro"] = $tmpLibro["imglibro"];
            $viewData["pdflibro"] = $tmpLibro["pdflibro"];
            $viewData["fchpublicacion"] = $tmpLibro["fchpublicacion"];
            $viewData["fchlistado"] = $tmpLibro["fchlistado"];
            $viewData["autor"] = $tmpLibro["autor"];
            //Categorias de Libros
            $viewData["categoria_ACCION"] = $tmpLibro["categoria"] == "ACTION" ? "selected": "";
            $viewData["categoria_AVENTURA"] = $tmpLibro["categoria"] == "AVENTURA" ? "selected": "";
            $viewData["categoria_COMEDIA"] = $tmpLibro["categoria"] == "COMEDIA" ? "selected": "";
            $viewData["categoria_NOVELA"] = $tmpLibro["categoria"] == "NOVELA" ? "selected": "";
            $viewData["categoria_FANTASIA"] = $tmpLibro["categoria"] == "FANTASIA" ? "selected": "";
            $viewData["categoria_HORROR"] = $tmpLibro["categoria"] == "HORROR" ? "selected": "";
            $viewData["categoria_ROMANCE"] = $tmpLibro["categoria"] == "ROMANCE" ? "selected": "";
            $viewData["categoria_SUSPENSO"] = $tmpLibro["categoria"] == "SUSPENSO" ? "selected": "";
            $viewData["categoria_HISTORIA"] = $tmpLibro["categoria"] == "HISTORIA" ? "selected": "";
            $viewData["categoria_CONTEMPORANEO"] = $tmpLibro["categoria"] == "CONTEMPORANEO" ? "selected": "";

            $viewData["mode_dsc"] = sprintf(
                $modeDscArr[$viewData["mode"]],
                $viewData["idlibro"],
                $viewData["nomlibro"]
            );
            if ($viewData["mode"] == "DSP") {
                $viewData["showaction"] = false;
                $viewData["readonly"] = "readonly";
            }
            if ($viewData["mode"] == "DEL") {
                $viewData["readonly"] = "readonly";
            }
            if ($viewData["mode"] == "UPD") {
                $viewData["show"] = "none";
            }
        }
        $viewData["xsrftoken"] = md5($this->name . random_int(10000, 99999));
        $_SESSION["xsrftoken"] = $viewData["xsrftoken"];

        \Views\Renderer::render("books/book", $viewData);
    }
}
