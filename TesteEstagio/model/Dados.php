<?php

// header('location:../index.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dados
 *
 * @author Alisson
 */
class Dados {
    
    private $id;
    private $estacao_id;
    private $temperatura;
    private $velocidade_vento;
    private $umidade;
    private $data;
    
    function getId() {
        return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }
    
    function getEstacao_id() {
        return $this->estacao_id;
    }
    function setEstacao_id($estacao_id) {
        $this->estacao_id = $estacao_id;
    }
    
    function getTemperatura() {
        return $this->temperatura;
    }
    function setTemperatura($temperatura) {
        $this->temperatura = $temperatura;
    }
    
    function getVelocidade_vento() {
        return $this->velocidade_vento;
    }
    function setVelocidade_vento($velocidade_vento) {
        $this->velocidade_vento = $velocidade_vento;
    }
    
    function getUmidade() {
        return $this->umidade;
    }
    function setUmidade($umidade) {
        $this->umidade = $umidade;
    }
    
    function getData() {
        return $this->data;
    }
    function setData($data) {
        $this->data = $data;
    }
}
