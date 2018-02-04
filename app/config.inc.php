<?php

// Informacion de la DB
define('NOMBRESERVIDOR', 'localhost');
define('NOMBREUSUARIO', 'root');
define('PASSWORD', '');
define('NOMBREDB', 'blogpersonal');

// Rutas de la web
define("SERVIDOR", "http://localhost/BlogPersonal");

// Rutas de la web - Tema: Usuarios
define("RUTAREGISTRO", SERVIDOR . "/registro");
define("RUTAREGISTROCORRECTO", SERVIDOR . "/registroCorrecto");
define("RUTALOGIN", SERVIDOR . "/login");
define("RUTAUSUARIOS", SERVIDOR . "/usuarios");
define("RUTAPERFIL", SERVIDOR . "/perfil");

// Rutas de la web - Tema: Paginas propias
define("RUTAPROGRAMACION", SERVIDOR . "/programacion");
define("RUTAGALERIA", SERVIDOR . "/galeria");
define("RUTABLOG", SERVIDOR . "/blog");
define("RUTAREPOSITORIO", SERVIDOR . "/repositorio");

// Rutas de la web - Tema: Links Dropdown menu users
define("RUTAENTRADAS", SERVIDOR . "/logout");
define("RUTACOMENTARIOS", SERVIDOR . "/comentarios");
define("RUTAFAVORITOS", SERVIDOR . "/favoritos");
define("RUTALOGOUT", SERVIDOR . "/logout");

// Recursos
define("RUTACSS", SERVIDOR . "/css/");
define("RUTAJS", SERVIDOR . "/js/");
define("RUTAIMG", SERVIDOR . "/img/");