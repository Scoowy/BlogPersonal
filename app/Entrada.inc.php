<?php

class Entrada {

    private $id;
    private $autorId;
    private $url;
    private $titulo;
    private $texto;
    private $fecha;
    private $activa;
    private $nombre;

    public function __construct($id, $autorId, $url, $titulo, $texto, $fecha, $activa, $nombre) {
        $this->id = $id;
        $this->autorId = $autorId;
        $this->url = $url;
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->fecha = $fecha;
        $this->activa = $activa;
        $this->nombre = $nombre;
    }
    
//    public function __construct($id, $autorId, $titulo, $texto, $fecha, $activa, $nombre) {
//        $this->id = $id;
//        $this->autorId = $autorId;
//        $this->titulo = $titulo;
//        $this->texto = $texto;
//        $this->fecha = $fecha;
//        $this->activa = $activa;
//        $this->nombre = $nombre;
//    }

    public function obtenerId() {
        return $this->id;
    }

    public function obtenerAutorId() {
        return $this->autorId;
    }
    
    public function obtenerUrl() {
        return $this->url;
    }

    public function obtenerTitulo() {
        return $this->titulo;
    }

    public function obtenerTexto() {
        return $this->texto;
    }

    public function obtenerFecha() {
        return $this->fecha;
    }

    public function obtenerActiva() {
        return $this->activa;
    }

    public function obtenerNombre() {
        return $this->nombre;
    }
    
    public function cambiarUrl($url) {
        $this->activa = $url;
    }

    public function cambiarTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function cambiarTexto($texto) {
        $this->texto = $texto;
    }

    public function cambiarActiva($activa) {
        $this->activa = $activa;
    }

}
