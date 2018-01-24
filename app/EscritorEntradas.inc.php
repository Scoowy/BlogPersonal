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
