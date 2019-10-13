<?php

include ("../model/Carteira_Model.php");
include ("../bd/conexao.php");

Class Carteira_Control{
    public $dados;
    public $con;

    function __construct(){
        $this->dados = new Carteira_Model();
        $this->con = new Conect();
    }
    function Add($carteira,$cliente,$endereco){
        $c = $this->con->Conectar();
        $sql = "INSERT INTO emitir VALUES (NULL,:carteira, :cliente, :endereco); ";
        $d=$c->prepare($sql);
        $d->bindValue(":carteira",$carteira);
        $d->bindValue(":cliente",$cliente);
        $d->bindValue(":endereco",$endereco);
        $d->execute();
        return $d;
    }
    function Dados($carteira,$cliente,$endereco){
        $c = $this->con->Conectar();
        $sql = "SELECT carteira.descricao, cliente.nome, cliente.cpf, cliente.fone, endereco.rua, endereco.cep, endereco.estado, endereco.cidade
        FROM carteira, cliente, endereco, emitir
        WHERE emitir.carteira=carteira.id and emitir.cliente=cliente.id and emitir.endereco=endereco.id
        and emitir.carteira=:carteira and emitir.cliente=:cliente and emitir.endereco = :endereco ; ";
        $d=$c->prepare($sql);
        $d->bindValue(":carteira",$carteira);
        $d->bindValue(":cliente",$cliente);
        $d->bindValue(":endereco",$endereco);
        $d->execute();
        return $d;

    }
}

?>