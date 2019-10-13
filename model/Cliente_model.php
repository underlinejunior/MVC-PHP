<?php

Class Cliente_Model{
    public $nome;
    public $cpf;
    public $fone;
    
    function _construct(){
        $this->nome = null;
        $this->cpf = '999';
        $this->telefone = '888';
    }

    function setNome($nome){
        $this->nome=$nome;
    }
    function getNome(){
        return $this->nome;
    }

    function setCpf($cpf){
        $this->cpf=$cpf;
    }
    function getCpf(){
        return $this->cpf;
    }
    
    function setFone($fone){
        $this->fone=$fone;
    }
    function getFone(){
        return $this->fone;
    }
}

?>