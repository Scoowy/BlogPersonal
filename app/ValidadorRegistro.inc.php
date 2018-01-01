<?php

include_once 'RepositorioUsuario.inc.php';

class ValidadorRegistro {

    private $avisoInicio;
    private $avisoCierre;
    private $nombre;
    private $email;
    private $clave;
    private $errorNombre;
    private $errorEmail;
    private $errorClave1;
    private $errorClave2;

    public function __construct($nombre, $email, $clave1, $clave2, $conexion) {
        $this->avisoInicio = "<br><div class='alert alert-dismissible alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>";
        $this->avisoCierre = "</div>";

        $this->nombre = "";
        $this->email = "";
        $this->clave = "";

        $this->errorNombre = $this->validarNombre($conexion, $nombre);
        $this->errorEmail = $this->validarEmail($conexion, $email);
        $this->errorClave1 = $this->validarClave1($clave1);
        $this->errorClave2 = $this->validarClave2($clave1, $clave2);

        if ($this->errorClave1 === "" && $this->errorClave2 === "") {
            $this->clave = $clave1;
        }
    }

    private function variableIniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    private function validarNombre($conexion, $nombre) {
        if (!$this->variableIniciada($nombre)) {
            return "Debes de escribir un nombre de usuario.";
        } else {
            $this->nombre = $nombre;
        }

        if (strlen($nombre) < 6) {
            return "El nombre debe tener mas de 6 caracteres.";
        }

        if (strlen($nombre) > 24) {
            return "El nombre debe tener menos de 24 caracteres.";
        }

        if (RepositorioUsuario :: nombreExiste($conexion, $nombre)) {
            return "Este nombre de usuario ya esta en uso. Por favor, prueba otro nombre de usuario.";
        }

        return "";
    }

    private function validarEmail($conexion, $email) {
        if (!$this->variableIniciada($email)) {
            return "Debes proporcionar un email.";
        } else {
            $this->email = $email;
        }

        if (RepositorioUsuario :: emailExiste($conexion, $email)) {
            return "Este email ya esta en uso. Por favor, pruebe otro email o <a href='#'>intente recuperar su contrasena</a>.";
        }

        return "";
    }

    private function validarClave1($clave1) {
        if (!$this->variableIniciada($clave1)) {
            return "Debes escribir una contrasena.";
        }

        return "";
    }

    private function validarClave2($clave1, $clave2) {
        if (!$this->variableIniciada($clave1)) {
            return "Primero debes escribir la contrasena.";
        }

        if (!$this->variableIniciada($clave2)) {
            return "Debes repetir la contrasena.";
        }

        if ($clave1 !== $clave2) {
            return "Ambas contrasenas deben coincidir.";
        }

        return "";
    }

    public function obtenerNombre() {
        return $this->nombre;
    }

    public function obtenerEmail() {
        return $this->email;
    }

    public function obtenerClave() {
        return $this->clave;
    }

    public function obtenerErrorNombre() {
        return $this->errorNombre;
    }

    public function obtenerErrorEmail() {
        return $this->errorEmail;
    }

    public function obtenerErrorClave1() {
        return $this->errorClave1;
    }

    public function obtenerErrorClave2() {
        return $this->errorClave2;
    }

    public function mostrarNombre() {
        if ($this->nombre !== "") {
            echo 'value="' . $this->nombre . '"';
        }
    }

    public function mostrarErrorNombre() {
        if ($this->errorNombre !== "") {
            echo $this->avisoInicio . $this->errorNombre . $this->avisoCierre;
        }
    }

    public function mostrarEmail() {
        if ($this->email !== "") {
            echo 'value="' . $this->email . '"';
        }
    }

    public function mostrarErrorEmail() {
        if ($this->errorEmail !== "") {
            echo $this->avisoInicio . $this->errorEmail . $this->avisoCierre;
        }
    }

    public function mostrarErrorClave1() {
        if ($this->errorClave1 !== "") {
            echo $this->avisoInicio . $this->errorClave1 . $this->avisoCierre;
        }
    }

    public function mostrarErrorClave2() {
        if ($this->errorClave2 !== "") {
            echo $this->avisoInicio . $this->errorClave2 . $this->avisoCierre;
        }
    }

    public function registroValido() {
        if ($this->errorNombre === "" && $this->errorEmail === "" && $this->errorClave1 === "" && $this->errorClave2 === "") {
            return true;
        } else {
            return false;
        }
    }

}
