<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Entrada.inc.php';

class RepositorioEntrada {

    public static function insertarEntrada($conexion, $entrada) {
        $entradaInsertada = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO entradas(autor_id, url, titulo, texto, fecha, activa) VALUES(:autorId, :url, :titulo, :texto, NOW(), 0)";

                $autorIdTemp = $entrada->obtenerAutorId();
                $urlTemp = $entrada->obtenerUrl();
                $tituloTemp = $entrada->obtenerTitulo();
                $textoTemp = $entrada->obtenerTexto();

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':autorId', $autorIdTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':url', $urlTemp, PDO::PARAM_STR);
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
//                $sql = 'SELECT * FROM entradas ORDER BY fecha DESC LIMIT ' . random_int(10, 25);

                $sql = 'SELECT entradas.*, usuarios.nombre FROM entradas, usuarios WHERE entradas.autor_id = usuarios.id ORDER BY entradas.fecha DESC LIMIT '. random_int(10, 25);

                $sentencia = $conexion->prepare($sql);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {

                        $entradas[] = new Entrada($fila['id'], $fila['autor_id'], $fila['url'], $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['activa'], $fila['nombre']);

//                        $entradas[] = new Entrada($fila['id'], $fila['autor_id'], $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['activa'], $fila['nombre']);
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }

        return $entradas;
    }

    public static function obtenerEntradaPorUrl($conexion, $url) {
        $entrada = NULL;

        if (isset($conexion)) {
            try {
//                $sql = "SELECT * FROM entradas WHERE url LIKE :url";
//                $sql = "SELECT entradas.*, usuarios.nombre FROM entradas, usuarios WHERE url LIKE :url";
                $sql = "SELECT entradas.*, usuarios.nombre FROM entradas INNER JOIN usuarios ON entradas.autor_id = usuarios.id WHERE url LIKE :url";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':url', $url, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                
                if (!empty($resultado)) {
                    $entrada = new Entrada($resultado['id'], $resultado['autor_id'], $resultado['url'], $resultado['titulo'], $resultado['texto'], $resultado['fecha'], $resultado['activa'], $resultado['nombre']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        
        return $entrada;
    }

}
