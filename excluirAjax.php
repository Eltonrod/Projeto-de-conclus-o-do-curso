<?Php
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");


if(isset($_GET["excluirId"]) && $_GET["excluirId"] != ""){
  $excluirId = $_GET["excluirId"];
  $ExcluirNome ="#########";
}else if(isset($_GET["excluirNome"]) && $_GET["excluirNome"] != ""){
  $ExcluirNome = $_GET["excluirNome"];
  $excluirId = -1;
}else{
  echo "{'erro' : 'Parametros não informados'}";
  exit();
}
$strcon = mysqli_connect('localhost','root','usbw','projetopim') or die('Erro ao conectar ao banco');
$sql = "SELECT * FROM clientes where id='{$excluirId}' or nome like'{$ExcluirNome}%'";
$resultado = mysqli_query($strcon, $sql) or die ("Erro ao tentar consultar registro");

while ($registro = mysqli_fetch_array($resultado))
{

  $excluirId = $registro['id'];
  $excluirEmpresa = $registro['empresa'];
  $ExcluirNome = $registro['nome'];
  $excluirDtNascimento = $registro['dtNascimento'];
  $excluirCpf = $registro['cpf'];
  $excluirTel_fixo = $registro['tel_fixo'];
  $excluirTel_cel = $registro['tel_cel'];
  $excluirEmail = $registro['email'];
  $excluirLogradouro = $registro['logradouro'];
  $excluirBairro = $registro['bairro'];
  $excluirCidade = $registro['cidade'];
  $excluirUf = $registro['uf'];

  if ($excluirEmpresa == "") {
    $excluirEmpresa = "Pessoa Física";
  }

$json = '{"excluirId" : "'.$excluirId.'", "excluirEmpresa" : "'.$excluirEmpresa.'", "excluirNome" : "'.$ExcluirNome.'", "excluirDtNascimento" : "'.$excluirDtNascimento.'"
  , "excluirCpf" : "'.$excluirCpf.'", "excluirTel_fixo" : "'.$excluirTel_fixo.'", "excluirTel_cel" : "'.$excluirTel_cel.'", "excluirEmail" : "'.$excluirEmail.'"
  , "excluirLogradouro" : "'.$excluirLogradouro.'", "excluirBairro" : "'.$excluirBairro.'", "excluirCidade" : "'.$excluirCidade.'", "excluirUf" : "'.$excluirUf.'"}';

echo $json;
}

mysqli_close($strcon);

?>
