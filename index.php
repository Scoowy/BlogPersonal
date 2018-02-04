<?php

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
        }
    } else if (count($partesRuta) == 3) {
        if (($partesRuta[1] == 'registro-correcto') || ($partesRuta[1] == 'registroCorrecto')) {
            $nombre = $partesRuta[2];
            $rutaElegida = 'vistas/registroCorrecto.php';
        }
    }
} 

include_once $rutaElegida;

