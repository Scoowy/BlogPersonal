<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/EntradaProg.inc.php';

class RepositorioEntradaProg {
    
    public static function insertarEntradaProg($conexion, $entradaProg) {
        $entradaProgInsertada = false;
        
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO entradas(autor_id, lenguaje_id, titulo, texto, imagen, fecha, activa) VALUES(:autorId, :lenguajeId, :titulo, :texto, :imagen, NOW(), 0)";

                $autorIdTemp = $entradaProg -> obtenerAutorId();
                $lenguajeIdTemp = $entradaProg -> obtenerLenguajeId();
                $tituloTemp = $entradaProg -> obtenerTitulo();
                $textoTemp = $entradaProg -> obtenerTexto();
                $imagenTemp = $entradaProg -> obtenerIamagen();

                $sentencia = $conexion -> prepare($sql);

                $sentencia -> bindParam(':autorId', $autorIdTemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':lenguajeId', $lenguajeIdTemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':titulo', $tituloTemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':texto', $textoTemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':imagen', $imagenTemp, PDO::PARAM_STR);
                
                $entradaProgInsertada = $sentencia -> execute();
                
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        
        return $entradaProgInsertada;
    }
}