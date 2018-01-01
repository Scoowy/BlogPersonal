<?php
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';

if (isset($_POST['enviar'])) {
    Conexion::abrirConexion();

    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'], $_POST['clave1'], $_POST['clave2'], Conexion :: obtenerConexion());

    if ($validador->registroValido()) {
        $usuario = new Usuario('', $validador->obtenerNombre(), $validador->obtenerEmail(), password_hash($validador->obtenerClave(), PASSWORD_DEFAULT), '', '', '');
        $usuarioInsertado = RepositorioUsuario::insertarUsuario(Conexion::obtenerConexion(), $usuario);

        if ($usuarioInsertado) {
            Redireccion::redirigir(RUTAREGISTROCORRECTO . '?nombre=' . $usuario->obtenerNombre());
        }
    }

    Conexion::cerrarConexion();
}

$titulo = 'Registro - Scoowy Page - Prebuilt Layoutt';

include_once 'plts/docDeclaracion.inc.php';
include_once 'plts/navBar.inc.php';
?>

<main role="main" class="container">
    <div class="jumbotron">
        <h1>
            Pagina de registro
            <small class="text-muted">Unete a la mejor comunidad!</small>
        </h1>
        <hr>
        <p class="lead">Etiam hendrerit libero magna, non sollicitudin orci vehicula a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque maximus sollicitudin dolor eget eleifend. </p>
        <a class="btn btn-primary" href="#">Seguir leyendo &raquo;</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Instrucciones</h3>
                    </div>
                    <div class="panel-body">
                        <p class="text-justify">
                            Para unirte a nuestra comunidad, introduce un bombre de usuario, tu email y una contrasena. El email que escribas debe ser real ya que lo necesitaras para gestinoar tu cuenta. Te recomendamos que uses una contrasena que contenga letras minusculas, mayusculas, numeros y simbolos.
                        </p>
                        <a href="#">Ya tines cuenta?</a>
                        <br>
                        <a href="#">Olvidaste tu contrasena?</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Formulario</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <?php
                            if (isset($_POST['enviar'])) {
                                include_once 'plts/registroValidado.inc.php';
                            } else {
                                include_once 'plts/registroVacio.inc.php';
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include_once 'plts/docCierre.inc.php';
?>

<script>
    $(function () {
        $('#linkRegistro').addClass("active");
    });
</script>