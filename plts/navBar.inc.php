<?php
include_once 'app/ControlSesion.inc.php';
include_once 'app/config.inc.php';

Conexion::abrirConexion();
$totalUsuarios = RepositorioUsuario::obtenerNumeroUsuarios(Conexion::obtenerConexion());
?>


<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary py-lg-2 py-md-3 py-sm-3" onselectstart="return false">
    <a class="navbar-brand" href="<?php echo SERVIDOR ?>">Scoowy Page</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" aria-haspopup="true">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item" id="linkInicio">
                <a class="nav-link" href="<?php echo SERVIDOR ?>"><i class="fas fa-home"></i> Inicio<span class="sr-only">(actual)</span></a>
            </li>
            <li class="nav-item" id="linkProgramacion">
                <a class="nav-link disabled" href="<?php echo RUTAPROGRAMACION ?>"><i class="fas fa-code"></i> Programacion</a>
            </li>
            <li class="nav-item" id="linkGaleria">
                <a class="nav-link disabled" href="<?php echo RUTAGALERIA ?>"><i class="fas fa-images"></i> Galeria</a>
            </li>
            <li class="nav-item" id="linkBlog">
                <a class="nav-link" href="<?php echo RUTABLOG ?>"><i class="fab fa-blogger-b"></i> Blog</a>
            </li>
            <li class="nav-item" id="linkRepositorio">
                <a class="nav-link disabled" href="<?php echo RUTAREPOSITORIO ?>"><i class="fas fa-code-branch"></i> Repositorio</a>
            </li>
            <li class="nav-item" id="linkUsuarios">
                <a class="nav-link" href="<?php echo RUTAUSUARIOS ?>"><i class="fas fa-users"></i>
                    <?php
                    echo $totalUsuarios
                    ?>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if (ControlSesion::sesionIniciada()) {
                ?>
                <!-- <li class="nav-item">
                        <a class="nav-link" href="#">
                                <i class="fas fa-user"></i>
                        </a>
                </li> -->
                <img class="" id="fotoNavBar" src="<?php echo $_SESSION['foto']; ?>" title="<?php echo ' ' . $_SESSION['nombreUsuario']; ?>" data-toggle="tooltip" data-placement="bottom">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-circle <?php echo $_SESSION['activo'] ?>"></i> <?php echo ' ' . $_SESSION['nombreUsuario']; ?> <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu style="max-width: 100px"> <!-- x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 39px, 0px); top: 0px; left: 0px; will-change: transform;" Todo eso hace recuadro emergente-->
                         <a class="dropdown-item" href="<?php echo RUTAPERFIL ?>"><i class="fas fa-user"></i> Perfil</a>
                        <a class="dropdown-item" href="<?php echo RUTAENTRADAS ?>"><i class="fas fa-edit"></i> Entradas</a>
                        <a class="dropdown-item" href="<?php echo RUTACOMENTARIOS ?>"><i class="fas fa-comments"></i> Comentarios</a>
                        <a class="dropdown-item" href="<?php echo RUTAUSUARIOS ?>"><i class="fas fa-users"></i> Usuarios</a>
                        <a class="dropdown-item" href="<?php echo RUTAFAVORITOS ?>"><i class="fas fa-heart"></i> Favoritos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo RUTALOGOUT ?>"><i class="fas fa-sign-out-alt"></i> Cerrar serion</a>
                    </div>
                </li>
                <?php
            } else {
                ?>
                <li class="nav-item" id="linkLogin">
                    <a class="nav-link" href="<?php echo RUTALOGIN ?>"><i class="fas fa-sign-out-alt"></i> Iniciar Sesion</a>
                </li>
                <li class="nav-item" id="linkRegistro">
                    <a class="nav-link" href="<?php echo RUTAREGISTRO ?>"><i class="fa fa-plus"></i> Registro</a>
                </li>
                <?php
            }
            ?>
        </ul>
        <!-- Caja de busqueda -->
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control ml-sm-5 mr-sm-2" type="text" placeholder="Que estas buscando..." id="busqueda" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
</nav>

<div class="espacioSep"></div>
