<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';

Conexion::abrirConexion();

for ($usuarios = 0; $usuarios < 100; $usuarios++) {
    $nombre = sa(10);
    $email = sa(5) . '@' . sa(3);
    $password = password_hash('123456', PASSWORD_DEFAULT);
    $foto = 'img/usuario.png';

    $usuario = new Usuario('', $nombre, $email, $password, $foto, '', '');
    RepositorioUsuario::insertarUsuario(Conexion::obtenerConexion(), $usuario);
}

for ($entradas = 0; $entradas < 100; $entradas++) {
    $titulo = sa(10);
    $texto = lorem();
    $autor = rand(1, 100);

    $entrada = new Entrada('', $autor, $titulo, $texto, '', '');
    RepositorioEntrada::insertarEntrada(Conexion::obtenerConexion(), $entrada);
}

for ($comentarios = 0; $comentarios < 100; $comentarios++) {
    $titulo = sa(10);
    $texto = lorem();
    $autor = rand(1, 100);
    $entrada = rand(1, 100);

    $comentario = new Comentario('', $autor, $entrada, $titulo, $texto, '');
    RepositorioComentario::insertarComentario(Conexion::obtenerConexion(), $comentario);
}

function sa($longitud) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
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
