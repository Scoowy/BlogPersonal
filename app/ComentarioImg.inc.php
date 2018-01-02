<?php

class ComentarioImg {

    private $id;
    private $autorId;
    private $entradaImgId;
    private $titulo;
    private $texto;
    private $fecha;

    function __construct($id, $autorId, $entradaImgId, $titulo, $texto, $fecha) {
        $this->id = $id;
        $this->autorId = $autorId;
        $this->entradaImgId = $entradaImgId;
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->fecha = $fecha;
    }

    public function obtenerId() {
        return $this->id;
    }

    public function obtenerAutorId() {
        return $this->autorId;
    }

    public function obtenerEntradaImgId() {
        return $this->entradaImgId;
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

    public function cambiarTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function cambiarTexto($texto) {
        $this->texto = $texto;
    }

}
