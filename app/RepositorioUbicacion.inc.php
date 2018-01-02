<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Ubicacion.inc.php';

class RepositorioUbicacion {

    public static function insertarUbicacion($conexion, $ubicacion) {
        $ubicacionInsertada = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO ubicacion(nombre, direccion, lat, lng, tipo) VALUES(:nombre, :direccion, :lat, :lng, :tipo)";

                $nombreTemp = $ubicacion->obtenerNombre();
                $direccionTemp = $ubicacion->obtenerDireccion();
                $latTemp = $ubicacion->obtenerLat();
                $lngTemp = $ubicacion->obtenerLng();
                $tipoTemp = $ubicacion->obtenerTipo();

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre', $nombreTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':direccion', $direccionTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':lat', $latTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':lng', $lngTemp, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo', $tipoTemp, PDO::PARAM_STR);

                $ubicacionInsertada = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $ubicacionInsertada;
    }

}
