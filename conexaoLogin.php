e<?php

	$servidor = "localhost";
	$usuario = "root";
	$senha = "usbw";
	$dbname = "projetopim";

	//criar conexão
	global $conexao;
	$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname) or die('Não foi possivel conectar');

?>
