<?php
namespace Controllers\Mnt;
use Controllers\PrivateController;

class Funcion extends PrivateController
{

    private static function yeah()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=mnt_funciones",
            "Operacion ejecutada satisfactoriamente"
        );
    }
    private static function nope()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=mnt_funciones",
            "Algo inesperado ocurrio"
        );
    }
    public function run() :void
    {
        $viewData = array(
            "mode_dsc" => "",
            "mode" => "",
            "fncod" => "",
            "fndsc" => "",
            "fnest_ACT" => "",
            "fnest_INA" => "",
            "fntyp" => "",
            "hasErrors" => false,
            "Errors" => array(),
            "showaction" => true,
            "readonly" => false,
        );
        $modeDscArr = array(
            "UPD" => "Editando Funcion (%s) %s",
            "DEL" => "Eliminando Funciones (%s) %s",
            "DSP" => "Detalle de Funcion (%s) %s",
        );

        if ($this->isPostBack())
        {
            $viewData["mode"] = $_GET["mode"];
            $viewData["fncod"] = $_POST["fncod"];
            $viewData["fndsc"] = $_POST["fndsc"];
            $viewData["fnest"] = $_POST["fnest"];
            $viewData["fntyp"] = $_POST["fntyp"];
            //Validar token xsrf
            if (!isset($_SESSION["xsrftoken"]) || $viewData["xsrftoken"] != $_SESSION["xsrftoken"]) {
                $this->nope();
            }

            //validaciones
            if (\Utilities\Validators::IsEmpty($viewData["fndsc"])) {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "Agregar una descripcion";
            }
            if (\Utilities\Validators::IsEmpty($viewData["fnest"])) {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "Agregar un estatus";
            }
            if (\Utilities\Validators::IsEmpty($viewData["fntype"])) {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "Agregar un type";
            }
            
            if (($viewData["fnest"] == "INA"
                || $viewData["fnest"] == "ACT"
                || $viewData["fnest"] == "PLN"
                ) == false
            ) {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "Algo salio mal!";
            }

            switch($viewData["mode"])
            {
                case "UPD":
                    if (\Dao\Mnt\Funciones::editarFuncion(
                        $viewData["fndsc"],
                        $viewData["fnest"],
                        $viewData["fntyp"],
                        $viewData["fncod"]
                    ))
                    {
                        $this->yeah();
                    }
                    break;
                case "DEL":
                    if(\Dao\Mnt\Funciones::eliminarFuncion(
                        $viewData["fncod"]
                    ))
                    {
                        $this->yeah();
                    }
                    break;
            }
        } 
        else
        {
            // se ejecuta si se refresca o viene la peticion
            // desde la lista
            if (isset($_GET["mode"]))
            {
                if(!isset($modeDscArr[$_GET["mode"]]))
                {
                    $this->nope();
                }
                $viewData["mode"] = $_GET["mode"];
            }
            else
            {
                $this->nope();
            }
            if (isset($_GET["fncod"]))
            {
                $viewData["fncod"] = $_GET["fncod"];

            }
            else
            {
                if ($viewData["mode"] !== "INS")
                {
                    $this->nope();
                }
            }
        }
        //hacer elementos en comun
        $tmpFuncion = \Dao\Mnt\Funciones::obtenerFuncion($viewData["fncod"]);
        $viewData["fndsc"] = $tmpFuncion["fndsc"];
        $viewData["fnest_ACT"] = $tmpFuncion["fndsc"] == "ACT" ? "selected":"";
        $viewData["fnest_INA"] = $tmpFuncion["fndsc"] == "INA" ? "selected":"";
        $viewData["mode_dsc"] = sprintf(
            $modeDscArr[$viewData["mode"]],
            $viewData["fncod"],
            $viewData["fndsc"]
        );
        if ($viewData["mode"] == "DSP")
        {
            $viewData["showaction"] = false;
            $viewData["readonly"] = "readonly";
        }
        if ($viewData["mode"] == "DEL")
        {
            $viewData["readonly"] = "readonly";
        }

        //Generar Token xsrf
        // Generar un token XSRF para evitar esos 
        $viewData["xsrftoken"] = md5($this->name . random_int(10000, 99999));
        $_SESSION["xsrftoken"] = $viewData["xsrftoken"];

        \Views\Renderer::render("mnt/funcion",$viewData);

    }
}
?>
