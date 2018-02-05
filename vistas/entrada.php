<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';

$titulo = 'Entrada - Scoowy Page - Prebuilt Layout';

include_once 'plts/docDeclaracion.inc.php';
//include_once 'plts/navBar.inc.php';
?>

<?php
include_once 'app/config.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';
?>
<div class="container" style="background-color: white;">
    <h2>Titulo del Articulo: <?php echo $entrada->obtenerTitulo() ?></h2>
    <h3>Nombre del Autor: <?php echo $entrada->obtenerNombre() ?></h3>
    <hr>
    <p class="text-justify p-4"><?php echo $entrada->obtenerTexto() ?></p>
</div>

<!-- Insertar el contenido de la pagina aqui -->

<?php
include_once 'plts/docCierre.inc.php';
?>
