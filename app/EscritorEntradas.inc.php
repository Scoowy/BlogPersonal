<?php
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Conexion.inc.php';

class EscritorEntradas {

    public static function escribirEntradas() {
        $entradas = RepositorioEntrada::obtenerTodasFechaDesc(Conexion::obtenerConexion());

        if (count($entradas)) {
            foreach ($entradas as $entrada) {
                self::escribirEntrada($entrada);
            }
        }
    }

    public static function escribirTarjetas() {
        $entradas = RepositorioEntrada::obtenerTodasFechaDesc(Conexion::obtenerConexion());

        if (count($entradas)) {
            foreach ($entradas as $entrada) {
                self::escribirTarjeta($entrada);
            }
        }
    }

    public static function escribirEntMinimals() {
        $entradas = RepositorioEntrada::obtenerTodasFechaDesc(Conexion::obtenerConexion());

        if (count($entradas)) {
            foreach ($entradas as $entrada) {
                self::escribirEntMinimal($entrada);
            }
        }
    }

    public static function escribirEntrada($entrada) {
        if (!isset($entrada)) {
            echo ' No escribo entradas';
            return;
        } else {
            ?>

            <div class="col-md-6 py-1 px-1">
                <div class="panel panel-default" id="entradasBlog">
                    <div class="panel-heading">
                        <h5>
                            <?php
                            echo $entrada->obtenerTitulo();
                            ?>
                        </h5>
                        <hr class="pt-0">
                    </div>

                    <div class="panel-body">
                        <div class="text-justify" id="entradasBlogBody">
                            <?php
                            echo nl2br(self::resumirTexto($entrada->obtenerTexto()));
                            ?>
                        </div>
                    </div>
                    <br>
                    <div>
                        <a class="btn btn-info btn-sm" role="button" href="#">Seguir leyendo</a>
                    </div>
                    <hr class="mb-md-0">
                    <p style="text-align: right; margin-bottom: 0px;">
                        <small>
                            <a href="#">
                                <?php
                                echo $entrada->obtenerNombre();
                                ?>
                            </a>
                            <?php
                            echo $entrada->obtenerFecha();
                            ?>
                        </small>
                    </p>
                </div>
            </div>
            <br>

            <?php
        }
    }

    public static function escribirTarjeta($entrada) {
        if (!isset($entrada)) {
            echo ' No escribo entradas';
            return;
        } else {
            ?>

            <div class="contenedor_tarjeta" id="tarjetaPy">
                <a href="#">
                    <figure id="tarjeta">
                        <div class="frontal">
                            <img src="img/Ext_Py.jpg" alt="">
                            <div class="textTarjetaFront">
                                <?php
                                echo $entrada->obtenerTitulo();
                                ?>
                            </div>
                        </div>
                        <figcaption class="trasera">
                            <h2 class="titulo">
                                <?php
                                echo $entrada->obtenerTitulo();
                                ?>
                            </h2>
                            <hr>
                            <?php
                            echo nl2br(self::resumirTexto($entrada->obtenerTexto()));
                            ?>
                        </figcaption>
                    </figure>
                </a>
            </div>

            <?php
        }
    }

    public static function escribirEntMinimal($entrada) {
        if (!isset($entrada)) {
            echo ' No escribo entradas minimalistas';
            return;
        } else {
            ?>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="img/600x270.png" alt="">
                    <div class="caption py-3 px-3">
                        <div class="container-fluid px-0">
                            <div class="media pb-2">
                                <img class="mr-2 ml-0 avatarUser" src="img/usuario.png" alt="Imagen del usuario">
                                <div class="media-body">
                                    <h6 class="mt-1 mb-1 text-secondary  nombreUser">
                                        <a href="#" title="">
                                            <?php
                                            echo $entrada->obtenerNombre();
                                            ?>
                                        </a>
                                        
                                    </h6>
                                <small>
                                    <?php
                                    echo $entrada->obtenerFecha();
                                    ?>
                                </small>
                              </div>
                            </div>
                            
                        </div>
                        <h5 class="text-xs-center nombreTitulo">
                            <?php
                            echo $entrada->obtenerTitulo();
                            ?>
                        </h5>
                        <?php
                            echo nl2br(self::resumirTexto($entrada->obtenerTexto()));
                        ?>
                        <hr>
                        <div class="container-fluid p-auto">
                            <a href="#">Seguir leyendo</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
    }

    public static function resumirTexto($texto) {
        $longitudMaxima = 400;

        $resultado = '';

        if (strlen($texto) >= $longitudMaxima) {

            $resultado = substr($texto, 0, $longitudMaxima);

            $resultado .= '...';
        } else {
            $resultado = $texto;
        }

        return $resultado;
    }

}
