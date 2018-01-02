<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/LenguajeProg.inc.php';

class RepositorioLenguajeProg {

    public static function insertarLenguajeProg($conexion, $lenguajeProg) {
        $lenguajeProgInsertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO lenguajeProg(nombre, imagen, color1, color2, activo) VALUES(:nombre, :imagen, :color1, :color2, 1)";

                $nombreTemp = $lenguajeProg->obtenerNombre();
                $imagenTemp = $lenguajeProg->obtenerImagen();
                $color1Temp = $lenguajeProg->obtenerColor1();
                $color2Temp = $lenguajeProg->obtenerColor2();

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre', $nombreTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':imagen', $imagenTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':color1', $color1Temp, PDO::PARAM_STR);
                $sentencia->bindParam(':color2', $color2Temp, PDO::PARAM_STR);

                $lenguajeProgInsertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $lenguajeProgInsertado;
    }

}
