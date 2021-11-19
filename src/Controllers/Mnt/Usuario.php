<?php
namespace Controllers\Mnt;
use Controllers\PublicController;

class Usuario extends PublicController
{
    private function nope()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=mnt_usuarios",
            "Ocurrio algo inesperado. Intente Nuevamente"
        );
    }
    private function yeah()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=mnt_usuarios",
            "Operacion ejecutada Satisfactoriamente!"
        );
    }
    public function run() :void
    {
        $viewData = array(
            "mode_dsc" => "",
            "mode" => "",
            "usercod"=> "",
            "useremail"=> "", 
            "username"=> "", 
            "userpswd"=>"",
            "userpswdest_ACT"=> "",
            "userpswdest_INA" => "",
            "userpswdest_BLQ" => "",
            "userpswdest_SUS" => "",
            "userest_ACT"=> "",
            "userest_INA" => "",
            "userest_BLQ" => "",
            "userest_SUS" => "",
            "userpswdchg" => "",
            "usertipo_PBL" => "",
            "usertipo_ADM" => "",
            "usertipo_AUD" => "",
            "hasErrors" => false,
            "aErrors" => array(),
            "showaction" => true,
            "readonly" => false,
            "show"=>"none" 
        );
        $modeDscArr = array(
            "INS" => "Nueva Usuario",
            "UPD" => "Editando Usuario (%s) %s",
            "DEL" => "Eliminando Usuario (%s) %s",
            "DSP" => "Detalle de Usuario (%s) %s"
        );
        $rolescod = array();
        if ($this->isPostBack())
        {
            $viewData["mode"] = $_POST["mode"];
            $viewData["usercod"]=$_POST["usercod"];
            $viewData["useremail"]=$_POST["useremail"];
            $viewData["username"]= $_POST["username"];
            $viewData["userpswd"] = $_POST["userpswd"];
            $viewData["userpswdest"]= $_POST["userpswdest"];
            $viewData["userest"]= $_POST["userest"];
            $viewData["usertipo"]= $_POST["usertipo"];
            //validaciones
            
            switch($viewData["mode"]){
                case "INS":
                    if (\Dao\Security\Security::newUsuario($viewData["useremail"],$viewData["userpswd"],$viewData["username"],$viewData["userest"],$viewData["usertipo"], $viewData["userpswdest"])){
                        $this->yeah();
                    }
                    break;
                case "UPD":
                    if (\Dao\Mnt\Usuarios::editarUsuario(
                        $viewData["username"], 
                        $viewData["userpswdest"],
                        $viewData["userest"],
                        $viewData["usertipo"],
                        $viewData["usercod"])
                    ){
                        $this->yeah();
                    }
                    break;
                case "DEL":
                    if (\Dao\Mnt\Usuarios::eliminarUsuario($viewData["usercod"])
                    ){
                        $this->yeah();
                    }
                    break;
            }
            

        } else {
            if (isset($_GET["mode"]))
            {

                if (!isset($modeDscArr[$_GET["mode"]])){
                    $this->nope();
                }
                $viewData["mode"] = $_GET["mode"];
                if (isset($_GET["usercod"]))
                {
                    $viewData["usercod"] = $_GET["usercod"];
                }
                else
                {
                    $this->nope();
                }
                if (isset($_GET["usercod"]))
                {
                    $viewData["usercod"] = $_GET["usercod"];
                }
                else
                {
                    if($viewData["mode"] !== "INS")
                    {
                        $this->nope();
                    }
                }
            }
        }
        if ($viewData["mode"]=="INS")
        {
            $viewData["mode_dsc"] = $modeDscArr["INS"];
        }
        else
        {
            $tmpUsuario = \Dao\Mnt\Usuarios::obtenerUsuario($viewData["usercod"]);
            $viewData["useremail"] = $tmpUsuario["useremail"]; 
            $viewData["username"] = $tmpUsuario["username"]; 
            $viewData["userpswd"] = $tmpUsuario["userpswd"]; 
            $viewData["userpswdest_ACT"] = $tmpUsuario["userpswdest"] == "ACT" ? "selected": ""; 
            $viewData["userpswdest_INA"] = $tmpUsuario["userpswdest"] == "INA" ? "selected": ""; 
            $viewData["userpswdest_BLQ"] = $tmpUsuario["userpswdest"] == "BLQ" ? "selected": ""; 
            $viewData["userpswdest_SUS"] = $tmpUsuario["userpswdest"] == "SUS" ? "selected": ""; 
            $viewData["userest_ACT"] = $tmpUsuario["userest"] == "ACT"? "selected":""; 
            $viewData["userest_INA"] = $tmpUsuario["userest"] == "INA"? "selected":"";
            $viewData["userest_BLQ"] = $tmpUsuario["userest"] == "BLQ"? "selected":""; 
            $viewData["userest_SUS"] = $tmpUsuario["userest"] == "SUS"? "selected":"";
            $viewData["usertipo_PBL"] = $tmpUsuario["usertipo"] == "PBL"? "selected":"";; 
            $viewData["usertipo_ADM"] = $tmpUsuario["usertipo"] == "ADM"? "selected":""; 
            $viewData["usertipo_AUD"] = $tmpUsuario["usertipo"] == "AUD"? "selected":""; 
            $viewData["mode_dsc"] = sprintf(
                $modeDscArr[$viewData["mode"]],
                $viewData["usercod"],
                $viewData["username"]
            );
            if ($viewData["mode"] == "DSP"){
                $viewData["showaction"] = false;
                $viewData["readonly"] = "readonly";
            }
            if ($viewData["mode"] == "DEL"){
                $viewData["readonly"] = "readonly";
            }
            if ($viewData["mode"] == "UPD")
            {
                $viewData["show"] = "block";
            }

        }
        \Views\Renderer::render("usuarios/usuario",$viewData);
    }

}
?>