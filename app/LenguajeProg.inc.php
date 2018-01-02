<?php

class LenguajeProg {

    private $id;
    private $nombre;
    private $imagen;
    private $color1;
    private $color2;
    private $activo;

    function __construct($id, $nombre, $imagen, $color1, $color2, $activo) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $this->color1 = $color1;
        $this->color2 = $color2;
        $this->activo = $activo;
    }

    public function obtenerId() {
        return $this->id;
    }

    public function obtenerNombre() {
        return $this->nombre;
    }

    public function obtenerImagen() {
        return $this->imagen;
    }

    public function obtenerColor1() {
        return $this->color1;
    }

    public function obtenerColor2() {
        return $this->color2;
    }

    public function obtenerActivo() {
        return $this->activo;
    }
    
    public function cambiarNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function cambiarImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function cambiarColor1($color1) {
        $this->color1 = $color1;
    }

    public function cambiarColor2($color2) {
        $this->color2 = $color2;
    }
    
    public function cambiarActivo($activo) {
        $this->activo = $activo;
    }

}
