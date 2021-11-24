<?php
namespace Controllers\Mnt;

use Controllers\PublicController;

class Score extends PublicController
{
    private function nope()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=mnt_scores",
            "Ocurrió algo inesperado. Intente Nuevamente."
        );
    }
    private function yeah()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=mnt_scores",
            "Operación ejecutada Satisfactoriamente!"
        );
    }
    public function run() :void
    {
        $viewData = array(
            "mode_dsc"=>"",
            "mode" => "",
            "scoreid"=>"",
            "scoredsc"=>"", 
            "scoreauthor"=>"", 
            "scoregenre"=>"",
            "scoreyear"=>"",
            "scoresales"=>"",
            "scoreprice"=>"",
            "scoredocurl"=>"",
            "scoreesst_ACT"=>"",
            "scoreest_INA" => "",
            "scoreest_PLN"=>"",
            "hasErrors" => false,
            "aErrors" => array(),
            "showaction"=>true,
            "readonly" => false
        );
        $modeDscArr = array(
            "INS" => "Nueva Partitura",
            "UPD" => "Editando Partitura (%s) %s",
            "DEL" => "Eliminando Partitura (%s) %s",
            "DSP" => "Detalle de Partitura (%s) %s"
        );

        if ($this->isPostBack()) {
            // se ejecuta al dar click sobre guardar
            $viewData["mode"] = $_POST["mode"];
            $viewData["scoreid"] = $_POST["scoreid"] ;
            $viewData["scoredsc"] = $_POST["scoredsc"];
            $viewData["scoreauthor"] = $_POST["scoreauthor"];
            $viewData["scoregenre"] = $_POST["scoregenre"];
            $viewData["scoreyear"] = $_POST["scoreyear"];
            $viewData["scoresales"] = $_POST["scoresales"];
            $viewData["scoreprice"] = $_POST["scoreprice"];
            $viewData["scoredocurl"] = $_POST["scoredocurl"];
            $viewData["scoreest"] = $_POST["scoreest"];
            // Validaciones de Errores
            switch($viewData["mode"]) {
            case "INS":
                if ( \Dao\Mnt\Scores::crearScore(
                    $viewData["scoredsc"],
                    $viewData["scoreauthor"],
                    $viewData["scoregenre"],
                    $viewData["scoreyear"],
                    $viewData["scoresales"],
                    $viewData["scoreprice"],
                    $viewData["scoredocurl"],
                    $viewData["scoreest"]
                    )
                ) {
                    $this->yeah();
                }
                break;
            case "UPD":
                if (\Dao\Mnt\Scores::editarScore(
                    $viewData["scoredsc"],
                    $viewData["scoreauthor"],
                    $viewData["scoregenre"],
                    $viewData["scoreyear"],
                    $viewData["scoresales"],
                    $viewData["scoreprice"],
                    $viewData["scoredocurl"],
                    $viewData["scoreest"],
                    $viewData["scoreid"]
                )) {
                    $this->yeah();
                }
                break;
            case "DEL":
                if (\Dao\Mnt\Scores::eliminarScore(
                    $viewData["scoreid"]
                )) {
                    $this->yeah();
                }
                break;
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
            if (isset($_GET["scoreid"])) {
                $viewData["scoreid"] = $_GET["scoreid"];
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
            $tmpScore = \Dao\Mnt\Scores::obtenerScore($viewData["scoreid"]);
            $viewData["scoredsc"] = $tmpScore["scoredsc"];
            $viewData["scoreauthor"] = $tmpScore["scoreauthor"];
            $viewData["scoregenre"] = $tmpScore["scoregenre"];
            $viewData["scoreyear"] = $tmpScore["scoreyear"];
            $viewData["scoresales"] = $tmpScore["scoresales"];
            $viewData["scoreprice"] = $tmpScore["scoreprice"];
            $viewData["scoredocurl"] = $tmpScore["scoredocurl"];
            $viewData["scoreest_ACT"] = $tmpScore["scoreest"] == "ACT" ? "selected": "";
            $viewData["scoreest_INA"] = $tmpScore["scoreest"] == "INA" ? "selected" : "";
            $viewData["scoreest_PLN"] = $tmpScore["scoreest"] == "PLN" ? "selected" : "";
            $viewData["mode_dsc"]  = sprintf(
                $modeDscArr[$viewData["mode"]],
                $viewData["scoreid"],
                $viewData["scoredsc"]
            );
            if ($viewData["mode"] == "DSP") {
                $viewData["showaction"]= false ;
                $viewData["readonly"] = "readonly";
            }
            if ($viewData["mode"] == "DEL") {
                $viewData["readonly"] = "readonly";
            }

        }


        \Views\Renderer::render("mnt/score", $viewData);
    }
}


?>
