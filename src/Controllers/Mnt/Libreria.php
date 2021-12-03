<?php
namespace Controllers\Mnt;

use Controllers\PublicController;

class Libreria extends PublicController
{
    private function nope()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=mnt_libreria",
            "Ocurrió algo inesperado. Intente Nuevamente."
        );
    }
    private function yeah()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=mnt_libreria",
            "Operación ejecutada Satisfactoriamente!"
        );
    }
    public function run() :void
    {
        $viewData = array(
            "mode_dsc"=>"",
            "mode" => "",
            "catid" => "",
            "catnom" => "",
            "catest_ACT"=>"",
            "catest_INA" => "",
            "catest_PLN"=>"",
            "hasErrors" => false,
            "Errors" => array(),
            "showaction"=>true,
            "readonly" => false
        );
        $modeDscArr = array(
            "INS" => "Nueva Libreria",
            "UPD" => "Editando Libreria (%s) %s",
            "DEL" => "Eliminando Libreria (%s) %s",
            "DSP" => "Detalle de Libreria (%s) %s"
        );

        if ($this->isPostBack()) {
            // se ejecuta al dar click sobre guardar
            $viewData["mode"] = $_POST["mode"];
            $viewData["catid"] = $_POST["catid"] ;
            $viewData["catnom"] = $_POST["catnom"];
            $viewData["catest"] = $_POST["catest"];
            $viewData["xsrftoken"] = $_POST["xsrftoken"];
            // Validate XSRF Token
            if (!isset($_SESSION["xsrftoken"]) || $viewData["xsrftoken"] != $_SESSION["xsrftoken"]) {
                $this->nope();
            }
            // Validaciones de Errores
            if (\Utilities\Validators::IsEmpty($viewData["catnom"])) {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "El nombre no Puede Ir Vacio!";
            }
            if (($viewData["catest"] == "INA"
                || $viewData["catest"] == "ACT"
                || $viewData["catest"] == "PLN"
                ) == false
            ) {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "Estado de Libreria Incorrecto!";
            }
            if (!$viewData["hasErrors"]) {
                switch($viewData["mode"]) {
                case "INS":
                    if (\Dao\Mnt\Librerias::crearLibrerias(
                        $viewData["catnom"],
                        $viewData["catest"]
                    )
                    ) {
                        $this->yeah();
                    }
                    break;
                case "UPD":
                    if (\Dao\Mnt\Librerias::editarLibrerias(
                        $viewData["catnom"],
                        $viewData["catest"],
                        $viewData["catid"]
                    )
                    ) {
                        $this->yeah();
                    }
                    break;
                case "DEL":
                    if (\Dao\Mnt\Librerias::eliminarLibrerias(
                        $viewData["catid"]
                    )
                    ) {
                        $this->yeah();
                    }
                    break;
                }
            }
        } else {
            // se ejecuta si se refresca o viene la peticion
            // desde la lista
            if (isset($_GET["mode"])) {
                if (!isset($modeDscArr[$_GET["mode"]])) {
                    $this->nope();
                }
                $viewData["mode"] = $_GET["mode"];
            } else {
                $this->nope();
            }
            if (isset($_GET["catid"])) {
                $viewData["catid"] = $_GET["catid"];
            } else {
                if ($viewData["mode"] !=="INS") {
                    $this->nope();
                }
            }
        }

        // Hacer elementos en comun
       
        if ($viewData["mode"] == "INS") {
            $viewData["mode_dsc"]  = $modeDscArr["INS"];
        } else {
            $tmpLibreria = \Dao\Mnt\Librerias::obtenerLibrerias($viewData["catid"]);
            $viewData["catnom"] = $tmpLibreria["catnom"];
            $viewData["catest_ACT"] = $tmpLibreria["catest"] == "ACT" ? "selected": "";
            $viewData["catest_INA"] = $tmpLibreria["catest"] == "INA" ? "selected" : "";
            $viewData["catest_PLN"] = $tmpLibreria["catest"] == "PLN" ? "selected" : "";
            $viewData["mode_dsc"]  = sprintf(
                $modeDscArr[$viewData["mode"]],
                $viewData["catid"],
                $viewData["catnom"]
            );
            if ($viewData["mode"] == "DSP") {
                $viewData["showaction"]= false ;
                $viewData["readonly"] = "readonly";
            }
            if ($viewData["mode"] == "DEL") {
                $viewData["readonly"] = "readonly";
            }

        }
        // Generar un token XSRF para evitar esos ataques
        $viewData["xsrftoken"] = md5($this->name . random_int(10000, 99999));
        $_SESSION["xsrftoken"] = $viewData["xsrftoken"];

        \Views\Renderer::render("mnt/lebreria", $viewData);
    }
}


?>
