<?php

class ControlSesion {
    
    public static function iniciarSesion($idUsuario, $nombreUsuario, $foto, $activo) {
        if (session_id() == '') {
            session_start();
        }

        $_SESSION['idUsuario'] = $idUsuario;
        $_SESSION['nombreUsuario'] = $nombreUsuario;
        $_SESSION['foto'] = $foto;
        
        if ($activo == '0') {
            $activo = 'text-danger';
        } else {
            $activo = 'text-success';
        }
        
        $_SESSION['activo'] = $activo;
    }

    public static function cerrarSesion() {
        if (session_id() == '') {
            session_start();
        }

        if (isset($_SESSION['idUsuario'])) {
            unset($_SESSION['idUsuario']);
        }

        if (isset($_SESSION['nombreUsuario'])) {
            unset($_SESSION['nombreUsuario']);
        }

        session_destroy();
    }

    public static function sesionIniciada() {
        if (session_id() == '') {
            session_start();
        }

        if (isset($_SESSION['idUsuario']) && isset($_SESSION['nombreUsuario'])) {
            return true;
        } else {
            return false;
        }
    }

}