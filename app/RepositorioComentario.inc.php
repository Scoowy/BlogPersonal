<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Comentario.inc.php';

class RepositorioComentario {

    public static function insertarComentario($conexion, $comentario) {
        $comentarioInsertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO comentarios(autor_id, entrada_id, titulo, texto, fecha) VALUES(:autorId, :entradaId, :titulo, :texto, NOW())";

                $autorIdTemp = $comentario->obtenerAutorId();
                $entradaIdTemp = $comentario->obtenerEntradaId();
                $tituloTemp = $comentario->obtenerTitulo();
                $textoTemp = $comentario->obtenerTexto();

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':autorId', $autorIdTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':entradaId', $entradaIdTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':titulo', $tituloTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':texto', $textoTemp, PDO::PARAM_STR);

                $comentarioInsertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $comentarioInsertado;
    }

}
