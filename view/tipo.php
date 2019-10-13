<?php
session_start();
$_SESSION['cliente']=@$_GET['cliente'];
$cliente=$_SESSION['cliente'];

?>
<html>
<head><title>Sistema de Carteiras</title>
<link rel = "stylesheet" type="text/css" href="../lib/bootstrap.css"></head>
<center><h2> Sistema de Carteiras</h2>
<hr>
<b>Selecione o tipo desejado:<br/>
<table  border=1 align='center' class='table table-striped'><tr>

<form  method="get" id="cart" action=End_view.php>
<tr><td width='200' align='center'><a href="End_view.php?carteira=1">Carteira de Estudante</a></tr>
<tr><td width='200' align='center'><a href="End_view.php?carteira=2"> Carteira de Identidade</a></tr>
<tr><td width='200' align='center'><a href="End_view.php?carteira=3"> Carteira Profissional</a></tr>
</table>
<hr>
</form>
<?php

?>