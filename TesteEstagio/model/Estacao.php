<?php

// header('location:../index.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estacao
 *
 * @author Alisson
 */
class Estacao {
        
    private $id;
    private $nome;
    private $serial;
    private $lat;
    private $lon;
    
    function getId() {
        return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }
    
    function getNome() {
        return $this->nome;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }
    
    function getSerial() {
        return $this->serial;
    }
    function setSerial($serial) {
        $this->serial = $serial;
    }
    
    function getLat() {
        return $this->lat;
    }
    function setLat($lat) {
        $this->lat = $lat;
    }
    
    function getLon() {
        return $this->lon;
    }
    function setLon($lon) {
        $this->lon = $lon;
    }
}
