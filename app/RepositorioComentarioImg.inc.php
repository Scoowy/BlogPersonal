<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/ComentarioImg.inc.php';

class RepositorioComentarioImg {

    public static function insertarComentarioImg($conexion, $comentarioImg) {
        $comentarioImgInsertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO comentariosImg(autor_id, entrada_img_id, titulo, texto, fecha) VALUES(:autorId, :entradaImgId, :titulo, :texto, NOW())";

                $autorIdTemp = $comentarioImg->obtenerAutorId();
                $entradaImgIdTemp = $comentarioImg->obtenerEntradaImgId();
                $tituloTemp = $comentarioImg->obtenerTitulo();
                $textoTemp = $comentarioImg->obtenerTexto();

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':autorId', $autorIdTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':entradaImgId', $entradaImgIdTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':titulo', $tituloTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':texto', $textoTemp, PDO::PARAM_STR);

                $comentarioImgInsertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $comentarioImgInsertado;
    }

}
