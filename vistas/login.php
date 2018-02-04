<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/config.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if (ControlSesion::sesionIniciada()) {
    Redireccion::redirigir(SERVIDOR);
}

if (isset($_POST['login'])) {
    Conexion::abrirConexion();

    $validador = new ValidadorLogin($_POST['email'], $_POST['clave'], Conexion::obtenerConexion());

    if ($validador->obtenerError() === '' && !is_null($validador->obtenerUsuario())) {
        // Iniciar sesion
        // Redirigir al usuario a index
        ControlSesion::iniciarSesion($validador->obtenerUsuario()->obtenerId(), $validador->obtenerUsuario()->obtenerNombre(), $validador->obtenerUsuario()->obtenerFoto(), $validador->obtenerUsuario()->obtenerActivo());
        Redireccion::redirigir(SERVIDOR);
    } else {
        echo 'Inicio de sesion ERROR';
    }

    Conexion::cerrarConexion();
}

$titulo = 'Iniciar Sesion - Scoowy Page - Prebuilt Layout';

include_once 'plts/docDeclaracion.inc.php';
include_once 'plts/navBar.inc.php';
?>

<main role="main" class="container">
    <dir class="container">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4>Iniciar sesion</h4>
                    </div>
                    <div class="panel-body">
                        <form role="form"  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <fieldset>
                                <div class="form-group">
                                    <label>Correo electrónico</label>
                                    <input class="form-control" id="email" aria-describedby="emailHelp" placeholder="ejemplo@dominio.com" type="email" name="email"
                                    <?php
                                    if (isset($_POST['login']) && isset($_POST['email']) && !empty($_POST['email'])) {
                                        echo 'value="' . $_POST['email'] . '"';
                                    }
                                    ?> required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Contrasena</label>
                                    <input class="form-control" type="password" name="clave" required>
                                </div>
                                <?php
                                if (isset($_POST['login'])) {
                                    $validador->mostrarError();
                                }
                                ?>
                                <hr>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success" name="login">Iniciar Sesion</button>
                                </div>
                                <br>
                                <div class="text-center">
                                    <a href="#"><small>Olvidaste tu contrasena?</small></a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </dir>  
</main>

<?php
include_once 'plts/docCierre.inc.php';
?>

<script>
    $(function () {
        $('#linkLogin').addClass("active");
    });
</script>