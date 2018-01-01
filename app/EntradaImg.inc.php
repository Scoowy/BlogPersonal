<?php

class EntradaImg {

    private $id;
    private $autorId;
    private $titulo;
    private $texto;
    private $imagen = 'img/imgPrueba.jpg';
    private $fecha;
    private $ubicacion = 'Algun lugar del mundo.';
    private $activa;

    public function __construct($id, $autorId, $titulo, $texto, $imagen, $fecha, $ubicacion, $activa) {
        $this->id = $id;
        $this->autorId = $autorId;
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->imagen = $imagen;
        $this->fecha = $fecha;
        $this->ubicacion = $ubicacion;
        $this->activa = $activa;
    }

    public function obtenerId() {
        return $this->id;
    }

    public function obtenerAutorId() {
        return $this->autorId;
    }

    public function obtenerTitulo() {
        return $this->titulo;
    }

    public function obtenerTexto() {
        return $this->texto;
    }

    public function obtenerImagen() {
        return $this->imagen;
    }

    public function obtenerFecha() {
        return $this->fecha;
    }

    public function obtenerUbicacion() {
        return $this->ubicacion;
    }

    public function obtenerActiva() {
        return $this->activa;
    }

    public function cambiarTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function cambiarTexto($texto) {
        $this->texto = $texto;
    }

    public function cambiarUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }

    public function cambiarActiva($activa) {
        $this->activa = $activa;
    }

}
