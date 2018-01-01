<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/EntradaImg.inc.php';

class RepositorioEntradaImg {

    public static function insertarEntradaImg($conexion, $entradaImg) {
        $entradaImgInsertada = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO entradasImg(autor_id, titulo, texto, imagen, fecha, ubicacion, activa) VALUES(:autorId, :titulo, :texto, :imagen , NOW(), :ubicacion, 0)";

                $autorIdTemp = $entradaImg->obtenerAutorId();
                $tituloTemp = $entradaImg->obtenerTitulo();
                $textoTemp = $entradaImg->obtenerTexto();
                $imagenTemp = $entradaImg->obtenerImagen();
                $ubicacionTemp = $entradaImg->obtenerUbicacion();

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':autorId', $autorIdTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':titulo', $tituloTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':texto', $textoTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':imagen', $imagenTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':ubicacion', $ubicacionTemp, PDO::PARAM_STR);

                $entradaImgInsertada = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $entradaImgInsertada;
    }

}
