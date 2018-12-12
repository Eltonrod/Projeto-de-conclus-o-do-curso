<?php
session_start();
  include('conexaoLogin.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])){
  header('location: login.php');
  exit();
}
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select id, usuario from funcionario where usuario like '{$usuario}' and senha like '{$senha}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1){
  $_SESSION['usuario'] = $usuario;
  header('location: servico.php');
}else{
  $_SESSION['não_autenticado'] = true;
  header('location: login.php');
  exit();
}
?>
