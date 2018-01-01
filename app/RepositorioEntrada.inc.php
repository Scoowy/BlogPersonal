<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Entrada.inc.php';

class RepositorioEntrada {

    public static function insertarEntrada($conexion, $entrada) {
        $entradaInsertada = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO entradas(autor_id, titulo, texto, fecha, activa) VALUES(:autorId, :titulo, :texto, NOW(), 0)";

                $autorIdTemp = $entrada->obtenerAutorId();
                $tituloTemp = $entrada->obtenerTitulo();
                $textoTemp = $entrada->obtenerTexto();

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':autorId', $autorIdTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':titulo', $tituloTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':texto', $textoTemp, PDO::PARAM_STR);

                $entradaInsertada = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $entradaInsertada;
    }

    public static function obtenerTodasFechaDesc($conexion) {
        $entradas = [];

        if (isset($conexion)) {
            try {
                $sql = 'SELECT * FROM entradas ORDER BY fecha DESC LIMIT 10';

                $sentencia = $conexion -> prepare($sql);

                $sentencia->execute();

                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        
                        $entradas[] = new Entrada($fila['id'], $fila['autor_id'], $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['activa']);
                        
                    }
                   
                }
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage();
            } 
        }
        
        return $entradas;
    }

}
