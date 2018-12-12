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
  padding: 0 1px;
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

echo "<center><h1>RELATÓRIO DE MENSAGENS DO SITE</h1></center>";
echo "<table border=1>";
echo "<tr>";
echo "<td><h3>NOME</h3></td>";
echo "<td><h3>E-MAIL</h3></td>";
echo "<td><h3>ASSUNTO</h3></td>";
echo "<td><h3>MENSAGEM</h3></td>";
echo "</tr>";


$strcon = mysqli_connect('localhost','root','usbw','projetopim') or die('Erro ao conectar ao banco');
$sql = "SELECT * FROM mensagens_contatos";
$resultado = mysqli_query($strcon, $sql) or die ("Erro ao tentar consultar registro");

//Obtendo os dados por meio de um loop while

while ($registro = mysqli_fetch_array($resultado))
{
$nome = $registro['nome'];
$email = $registro['email'];
$assunto = $registro['assunto'];
$mensagem = $registro['mensagem'];
echo "<tr>";
echo "<td>".$nome."</td>";
echo "<td>".$email."</td>";
echo "<td>".$assunto."</td>";
echo "<td>".$mensagem."</td>";
echo "</tr>";
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
