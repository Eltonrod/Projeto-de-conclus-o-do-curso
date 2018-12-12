<?Php
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");


if(isset($_GET["abrirChamadoId"]) && $_GET["abrirChamadoId"] != ""){
  $abrirChamadoId = $_GET["abrirChamadoId"];
  $abrirChamadoNome ="#########";
}else if(isset($_GET["abrirChamadoNome"]) && $_GET["abrirChamadoNome"] != ""){
  $abrirChamadoNome = $_GET["abrirChamadoNome"];
  $abrirChamadoId = -1;
}else{
  echo "{'erro' : 'Parametros não informados'}";
  exit();
}
$strcon = mysqli_connect('localhost','root','usbw','projetopim') or die('Erro ao conectar ao banco');
$sql = "SELECT * FROM clientes where id='{$abrirChamadoId}' or nome like'{$abrirChamadoNome}%'";
$resultado = mysqli_query($strcon, $sql) or die ("Erro ao tentar consultar registro");

while ($registro = mysqli_fetch_array($resultado))
{
  $abrirChamadoId = $registro['id'];
  $abrirChamadoEmpresa = $registro['empresa'];
  $abrirChamadoNome = $registro['nome'];
  $abrirChamadoDtNascimento = $registro['dtNascimento'];
  $abrirChamadoCpf = $registro['cpf'];
  $abrirChamadoTel_fixo = $registro['tel_fixo'];
  $abrirChamadoTel_cel = $registro['tel_cel'];
  $abrirChamadoEmail = $registro['email'];
  $abrirChamadoLogradouro = $registro['logradouro'];
  $abrirChamadoBairro = $registro['bairro'];
  $abrirChamadoCidade = $registro['cidade'];
  $abrirChamadoUf = $registro['uf'];

  if ($abrirChamadoEmpresa == "") {
    $abrirChamadoEmpresa = "Pessoa Física";
  }

$json = '{"abrirChamadoId" : "'.$abrirChamadoId.'", "abrirChamadoEmpresa" : "'.$abrirChamadoEmpresa.'", "abrirChamadoNome" : "'.$abrirChamadoNome.'", "abrirChamadoDtNascimento" : "'.$abrirChamadoDtNascimento.'"
  , "abrirChamadoCpf" : "'.$abrirChamadoCpf.'", "abrirChamadoTel_fixo" : "'.$abrirChamadoTel_fixo.'", "abrirChamadoTel_cel" : "'.$abrirChamadoTel_cel.'", "abrirChamadoEmail" : "'.$abrirChamadoEmail.'"
  , "abrirChamadoLogradouro" : "'.$abrirChamadoLogradouro.'", "abrirChamadoBairro" : "'.$abrirChamadoBairro.'", "abrirChamadoCidade" : "'.$abrirChamadoCidade.'", "abrirChamadoUf" : "'.$abrirChamadoUf.'"}';

echo $json;
}

mysqli_close($strcon);

?>
