<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';

if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
} else {
    Redireccion::redirigir(SERVIDOR);
}

$titulo = 'Registro Correcto - Scoowy Page - Prebuilt Layout';

include_once 'plts/docDeclaracion.inc.php';
include_once 'plts/navBar.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><i class="fas fa-check-circle"></i> Registro Correcto</h3>
                </div>
                <hr>
                <div class="panel-body text-center">
                    <p>Gracias por registrarte <p class="text-primary"><?php echo $nombre ?></p></p>
                    <br>
                    <p><a href="<?php echo RUTALOGIN ?>">Inicia sesion</a> para poder comentar y  calificar los articulos.</p>
                </div>
            </div>
        </div>
    </div>
</div>
