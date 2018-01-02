<?php

class Ubicacion {

    private $id;
    private $nombre;
    private $direccion;
    private $lat;
    private $lng;
    private $tipo;

    public function __construct($id, $nombre, $direccion, $lat, $lng, $tipo) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->tipo = $tipo;
    }

    public function obtenerId() {
        return $this->id;
    }

    public function obtenerNombre() {
        return $this->nombre;
    }

    public function obtenerDireccion() {
        return $this->direccion;
    }

    public function obtenerLat() {
        return $this->lat;
    }

    public function obtenerLng() {
        return $this->lng;
    }

    public function obtenerTipo() {
        return $this->tipo;
    }

    public function cambiarNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function cambiarDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function cambiarLat($lat) {
        $this->lat = $lat;
    }
    
    public function cambiarLng($lng) {
        $this->lng = $lng;
    }
    
    public function cambiarTipo($tipo) {
        $this->tipo = $tipo;
    }

}
