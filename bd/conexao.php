<?php
Class Conect{
    public $conexao;
    function __construct(){
        try{
        $this->conexao = new PDO("mysql:local=localhost;dbname=emissao","root","");
        }catch(PDOException $e){
            echo $e;
        }
    }
    function Conectar(){
        return $this->conexao;

    }
}
//$conexao = new Conect();
//$conexao->Conectar();
?>