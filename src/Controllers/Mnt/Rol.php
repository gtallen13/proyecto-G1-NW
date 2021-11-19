<?php
namespace Controllers\Mnt;

use Controllers\PrivateController;

class Rol extends PrivateController
{
    private function nope()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=mnt_roles",
            "Ocurrió algo inesperado. Intente Nuevamente."
        );
    }
    private function yeah()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=mnt_roles",
            "Operación ejecutada Satisfactoriamente!"
        );
    }
    public function run() :void
    {
        $viewData = array(
            "mode_dsc"=>"",
            "mode" => "",
            "rolescod" => "",
            "rolesdsc" => "",
            "rolesest_ACT"=>"",
            "rolesest_INA" => "",
            "hasErrors" => false,
            "Errors" => array(),
            "showaction"=>true,
            "readonly" => false
        );
        $modeDscArr = array(
            "INS" => "Nuevo Rol",
            "UPD" => "Editando Rol (%s) %s",
            "DEL" => "Eliminando Rol (%s) %s",
            "DSP" => "Detalle de Rol (%s) %s"
        );

        if ($this->isPostBack()) {
            // se ejecuta al dar click sobre guardar
            $viewData["mode"] = $_POST["mode"];
            $viewData["rolescod"] = $_POST["rolescod"] ;
            $viewData["rolesdsc"] = $_POST["rolesdsc"];
            $viewData["rolesest"] = $_POST["rolesest"];
            $viewData["xsrftoken"] = $_POST["xsrftoken"];
            // Validate XSRF Token
            if (!isset($_SESSION["xsrftoken"]) || $viewData["xsrftoken"] != $_SESSION["xsrftoken"]) {
                $this->nope();
            }
            // Validaciones de Errores
            if (\Utilities\Validators::IsEmpty($viewData["rolesest"]) && !$viewData["mode"]=="DEL") {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "El nombre no Puede Ir Vacio!";
            }
            if (($viewData["rolesest"] == "INA"
                || $viewData["rolesest"] == "ACT"
                ) == false && !$viewData["mode"]=="DEL"
            ) {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "Estado de Rol Incorrecto!";
            }

            
            if (!$viewData["hasErrors"]) {
                switch($viewData["mode"]) {
                case "INS":
                    if (\Dao\Mnt\Roles::crearRol(
                        $viewData["rolesdsc"],
                        $viewData["rolesest"]
                    )
                    ) {
                        $this->yeah();
                    }
                    break;
                case "UPD":
                    if (\Dao\Mnt\Roles::editarRol(
                        $viewData["rolesdsc"],
                        $viewData["rolesest"],
                        $viewData["rolescod"]
                    )
                    ) {
                        $this->yeah();
                    }
                    break;
                case "DEL":
                    if (\Dao\Mnt\Roles::eliminarRol(
                        $viewData["rolescod"]
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
            if (isset($_GET["rolescod"])) {
                $viewData["rolescod"] = $_GET["rolescod"];
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
            $tmpRol = \Dao\Mnt\Roles::obtenerRol($viewData["rolescod"]);
            $viewData["rolesdsc"] = $tmpRol["rolesdsc"];
            $viewData["rolesest_ACT"] = $tmpRol["rolesest"] == "ACT" ? "selected": "";
            $viewData["rolesest_INA"] = $tmpRol["rolesest"] == "INA" ? "selected" : "";
            $viewData["mode_dsc"]  = sprintf(
                $modeDscArr[$viewData["mode"]],
                $viewData["rolescod"],
                $viewData["rolesdsc"]
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

        \Views\Renderer::render("mnt/rol", $viewData);
    }
}


?>
