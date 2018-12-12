<?Php
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");

$strcon = mysqli_connect('localhost','root','usbw','projetopim') or die('Erro ao conectar ao banco');
$sql = "SELECT * FROM clientes";
$resultado = mysqli_query($strcon, $sql) or die ("Erro ao tentar consultar registro");

//Obtendo os dados por meio de um loop while

while ($registro = mysqli_fetch_array($resultado))
{
$id = $registro['id'];
$empresa = $registro['empresa'];
$nome = $registro['nome'];
$dtNascimento = $registro['dtNascimento'];
$cpf = $registro['cpf'];
$tel_fixo = $registro['tel_fixo'];
$tel_cel = $registro['tel_cel'];
$email = $registro['email'];
$logradouro = $registro['logradouro'];
$bairro = $registro['bairro'];
$cidade = $registro['cidade'];
$uf = $registro['uf'];

if ($empresa == "") {
  $empresa = "Pessoa Física";
}

$json = '{"id" : "'.$id.'", "empresa" : "'.$empresa.'", "nome" : "'.$nome.'", "dtNascimento" : "'.$dtNascimento.'"
, "cpf" : "'.$cpf.'", "tel_fixo" : "'.$tel_fixo.'", "tel_cel" : "'.$tel_cel.'", "email" : "'.$email.'"
, "logradouro" : "'.$logradouro.'", "bairro" : "'.$bairro.'", "cidade" : "'.$cidade.'", "uf" : "'.$uf.'"}';

echo $json;
}
mysqli_close($strcon);
//echo "</table>";

?>
