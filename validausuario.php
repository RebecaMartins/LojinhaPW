<?php
include 'conexao.php';

session_start(); //iniciando a sessao
$Vemail = $_POST['txtemail'];
$Vsenha = $_POST['txtsenha'];

//echo $Vemail.'<br';
//echo $Vsenha.'br';

$consulta = $cn->query("select cd_usuario,nm_usuario,ds_email,ds_status from tbl_usuario where ds_email = '$Vemail' and ds_senha = '$Vsenha' ");
if ($consulta->rowCount()==1){ //verifica se o usuario esta cadastrado ou nao
    $exibeusuario = $consulta->fetch(PDO:FETCH_ASSOC);
    $_session['ID'] = $exibeusuario['cd_usuario'];
    header ('location:index.php');
}    
else {
    header('location:erro.php');
}
?>