<?php
// Informacion de la DB
define('NOMBRESERVIDOR', 'localhost');
define('NOMBREUSUARIO', 'root');
define('PASSWORD', '');
define('NOMBREDB', 'blogpersonal');


// Rutas de la web
define("SERVIDOR", "http://localhost/BlogPersonal");

// Rutas de la web - Tema: Usuarios
define("RUTAREGISTRO", SERVIDOR."/registro.php");
define("RUTAREGISTROCORRECTO", SERVIDOR."/registroCorrecto.php");
define("RUTALOGIN", SERVIDOR."/login.php");
define("RUTAUSUARIOS", SERVIDOR."/usuarios.php");
define("RUTAPERFIL", SERVIDOR."/perfil.php");

// Rutas de la web - Tema: Paginas propias
define("RUTAPROGRAMACION", SERVIDOR."/programacion.php");
define("RUTAGALERIA", SERVIDOR."/galeria.php");
define("RUTABLOG", SERVIDOR."/blog.php");
define("RUTAREPOSITORIO", SERVIDOR."/repositorio.php");

// Rutas de la web - Tema: Links Dropdown menu users
define("RUTAENTRADAS", SERVIDOR."/logout.php");
define("RUTACOMENTARIOS", SERVIDOR."/comentarios.php");
define("RUTAFAVORITOS", SERVIDOR."/favoritos.php");
define("RUTALOGOUT", SERVIDOR."/logout.php");