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

$inicioTime = microtime(true);

Conexion::abrirConexion();

$DOMINIO = ['com', 'es', 'net'];

# Relleno de Usuarios
for ($usuarios = 0; $usuarios < 100; $usuarios++) {
    $nombre = sa(random_int(10, 25));
    $email = sa(random_int(5, 15)) . '@' . sa(3) . '.' . $DOMINIO[random_int(0, 2)];
    $password = password_hash('123456', PASSWORD_DEFAULT);
    $foto = 'img/usuario.png';

    $usuario = new Usuario('', $nombre, $email, $password, $foto, '', '');
    RepositorioUsuario::insertarUsuario(Conexion::obtenerConexion(), $usuario);
}
# Fin Relleno de Usuarios
# Relleno de Entradas Blog
for ($entradas = 0; $entradas < 100; $entradas++) {
    $titulo = sa(random_int(10, 30));
    $texto = lorem();
    $autor = rand(1, 100);

    $entrada = new Entrada('', $autor, $titulo, $texto, '', '');
    RepositorioEntrada::insertarEntrada(Conexion::obtenerConexion(), $entrada);
}

for ($comentarios = 0; $comentarios < 100; $comentarios++) {
    $titulo = sa(random_int(10, 30));
    $texto = lorem();
    $autor = rand(1, 100);
    $entrada = rand(1, 100);

    $comentario = new Comentario('', $autor, $entrada, $titulo, $texto, '');
    RepositorioComentario::insertarComentario(Conexion::obtenerConexion(), $comentario);
}
# Fin de Relleno de Entradas Blog
# Variables de prueba
$LENGUAJES = ['Python', 'PHP', 'HTML', 'Java', 'C++', 'C', 'C#', 'Ruby'];
$IMAGENES = ['img/Ext_Py.jpg', 'img/Ext_PHP.jpg', 'img/Ext_HTML.jpg', 'img/Ext_All.jpg', 'img/Ext_All.jpg', 'img/Ext_All.jpg', 'img/Ext_All.jpg', 'img/Ext_All.jpg'];
# Fin Variables de prueba
# Relleno de Lenguajes de Programacion
for ($li = 0; $li < count($LENGUAJES); $li++) {
    $nombre = $LENGUAJES[$li];
    $imagen = $IMAGENES[$li];
    $color1 = sa(5);
    $color2 = sa(5);

    $lenguajeProg = new LenguajeProg('', $nombre, $imagen, $color1, $color2, '');
    RepositorioLenguajeProg::insertarLenguajeProg(Conexion::obtenerConexion(), $lenguajeProg);
}
# Fin Relleno de Lenguajes de Programacion
# Relleno de Entradas Programacion
for ($entradasProg = 0; $entradasProg < 100; $entradasProg++) {
    $lenguajeP = selectLeng();
    $autor = rand(1, 100);
    $titulo = sa(random_int(10, 30));
    $texto = lorem();
    $imagen = 'img/imgPrueba.jpg';

    $entradaProg = new EntradaProg('', $autor, $lenguajeP, $titulo, $texto, $imagen, '', '');
    RepositorioEntradaProg::insertarEntradaProg(Conexion::obtenerConexion(), $entradaProg);
}

set_time_limit(30);

for ($comentariosProg = 0; $comentariosProg < 100; $comentariosProg++) {
    $titulo = sa(random_int(10, 30));
    $texto = lorem();
    $autor = rand(1, 100);
    $entrada = rand(1, 100);

    $comentarioProg = new ComentarioProg('', $autor, $entrada, $titulo, $texto, '');
    RepositorioComentarioProg::insertarComentarioProg(Conexion::obtenerConexion(), $comentarioProg);
}
# Fin de Relleno de Entradas Programacion
# Variables de prueba
$TIPOS = ['Restaurante', 'Bar', 'Hotel', 'Parque', 'Playa', 'Universidad', 'Colegio', 'Discoteca'];
# Fin Variables de prueba
# Relleno de Ubicaciones
for ($ubicaciones = 0; $ubicaciones < 100; $ubicaciones++) {
    $nombre = sa(random_int(15, 50));
    $direccion = sa(random_int(30, 50));
    $lat = randomFloat(0, 90);
    $lng = randomFloat(0, 180);
    $tipo = selectTipo($TIPOS);

    $ubicacion = new Ubicacion('', $nombre, $direccion, $lat, $lng, $tipo);
    RepositorioUbicacion::insertarUbicacion(Conexion::obtenerConexion(), $ubicacion);
}
# Fin Relleno de Ubicaciones
# Relleno de Entradas Imagenes
for ($entradasImg = 0; $entradasImg < 100; $entradasImg++) {
    $lenguajeP = selectLeng();
    $autor = rand(1, 100);
    $titulo = sa(random_int(10, 30));
    $texto = lorem();
    $imagen = 'img/imgPrueba.jpg';
    $ubi = rand(1, 100);

    $entradaImg = new EntradaImg('', $autor, $titulo, $texto, $imagen, '', $ubi, '');
    RepositorioEntradaImg::insertarEntradaImg(Conexion::obtenerConexion(), $entradaImg);
}

for ($comentariosImg = 0; $comentariosImg < 100; $comentariosImg++) {
    $titulo = sa(random_int(10, 30));
    $texto = lorem();
    $autor = rand(1, 100);
    $entrada = rand(1, 100);

    $comentarioImg = new ComentarioImg('', $autor, $entrada, $titulo, $texto, '');
    RepositorioComentarioImg::insertarComentarioImg(Conexion::obtenerConexion(), $comentarioImg);
}
# Fin de Relleno de Entradas Imagenes

function sa($longitud) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ';
    $numeroCaracteres = strlen($caracteres);
    $stringAleatorio = '';

    for ($i = 0; $i < $longitud; $i++) {
        $stringAleatorio .= $caracteres[rand(0, $numeroCaracteres - 1)];
    }

    return $stringAleatorio;
}

function lorem() {
    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec eros nec elit porta rhoncus in a ligula. Quisque euismod libero nulla, tincidunt iaculis mi pretium id. Cras pharetra justo ut dapibus iaculis. Etiam quis luctus dui. Phasellus in ultricies elit. Curabitur tortor risus, efficitur quis lectus viverra, ultricies consectetur quam. Donec sagittis urna nec sollicitudin tincidunt. Duis ut orci pharetra dui hendrerit imperdiet et nec erat. Cras purus velit, vehicula non venenatis at, tempor at diam. In hac habitasse platea dictumst. Morbi consectetur dui in lectus mattis, vel vestibulum sem congue. Curabitur nec lectus ullamcorper orci tincidunt condimentum.

        Nunc rutrum dignissim luctus. Morbi vitae velit consectetur, varius mauris at, porttitor justo. Pellentesque ipsum ipsum, fringilla gravida porttitor dapibus, ultrices non tortor. Pellentesque bibendum aliquam nibh, sed blandit velit placerat dapibus. Maecenas suscipit nulla sit amet rhoncus auctor. Fusce vitae vulputate orci, quis ultrices tortor. Nam aliquet, risus eget commodo iaculis, lectus leo sollicitudin sem, quis pretium neque augue ac diam. Morbi sit amet pulvinar diam, nec vehicula dolor. Cras viverra semper lorem eget dignissim. Quisque et tristique odio. Aliquam auctor quis nisl quis suscipit.

        Mauris vel felis sed quam fermentum venenatis. Phasellus metus ipsum, porta ac dolor sed, dictum commodo nunc. Maecenas vitae vestibulum lectus. Integer id turpis sed ligula tempus convallis. Nullam feugiat arcu ac euismod auctor. Mauris cursus eu nisl id vestibulum. In eros lectus, venenatis at sem semper, egestas tempor quam. Nam sagittis enim fringilla, tincidunt nibh et, sagittis metus.

        Duis vel porta ipsum. In nec augue est. Praesent mattis vulputate lectus. Nulla aliquam porttitor pretium. Maecenas ut erat ullamcorper, lobortis tellus eget, laoreet ex. Curabitur accumsan massa sem, non tempor ante porttitor nec. Donec ut dui hendrerit, luctus risus ut, rutrum enim. Sed purus ligula, sollicitudin vitae scelerisque placerat, facilisis non velit. Nulla imperdiet nisi at nulla ornare iaculis.

        Nam in lobortis neque. Praesent velit dolor, consequat et erat eget, feugiat bibendum massa. Cras at dignissim orci, gravida aliquam massa. Nam efficitur vestibulum ligula sit amet euismod. Praesent aliquet at tellus vitae iaculis. Proin congue porta justo. Vestibulum bibendum magna erat, eu aliquam tortor ultricies ac. Vivamus rhoncus dictum consectetur. Nullam rhoncus urna vel feugiat sodales. Suspendisse nulla ante, tincidunt ut ultrices vel, lacinia eu neque.';

    return $lorem;
}

function selectLeng() {
    $lenP = rand(1, 8);
    return $lenP;
}

function selectTipo($TIPOS) {
    $tipo = $TIPOS[rand(0, 7)];
    return $tipo;
}

function randomFloat($min = 0, $max = 1) {
    $num = $min + mt_rand() / mt_getrandmax() * ($max - $min);

    if (random_int(0, 1)) {
        $num = $num * (-1);
    }
    return round($num, 6);
}

# Tiempo de ejecucion del script junto a $inicioTime = microtime(true)
$finTime = microtime(true);
$totalTime = $finTime - $inicioTime;
echo 'Completado en: ' . round($totalTime, 2);
