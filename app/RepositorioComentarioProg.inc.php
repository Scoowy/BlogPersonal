<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/ComentarioProg.inc.php';

class RepositorioComentarioProg {

    public static function insertarComentarioProg($conexion, $comentarioProg) {
        $comentarioProgInsertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO comentariosProgs(autor_id, entrada_progs_id, titulo, texto, fecha) VALUES(:autorId, :entradaProgsId, :titulo, :texto, NOW())";

                $autorIdTemp = $comentarioProg->obtenerAutorId();
                $entradaProgsIdTemp = $comentarioProg->obtenerEntradaProgId();
                $tituloTemp = $comentarioProg->obtenerTitulo();
                $textoTemp = $comentarioProg->obtenerTexto();

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':autorId', $autorIdTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':entradaProgsId', $entradaProgsIdTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':titulo', $tituloTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':texto', $textoTemp, PDO::PARAM_STR);

                $comentarioProgInsertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $comentarioProgInsertado;
    }

}
