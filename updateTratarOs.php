<?Php
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");

$updateOs = $_GET['GravarUpdateOs'];
$tipo_atividade = $_GET['registrarAtividade'];
$descricao_atividade = $_GET['novaDescricao'];

$strcon = mysqli_connect('localhost','root','usbw','projetopim') or die('Erro ao conectar ao banco');
$sql = "UPDATE orderm_servico SET tipo_atividade='$tipo_atividade', descricao_atividade='$descricao_atividade' WHERE os='$updateOs'";
$resultado = mysqli_query($strcon, $sql) or die ("Erro ao tentar consultar registro");

$json = '{"updateOs" : "'.$updateOs.'", "descricao_atividade" : "'.$descricao_atividade.'", "tipo_atividade" : "'.$tipo_atividade.'"}';

echo $json;


mysqli_close($strcon);

?>
