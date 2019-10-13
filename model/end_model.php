<?php

Class End_Model{
    public $rua;
    public $cep;
    public $estado;
    public $cidade;
    
    function _construct(){
        $this->rua = null;
        $this->cep = '99.999-999';
        $this->estado = 'AA';
        $this->cidade = 'Aaaa';
    }

    function setrua($rua){
        $this->rua=$rua;
    }
    function getrua($rua){
        return $this->rua;
    }

    function setcep($cep){
        $this->cep=$cep;
    }
    function getcep($cep){
        return $this->cep;
    }
    
    function setestado($estado){
        $this->estado=$estado;
    }
    function getestado($estado){
        return $this->estado;
    }
    function setCidade($cidade){
        $this->cidade=$cidade;
    }
    function getCidade($cidade){
        return $this->cidade;
}
}
?>