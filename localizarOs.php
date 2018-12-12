<?Php
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");

if(isset($_GET["consultarChamadoOs"]) && $_GET["consultarChamadoOs"] != ""){
  $consultarChamadoOs = $_GET["consultarChamadoOs"];
  $consultarChamadoNome ="#########";
}else if(isset($_GET["consultarChamadoNome"]) && $_GET["consultarChamadoNome"] != ""){
  $consultarChamadoNome = $_GET["consultarChamadoNome"];
  $consultarChamadoOs = -1;
}else{
  echo "{'erro' : 'Parametros não informados'}";
  exit();
}
$strcon = mysqli_connect('localhost','root','usbw','projetopim') or die('Erro ao conectar ao banco');
$sql = "SELECT * FROM orderm_servico where os='{$consultarChamadoOs}' or cliente like'{$consultarChamadoNome}%'";
$resultado = mysqli_query($strcon, $sql) or die ("Erro ao tentar consultar registro");

while ($registro = mysqli_fetch_array($resultado))
{

  $consultarChamadoId = $registro['id_cliente'];
  $consultarChamadoEmpresa = $registro['empresa'];
  $consultarChamadoNome = $registro['cliente'];
  $consultarChamadoOs = $registro['os'];
  $consultarChamadoData = $registro['data'];
  $consultarChamadoTipo_servico = $registro['tipo_servico'];
  $consultarChamadoEquipamento = $registro['equipamento'];
  $consultarChamadoDescricao = $registro['descricao'];


$json = '{"consultarChamadoId" : "'.$consultarChamadoId.'", "consultarChamadoEmpresa" : "'.$consultarChamadoEmpresa.'", "consultarChamadoNome" : "'.$consultarChamadoNome.'", "consultarChamadoOs" : "'.$consultarChamadoOs.'"
  , "consultarChamadoData" : "'.$consultarChamadoData.'","consultarChamadoTipo_servico" : "'.$consultarChamadoTipo_servico.'", "consultarChamadoEquipamento" : "'.$consultarChamadoEquipamento.'", "consultarChamadoDescricao" : "'.$consultarChamadoDescricao.'"}';

echo $json;
}

mysqli_close($strcon);

?>
