<html>
<head><title>Sistema de Carteiras</title>

<?php
session_start();
$cliente = $_SESSION['cliente'];
$_SESSION['endereco']=@$_GET['endereco'];
$endereco = $_SESSION['endereco'];
$carteira = $_SESSION['carteira'];

include("../control/Carteira_Control.php");

$dados = new Carteira_Control();

$dados->Add($carteira,$cliente,$endereco);

$d= $dados->Dados($carteira,$cliente,$endereco);

foreach($d as $value){
    $descricao = $value['descricao'];
    $nome = $value['nome'];
    $cpf = $value['cpf'];
    $fone = $value['fone'];
    $rua = $value['rua'];
    $cep = $value['cep'];
    $cidade = $value['cidade'];
    $estado = $value['estado'];
}
?>
<div aling='center' style='height:200px; width:400px; margin:auto; font-family:verdana'>
<fieldset>
<h3><?php echo $descricao; ?></h3>
<fieldset><legend>nome:</legend><b><?php echo $nome; ?></b></legend></fieldset>

<fieldset style="width: 40%; float: left;"><legend>cpf:</legend><?php echo $cpf; ?></legend></fieldset>
<fieldset style="width: 40%; float: right;"><legend>fone:</legend><?php echo $fone; ?></legend></fieldset>
<fieldset style="width: 60%; float: left;"><legend>endereço:</legend><?php echo $rua." , ".$cidade." - ".$estado;?></legend></fieldset>
<fieldset style="width: 20%; float: right;"><legend>CEP:</legend><?php echo $cep;?></legend></fieldset>
<div  style="float:right; font-size:10px">emissão:<?php echo date("d/m/Y"); ?></div>
</fieldset>
</div>

