<?Php
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");
date_default_timezone_set("Brazil/East");
session_start();


if(isset($_GET["gravarIdCliente"]) && $_GET["gravarIdCliente"] != ""){
  $id_cliente = $_GET["gravarIdCliente"];
  if(isset($_GET["gravarCliente"]) && $_GET["gravarCliente"] != ""){
    $cliente = $_GET["gravarCliente"];
  }else{
    $cliente ="#########";
  }
}else if(isset($_GET["gravarCliente"]) && $_GET["gravarCliente"] != ""){
  $cliente = $_GET["gravarCliente"];
  $id_cliente = -1;
}else{
  echo '{"erro" : "Parametros não informados"}';
  exit();
}

$funcionario = $_SESSION['usuario'];
//$os
$empresa = $_GET['gravarEmpresa'];
$data = date("Y-m-d");
$equipamento = $_GET['gravarEquipamento'];
$tipoServico = $_GET['gravarTipoServico'];
$descricao = $_GET['gravarDescricao'];

$strcon = mysqli_connect('localhost','root','usbw','projetopim') or die('Erro ao conectar ao banco');
$sql = "INSERT INTO orderm_servico(data, funcionario, empresa, id_cliente, cliente, equipamento, tipo_servico,descricao)
VALUES
('$data','$funcionario','$empresa',$id_cliente,'$cliente','$equipamento','$tipoServico','$descricao')";

$resultado = mysqli_query($strcon, $sql) or die ("Erro ao tentar consultar registro");
if ($resultado ==false) {
  echo '{"erro" : "Erro na conexão"}';
  exit();
}
$json = '{"abrirChamadoEmpresa" : "'.$empresa.'", "abrirChamadoId" : "'.$id_cliente.'", "cliente" : "'.$cliente.'", "equipamento" : "'.$equipamento.'", "tipoServico" : "'.$tipoServico.'"}';

echo $json;


mysqli_close($strcon);

?>
