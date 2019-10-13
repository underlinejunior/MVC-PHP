<?php

include ("../model/end_model.php");
include ("../bd/conexao.php");

Class End_Control{
    public $dados;
    public $con;

    function __construct(){
        $this->dados = new End_Model();
        $this->con = new Conect();
    }

    function View(){
        $c=$this->con->Conectar();
        $sql = "SELECT * FROM endereco";
        $d = $c->prepare($sql);
        $d->execute();
        return $d;
        }


    function Add($rua,$cep,$cidade,$estado){
        $c = $this->con->Conectar();
        $sql = "INSERT INTO endereco  VALUES (null, :rua, :cep, :estado, :cidade);";
        $d=$c->prepare($sql);
        $d->bindValue(":rua",$rua);
        $d->bindValue(":cep",$cep);
        $d->bindValue(":estado",$estado); 
        $d->bindValue(":cidade",$cidade); 
        $d->execute();
        Header("Location:../view/End_view.php");
    }

    function Remove($id){
        $c = $this->con->Conectar();
        $sql = "DELETE FROM endereco where id=:id";
        $d=$c->prepare($sql);
        $d->bindValue(":id",$id);
        $d->execute();
        Header("Location:../view/End_view.php");
    }

    function Update($id,$rua,$cep,$cidade,$estado){
        $c = $this->con->Conectar();
        $sql = "UPDATE endereco SET rua =:rua, cep =:cep, cidade=:cidade, estado=:estado WHERE id=:id";
        $d=$c->prepare($sql);
        $d->bindValue(":id",$id);    
        $d->bindValue(":rua",$rua);
        $d->bindValue(":cep",$cep);
        $d->bindValue(":cidade",$cidade);
        $d->bindValue(":estado",$estado);
        $d->execute();
        Header("Location:../view/End_view.php");
    }
    function Dados($id){
        $c = $this->con->Conectar();
        $sql = "SELECT rua,cep,cidade,estado FROM endereco WHERE id=:id";
        $d=$c->prepare($sql);
        $d->bindValue(":id",$id);
        $d->execute();
        return $d;
    }
    function Orderby($ordem){
        $c = $this->con->Conectar();
        $sql = "SELECT * FROM endereco ORDER BY $ordem ";
        $d=$c->prepare($sql);
        $d->execute();
        return $d;

    }
    function Busca($chave){
        $c = $this->con->Conectar();
        $sql = "SELECT * FROM endereco WHERE rua LIKE '$chave' OR cep LIKE '$chave' OR cidade LIKE '$chave' OR estado LIKE '$chave' ";
        $d=$c->prepare($sql);
        $d->execute();
        return $d;
    }

}
?>