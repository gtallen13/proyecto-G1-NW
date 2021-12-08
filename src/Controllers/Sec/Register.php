<?php

namespace Controllers\Sec;

use Controllers\PublicController;
use \Utilities\Validators;
use Exception;

class Register extends PublicController
{
    private $txtEmail = "";
    private $txtPswd = "";
    private $txtUsername = "";
    private $errorEmail ="";
    private $errorPswd = "";
    private $errorUsername = "";
    private $hasErrors = false;
    public function run() :void
    {

        if ($this->isPostBack()) {
            $this->txtEmail = $_POST["txtEmail"];
            $this->txtPswd = $_POST["txtPswd"];
            $this->txtUsername = $_POST["txtUsername"];
            //validaciones
            if (!(Validators::IsValidEmail($this->txtEmail))) {
                $this->errorEmail = "El correo no tiene el formato adecuado";
                $this->hasErrors = true;
            }
            if (!Validators::IsValidPassword($this->txtPswd)) {
                $this->errorPswd = "La contraseña debe tener al menos 8 caracteres una mayúscula, un número y un caracter especial.";
                $this->hasErrors = true;
            }
            $userRegex = "/^[A-Za-z][A-Za-z0-9]{5,31}$/";
            if (!(Validators::MatchesRegex($userRegex,$this->txtUsername)))
            {
                $this->$errorUsername = "El nombre de usuario no tiene el formato adecuado";
                $this->$hasErrors = true;
            }

            
            if (!$this->hasErrors) {
                try{
                    if (\Dao\Security\Security::newUsuario($this->txtEmail, $this->txtPswd,$this->txtUsername,"ACT","CLN","ACT")) {
                        \Utilities\Site::redirectToWithMsg("index.php?page=sec_login", "¡Usuario Registrado Satisfactoriamente!");
                    }
                } catch (Error $ex){
                    die($ex);
                }
            }
        }
        $viewData = get_object_vars($this);
        \Views\Renderer::render("security/sigin", $viewData);
    }
}
?>
