<?php

// header('location:../index.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexao_bd
 *
 * @author Alisson
 */
class conexao_bd {
    
    private $servidor;
    private $usuario;
    private $senha;
    private $db;
    private $con;
    
    public function __construct(){
        $this->servidor = 'localhost';
        $this->usuario = 'root';
        $this->senha = '';
        $this->db = 'atividade';
    }
    
    public function conectar(){
        global $con;
        $con = mysqli_connect(
                $this->servidor, 
                $this->usuario, 
                $this->senha) or die(mysqli_error());
        mysqli_set_charset($con, "utf8");
        mysqli_select_db($con, $this->db) or die(mysqli_error("Configuracao errada do Banco de Dados!"));
    }
    
    public function fechar(){
        global $con;
        mysqli_close($con);
    }
    
    public function query($sql){
        global $con;
        $query = mysqli_query($con, $sql) or die(mysqli_error("Erro de execucao da query!"));
        return $query;
    }
}

