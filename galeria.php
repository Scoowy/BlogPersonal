<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';

$titulo = 'Galeria - Scoowy Page - Prebuilt Layout';

include_once 'plts/docDeclaracion.inc.php';
include_once 'plts/navBar.inc.php';
?>

<!-- Insertar el contenido de la pagina aqui -->

<?php
include_once 'plts/docCierre.inc.php';
?>

<script>
    $(function() {$('#linkGaleria').addClass("active");});
</script>