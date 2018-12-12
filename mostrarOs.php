<?Php
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");

$strcon = mysqli_connect('localhost','root','usbw','projetopim') or die('Erro ao conectar ao banco');
$sql = "SELECT os FROM orderm_servico ORDER BY os asc";
$resultado = mysqli_query($strcon, $sql) or die ("Erro ao tentar consultar registro");
while ($registro = mysqli_fetch_array($resultado))
{
$os = $registro['os'];
}
$json = '{"os" : "'.$os.'"}';

echo $json;

mysqli_close($strcon);

?>
