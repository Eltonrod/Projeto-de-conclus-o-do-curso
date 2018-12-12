<?Php
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");


if(isset($_GET["excluirId"]) && $_GET["excluirId"] != ""){
  $excluirId = $_GET["excluirId"];
  $excluirNome ="#########";
}else if(isset($_GET["excluirNome"]) && $_GET["excluirNome"] != ""){
  $excluirNome = $_GET["excluirNome"];
  $excluirId = -1;
}else{
  echo "{'erro' : 'Parametros não informados'}";
  exit();
}
//if (isset($_GET['excluirNome'])) {
   $strcon = mysqli_connect('localhost','root','usbw','projetopim') or die('Erro ao conectar ao banco');
   $del = "DELETE FROM clientes where id='{$excluirId}' or nome like'{$excluirNome}%'";
   $delgo = mysqli_query($strcon, $del) or die ('Erro ao tentar deletar');
   $status = "ok";
   mysqli_close($strcon);
//}else{
//$status = "ERRO: Não foi excluído o cadastro";
//}

$json = '{"status" : "'.$status.'"}';
echo $json;




?>
