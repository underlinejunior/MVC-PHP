<?php

Class Carteira_Model{
    public $cliente;
    public $carteira;
    public $endereco;
    
    function _construct(){
        $this->cliente = 99;
        $this->carteira = 99;
        $this->endereco = 99;
    }

    function setCliente($cliente){
        $this->cliente=$cliente;
    }
    function getCliente(){
        return $this->cliente;
    }

    function setCarteira($carteira){
        $this->carteira=$carteira;
    }
    function getCarteira(){
        return $this->carteira;
    }
    
    function setEndereco($endereco){
        $this->endereco=$endereco;
    }
    function getEndereco(){
        return $this->endereco;
    }
}

?>