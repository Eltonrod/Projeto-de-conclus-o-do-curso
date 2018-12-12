<?php
include_once('conexao.php');

//$id = $_POST['id'];
$empresa = $_POST['empresa'];
$nome = $_POST['nome'];
$dtNascimento = $_POST['dtNascimento'];
$cpf = $_POST['cpf'];
$tel_fixo = $_POST['tel_fixo'];
$tel_cel = $_POST['tel_cel'];
$email = $_POST['email'];
$logradouro = $_POST['logradouro'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];

$result_msg_contato = "INSERT INTO clientes(empresa, nome,dtNascimento,cpf,tel_fixo,tel_cel, email,logradouro,bairro,cidade,uf)
VALUES
('$empresa','$nome','$dtNascimento','$cpf','$tel_fixo','$tel_cel','$email','$logradouro','$bairro','$cidade','$uf')";

$resultado_msg_contato = mysqli_query($conn, $result_msg_contato);

    echo '<script>alert("Dados enviados com sucesso!!"); </script>';
    header('location: index.html');




/*$link = mysql_connect('localhost', 'root', '');
mysql_set_charset('utf8',$link);

mysql_select_db('primeiraBase', $link);



if ($idFuncionario != ''){
$sql = "UPDATE `funcionario` SET `nome`='".$nome."',`cpf`='".$cpf."',`dataNascimento`='".$dataNascimento."',
`rg`='".$rg."',`endereco`='".$endereco."',`escolaridade`='".$escolaridade."',`profissao`='".$profissao."',`genero`='".$genero."',`promo`='".$promo."'
WHERE `idFuncionario` =".$idFuncionario;
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

*/






?>
