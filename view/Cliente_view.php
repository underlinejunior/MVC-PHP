<?php
include("../control/Cliente_Control.php");

session_start();
if(isset($_SESSION['user'])){
   if(time() > $_SESSION['time']){
    
    echo "<h2>sua sessão expirou!<h2>"; 
    die();
   } 
?>

<html>
<head><title>Sistema de Carteiras</title>

<link rel = "stylesheet" type="text/css" href="../lib/bootstrap.css"></head>
<h2 align='center'> Sistema de Carteiras</h2>
<form method="GET" style = "text-align:right; width:80%; margin:auto;">
<button name='sair' value="sair" class="btn btn-danger">SAIR</button></form>

<hr/>

<div style = "text-align:right;">
<form method="GET" id="busca" action="Cliente_view.php" style='width:80%; margin:auto;'>
Ordenar:
 <a href="Cliente_view.php?o=nome">Nome</a> |
 <a href="Cliente_view.php?o=cpf"> CPF</a> |
 <a href="Cliente_view.php?o=fone"> Fone</a> |
    Buscar: <input type = "text" name="busca" size="10" maxlenght="40"/>
<input type = "submit" value="Ok"/>

</form></div>

<?php
$ordem = @$_GET['o'];
$chave = @$_GET['busca'];
$dados = new Cliente_Control();

if(@$_GET['cadastrar']=='cadastrar'){
    $nome =@$_GET['nome'];
    $cpf=@$_GET['num'];
    $fone=@$_GET['fone'];
    
    $dados->Add($nome,$cpf,$fone);
}

if(@$_GET['btn']=='deletar'){
    $id=@$_GET['id'];
    $dados->Remove($id);
}
if(@$_GET['btn']=='editar'){
    $id=@$_GET['id'];
    $ed=$dados->Dados($id);
    foreach($ed as $valor){
        $nome1 = $valor['nome'];
        $cpf1 = $valor['cpf'];
        $fone1 = $valor['fone'];
    }
}
if(@$_GET['btn']=='atualizar'){
    $id=@$_GET['id'];
    $nome =@$_GET['nome'];
    $cpf=@$_GET['num'];
    $fone=@$_GET['fone'];
    $dados->Update($id,$nome,$cpf,$fone);
}
if(($chave != null)){
    $d=$dados->Busca("%".$chave."%" );
} else{
switch ($ordem){
    case "cpf":
        $d=$dados->Orderby("cpf");
        break;
    case "fone":
        $d=$dados->Orderby("fone");
        break;
    default:
        $d=$dados->Orderby("nome");
        break;
}}
echo "<table class='table table-striped' style='width:80%; margin:auto;' >";

echo "<form name='tabela' method='POST'><tr>";
echo "<td><b>NOME</b></td><td><b>CPF</b></td><td><b>FONE</b></fone><td></td><td></td>";
$cont=1;
foreach($d as $value){
    if($cont=4){
        echo"</tr>";
        $cont=1;
    }
    echo  
        
        "<td> <a href=?cliente=".$value['id'].">".$value['nome'].
        "</td><td>".$value['cpf'].
        "</td><td>".$value['fone'].'</td>'.
        "<td> <a href=?btn=editar&id=".$value['id'].">editar</td>".
        "<td> <a href=?btn=deletar&id=".$value['id'].">deletar</td>";
        $cont++;
}
echo "</table></form>";

}else{
    echo "você não tem acesso ao sistema";
}
$carteira=@$_POST['carteira'];
$_SESSION['carteira']= $carteira;
$cliente=@$_GET['cliente'];
$_SESSION['cliente']= $cliente;

if(@$_POST['confirmar']=='confirmar'){
    if( $carteira==null){ echo "<font color=red><center><b> selecione o TIPO DE CARTEIRA</b></center></font>";}
    if( $cliente==null){ echo "<font color=red><center><b> selecione o CLIENTE</b></center></font>";}
    else{
    header('Location:../view/End_view.php');
    }}
if(@$_GET['sair']=='sair'){
    session_destroy();
    header('Location:../view/index.php');
}
?>
<div align='center'><h4>Tipo de carteira</h4>
    <form align='center' name='confirm' method='POST'>
        <input type='radio' name='carteira' value='1' />Carteira de Estudante |
        <input type='radio' name='carteira' value='2' />Carteira de Identidade |
        <input type='radio' name='carteira' value='3' />Carteira Profissional <br/>
        <button name='confirmar' value='confirmar' class='btn btn-success'>CONFIRMAR</button>
        </form>
        </div>
<hr>
<form name='form1' method='GET' style = " width:80%; margin:auto;">
<input type='hidden' name='id' value=<?php echo @$id;?>/>
<table><tr>
<td>Nome:</td><td><input type="text" name="nome" value=<?php echo @$nome1;?>></td></tr>
<td>CPF:</td><td><input type="number" name="num" value=<?php echo @$cpf1;?>></td></tr>
<td>fone:</td><td><input type="number" name="fone" value=<?php echo @$fone1;?>></td></tr>
<td></td><td>
<button class='btn btn-primary' name='cadastrar' value='cadastrar'>cadastrar</button>
<button class ="btn btn-warning" name='btn' value='atualizar'>atualizar</button>
</td></table>

