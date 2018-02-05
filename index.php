<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/EntradaProg.inc.php';
include_once 'app/EntradaImg.inc.php';
include_once 'app/Comentario.inc.php';
include_once 'app/ComentarioProg.inc.php';
include_once 'app/ComentarioImg.inc.php';
include_once 'app/LenguajeProg.inc.php';
include_once 'app/Ubicacion.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioEntradaProg.inc.php';
include_once 'app/RepositorioEntradaImg.inc.php';
include_once 'app/RepositorioComentario.inc.php';
include_once 'app/RepositorioComentarioProg.inc.php';
include_once 'app/RepositorioComentarioImg.inc.php';
include_once 'app/RepositorioLenguajesProg.inc.php';
include_once 'app/RepositorioUbicacion.inc.php';

$componentesUrl = parse_url($_SERVER["REQUEST_URI"]);

$ruta = $componentesUrl['path'];

$partesRuta = explode('/', $ruta);
$partesRuta = array_filter($partesRuta);
$partesRuta = array_slice($partesRuta, 0);

$rutaElegida = 'vistas/404.php';

if ($partesRuta[0] == 'BlogPersonal') {
    if (count($partesRuta) == 1) {
        $rutaElegida = 'vistas/home.php';
    }  else if (count($partesRuta) == 2) {
        switch ($partesRuta[1]) {
            case 'blog':
                $rutaElegida = 'vistas/blog.php';
                break;
            case 'galeria':
                $rutaElegida = 'vistas/galeria.php';
                break;
            case 'home':
                $rutaElegida = 'vistas/home.php';
                break;
            case 'login':
                $rutaElegida = 'vistas/login.php';
                break;
            case 'logout':
                $rutaElegida = 'vistas/logout.php';
                break;
            case 'programacion':
                $rutaElegida = 'vistas/programacion.php';
                break;
            case 'registro':
                $rutaElegida = 'vistas/registro.php';
                break;
            case 'repositorio':
                $rutaElegida = 'vistas/repositorio.php';
                break;
            case 'rellenoDev':
                $rutaElegida = 'tools/scriptRelleno.php';
                break;
        }
    } else if (count($partesRuta) == 3) {
        if (($partesRuta[1] == 'registro-correcto') || ($partesRuta[1] == 'registroCorrecto')) {
            $nombre = $partesRuta[2];
            $rutaElegida = 'vistas/registroCorrecto.php';
        }
        if ($partesRuta[1] == 'entrada') {
            $url = $partesRuta[2];
            print $partesRuta[2];
            Conexion::abrirConexion();
            $entrada = RepositorioEntrada::obtenerEntradaPorUrl(Conexion::obtenerConexion(), $url);
            
            if ($entrada != null) {
                $rutaElegida = 'vistas/entrada.php';
            }
            
        }
    }
} 

include_once $rutaElegida;

