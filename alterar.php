<?php
include_once('conexao.php');

$id = $_POST['id'];

if ($id != ''){
$sql = "UPDATE `funcionario` SET (empresa, nome,dtNascimento,cpf,tel_fixo,tel_cel, email,logradouro,bairro,cidade,uf)
WHERE `id` =".$id;
$rs = mysql_query($sql);
if($rs){
	echo "<script>alert('Cadastro atualizado com sucesso!')</script>";
}else {
	echo "<script>alert('Cadastro não atualizado!')</script>";
} }else{

$rs = mysql_query($sql);

if ($rs){
	echo "<script>alert('Cadastro efetuado com sucesso!')</script>";
}else{
	echo "<script>alert('Cadastro não efetuado')</script>";
	}
}

Mysql_close($link);






?>
