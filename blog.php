<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/EscritorEntradas.inc.php';

$titulo = 'Blog - Scoowy Page - Prebuilt Layout';

include_once 'plts/docDeclaracion.inc.php';
include_once 'plts/navBar.inc.php';
?>

<main role="main" class="container">
    <div class="jumbotron">
        <h1>
            Novedades
            <small class="text-muted">Siempre actualizado</small>
        </h1>
        <hr class="my-4">
        <p class="lead">Etiam hendrerit libero magna, non sollicitudin orci vehicula a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque maximus sollicitudin dolor eget eleifend. </p>
        <a class="btn btn-primary" href="#">Seguir leyendo &raquo;</a>
    </div>

    <div class="container">
        <div class="container">
            <br>
            <h1 class="text-primary">Ultimos Articulos</h1>
            <hr class="mb-4">
        </div>
        <div class="container">
            <div class="row">
                <?php
                EscritorEntradas::escribirEntradas();
                ?>
            </div>
        </div>
    </div>
    <hr class="my-4">
</main>

<?php
include_once 'plts/docCierre.inc.php';
?>

<script>
    $(function () {
        $('#linkBlog').addClass("active");
    });
</script>