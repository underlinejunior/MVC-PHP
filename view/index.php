<html>
<head>
<title>Sistema de Carteiras</title>
<head>
<br/>
<h2 align='center'>Login no sistema<h2>
<body><div align='center' style=" height:200; display:flex; flex-direction:row; justify-content:center; align-items:center;">
<link rel = "stylesheet" type="text/css" href="../lib/bootstrap.css"></head>

<?php
session_start();
include("../control/Cliente_Control.php");
$dados = new Cliente_Control();
$user=@$_POST['nome'];
$senha=@$_POST['senha'];

$v = $dados->Login($user,$senha);
foreach($v as $valor){
    $userbd=$valor['nome'];
    $senhabd=$valor['cpf'];
}
if(@$_POST['btn']=='login'){
    //if(@$user==$userbd && @$senha==$senhabd){
    if(isset($userbd)){
        $_SESSION['time']=time()+1200;
        $_SESSION['user']=$user;
        Header("Location:Cliente_view.php");
}else{
    echo "Erro no login";
}}

?>

<form method='POST'><table>
<tr><td>usuário:<br/><b><input type='text' name='nome' placeholder='nome no usuário'></b></td></tr>
<tr><td>senha:<br/><b><input type='password' name='senha' placeholder='senha'></b></td></tr>
<tr><td><center><button class='btn btn-Success' name='btn' value=login>ENTRAR</button></center></td></tr>
</table>
</form>

</div>
</body>
</html>