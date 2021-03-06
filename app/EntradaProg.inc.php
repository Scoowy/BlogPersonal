<?php

class EntradaProg {

    private $id;
    private $autorId;
    private $lenguajeId;
    private $titulo;
    private $texto;
    private $imagen;
    private $fecha;
    private $activa;

    public function __construct($id, $autorId, $lenguajeId, $titulo, $texto, $imagen, $fecha, $activa) {
        $this->id = $id;
        $this->autorId = $autorId;
        $this->lenguajeId = $lenguajeId;
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->imagen = $imagen;
        $this->fecha = $fecha;
        $this->activa = $activa;
    }

    public function obtenerId() {
        return $this->id;
    }

    public function obtenerAutorId() {
        return $this->autorId;
    }

    public function obtenerLenguajeId() {
        return $this->lenguajeId;
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

    public function obtenerActiva() {
        return $this->activa;
    }

    public function cambiarTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function cambiarTexto($texto) {
        $this->texto = $texto;
    }

    public function cambiarImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function cambiarActiva($activa) {
        $this->activa = $activa;
    }

}
