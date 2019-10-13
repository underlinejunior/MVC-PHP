<?php

include ("../model/Cliente_Model.php");
include ("../bd/conexao.php");

Class Cliente_Control{
    public $dados;
    public $con;

    function __construct(){
        $this->dados = new Cliente_Model();
        $this->con = new Conect();
    }

    function View(){
        $c=$this->con->Conectar();
        $sql = "SELECT * FROM cliente";
        $d = $c->prepare($sql);
        $d->execute();
        return $d;
        }
    

    function Add($nome,$cpf,$fone){
        $c = $this->con->Conectar();
        $sql = "INSERT INTO cliente  VALUES (null, :nome, :cpf, :fone);";
        $d=$c->prepare($sql);
        $d->bindValue(":nome",$nome);
        $d->bindValue(":cpf",$cpf);
        $d->bindValue(":fone",$fone); 
        $d->execute();
        Header("Location:../view/Cliente_view.php");
    }

    function Remove($id){
        $c = $this->con->Conectar();
        $sql = "DELETE FROM cliente where id=:id";
        $d=$c->prepare($sql);
        $d->bindValue(":id",$id);
        $d->execute();
        Header("Location:../view/Cliente_view.php");
    }

    function Update($id,$nome,$cpf,$fone){
        $c = $this->con->Conectar();
        $sql = "UPDATE cliente SET nome =:nome, cpf =:cpf, fone=:fone WHERE id=:id";
        $d=$c->prepare($sql);
        $d->bindValue(":id",$id);
        $d->bindValue(":nome",$nome);
        $d->bindValue(":cpf",$cpf);
        $d->bindValue(":fone",$fone);
        $d->execute();
        Header("Location:../view/Cliente_view.php");
    }
    function Dados($id){
        $c = $this->con->Conectar();
        $sql = "SELECT nome,cpf,fone FROM cliente WHERE id=:id";
        $d=$c->prepare($sql);
        $d->bindValue(":id",$id);
        $d->execute();
        return $d;
    }
    function Orderby($ordem){
        $c = $this->con->Conectar();
        $sql = "SELECT * FROM cliente ORDER BY $ordem ";
        $d=$c->prepare($sql);
        $d->execute();
        return $d;

    }
    function Busca($chave){
        $c = $this->con->Conectar();
        $sql = "SELECT * FROM cliente WHERE nome LIKE '$chave' OR cpf LIKE '$chave' OR fone LIKE '$chave' ";
        $d=$c->prepare($sql);
        $d->execute();
        return $d;
    }

    function Login($user,$senha){
        $c = $this->con->Conectar();
        $sql = "SELECT nome,cpf FROM cliente WHERE nome=:user and cpf=:senha ";
        $d=$c->prepare($sql);
        $d->bindValue(":user",$user);
        $d->bindValue(":senha",$senha);
        $d->execute();
        return $d;
    }
}
?>