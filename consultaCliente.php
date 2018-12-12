<?Php
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");

echo "<STYLE>
*{
  font-size: 13.5px;
  text-align: center;
  background: #FFE4C4;
}
H1{
  font-size: 30PX;
  }
h3{
  padding: 0 5px;
  margin: 0;
  background: #708090;
  }
tr, td{
  text-align: center;
  background: #DCDCDC;
}
table{
  display: flex;
  justify-content: center;
  border: 0;
}
</STYLE> ";

echo "<center><h1>RELATÓRIO DE CLIENTES</h1></center>";

echo "<table border=1>";
echo "<tr>";
echo "<td><h3>ID</h3></td>";
echo "<td><h3>Empresa</h3></td>";
echo "<td><h3>Nome</h3></td>";
echo "<td><h3>Dt. nascimento</h3></td>";
echo "<td><h3>CPF</h3></td>";
echo "<td><h3>Telefone</h3></td>";
echo "<td><h3>Celular</h3></td>";
echo "<td><h3>bairro</h3></td>";
echo "<td><h3>cidade</h3></td>";
echo "<td><h3>UF</h3></td>";
echo "</tr>";


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

echo "<tr>";
echo "<td>".$id."</td>";
echo "<td>".$empresa."</td>";
echo "<td>".$nome."</td>";
echo "<td>".$dtNascimento."</td>";
echo "<td>".$cpf."</td>";
echo "<td>".$tel_fixo."</td>";
echo "<td>".$tel_cel."</td>";
echo "<td>".$bairro."</td>";
echo "<td>".$cidade."</td>";
echo "<td>".$uf."</td>";
echo "</tr>";

if ($empresa == "") {
  $empresa = "Pessoa Física";
}
/*
$json = '{"id" : "'.$id.'", "empresa" : "'.$empresa.'", "nome" : "'.$nome.'", "dtNascimento" : "'.$dtNascimento.'"
, "cpf" : "'.$cpf.'", "tel_fixo" : "'.$tel_fixo.'", "tel_cel" : "'.$tel_cel.'", "email" : "'.$email.'"
, "logradouro" : "'.$logradouro.'", "bairro" : "'.$bairro.'", "cidade" : "'.$cidade.'", "uf" : "'.$uf.'"}';

echo $json;
*/
}
mysqli_close($strcon);
//echo "</table>";

?>
