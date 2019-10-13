
<?php

session_start();
$carteira = $_SESSION['carteira'];
$cliente=$_SESSION['cliente'];
if(isset($_SESSION['user'])){
   if(time() > $_SESSION['time']){
    
    echo "sua sessão expirou!"; 
    die();
   } 


include("../control/End_Control.php");
$ordem = @$_GET['o'];
$chave = @$_GET['busca'];
$carteira = @$_GET['carteira'];
$dados = new End_Control();
   

?>

<html>
<head><title>Sistema de Carteiras</title>

<link rel = "stylesheet" type="text/css" href="../lib/bootstrap.css"></head>

<h2 align='center'> Sistema de Carteiras</h2>
<form method="GET" style = "text-align:right; width:80%; margin:auto;">
<button name='sair' value="sair" class="btn btn-danger">SAIR</button></form>
<hr/>

<div style = "text-align:right;">
<form method="get" id="busca" action="End_view.php" style='width:80%; margin:auto;'>
Ordenar:
 <a href="End_view.php?o=rua">rua</a> |
 <a href="End_view.php?o=cep"> cep</a> |
 <a href="End_view.php?o=cidade"> cidade</a> |
 <a href="End_view.php?o=estado"> estado</a> |
    Buscar: <input type = "text" name="busca" size="10" maxlenght="40"/>
<input type = "submit" value="Ok"/><br/>
</form></div>

</form>
<?php

if(@$_GET['cadastrar']=='cadastrar'){
    $id=@$_GET['id'];
    $rua =@$_GET['rua'];
    $cep=@$_GET['cep'];
    $cidade=@$_GET['cidade'];
    $estado=@$_GET['estado'];
    
    $dados->Add($id,$rua,$cep,$cidade,$estado);
}

if(@$_GET['btn']=='deletar'){
    $id=@$_GET['id'];
    $dados->Remove($id);
}
if(@$_GET['btn']=='editar'){
    $id=@$_GET['id'];
    $ed=$dados->Dados($id);
    foreach($ed as $valor){
        $rua1 = $valor['rua'];
        $cep1 = $valor['cep'];
        $cidade1 = $valor['cidade'];
        $estado1 = $valor['estado'];
    }
}
if(@$_GET['btn']=='atualizar'){
    $id=@$_GET['id'];
    $rua =@$_GET['rua'];
    $cep=@$_GET['cep'];
    $cidade=@$_GET['cidade'];
    $estado=@$_GET['estado'];
    $dados->Update($id,$rua,$cep,$cidade,$estado);
}
if(($chave != null)){
    $d=$dados->Busca("%".$chave."%");
} else{
switch ($ordem){
    case "cep":
        $d=$dados->Orderby("cep");
        break;
    case "cidade":
        $d=$dados->Orderby("cidade");
        break;
    case "estado":
        $d=$dados->Orderby("estado");
        break;
    default:
        $d=$dados->Orderby("rua");
        break;
}}


echo "<table class='table table-striped' style='width:80%; margin:auto;'>";
echo "<tr>";
$cont=1;
foreach($d as $value){
    if($cont=4){
        echo"</tr>";
        $cont=1;}
    
    #$id= base64_encode($value['id']); criptografando com base64

echo
        "<td><b>rua: </b> <a href=Carteira_view.php?&endereco=".$_SESSION['endereco']=$value['id'].">".$value['rua']."</a>".
        "<b> | cep: </b> ".$value['cep'].
        "<b> | cidade: </b> ".$value['cidade'].
        "<b> | estado: </b> ".$value['estado'].'</td>'.
        "<td> <a href=?btn=editar&id=".$value['id'].">editar</td>".
        "<td> <a href=?btn=deletar&id=".$value['id'].">deletar</td>";
        $cont++;
    }

}else{
    echo "você não tem acesso ao sistema";
}
if(@$_GET['sair']=='sair'){
    session_destroy();
    header('Location:../view/index.php');
}

?>
<form name='form1' method='GET'>
<input type='hidden' name='id' value=<?php echo @$id;?>>
<table style ="width:80%; margin:auto;" ><tr>
<td width='80px'>rua:</td><td><input type="text" name="rua" value=<?php echo @$rua1;?>></td></tr>
<td width='80px'>cep:</td><td><input type="number" name="cep" value=<?php echo @$cep1;?>></td></tr>
<td width='80px'>cidade:</td><td><input type="text" name="cidade" value=<?php echo @$cidade1;?>></td></tr>
<td width='80px'>estado:</td><td><input type="text" name="estado" value=<?php echo @$estado1;?>></td></tr>
<td></td><td>
<button class='btn btn-primary' name='cadastrar' value='cadastrar'>cadastrar</button>
<button class ="btn btn-warning" name='btn' value='atualizar'>atualizar</button>
</td></table>
</form>

