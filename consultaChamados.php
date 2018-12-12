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

echo "<center><h1>RELATÓRIO DE CHAMADOS</h1></center>";
echo "<table border=1>";
echo "<tr>";
echo "<td><h3>OS</h3></td>";
echo "<td><h3>DATA</h3></td>";
echo "<td><h3>USUÁRIO</h3></td>";
echo "<td><h3>EMPRESA</h3></td>";
echo "<td><h3>ID</h3></td>";
echo "<td><h3>CLIENTE</h3></td>";
echo "<td><h3>EQUIPAMENTO</h3></td>";
echo "<td><h3>SERVIÇO</h3></td>";
echo "<td><h3>DESCRIÇÃO</h3></td>";
echo "<td><h3>ATIVIDADE</h3></td>";
echo "<td><h3>OBSERVAÇÃO</h3></td>";
echo "</tr>";


$strcon = mysqli_connect('localhost','root','usbw','projetopim') or die('Erro ao conectar ao banco');
$sql = "SELECT * FROM orderm_servico";
$resultado = mysqli_query($strcon, $sql) or die ("Erro ao tentar consultar registro");

//Obtendo os dados por meio de um loop while

while ($registro = mysqli_fetch_array($resultado))
{
$os = $registro['os'];
$data = $registro['data'];
$funcionario = $registro['funcionario'];
$empresa = $registro['empresa'];
$id_cliente = $registro['id_cliente'];
$cliente = $registro['cliente'];
$equipamento = $registro['equipamento'];
$tipo_servico = $registro['tipo_servico'];
$descricao = $registro['descricao'];
$tipo_atividade = $registro['tipo_atividade'];
$descricao_atividade = $registro['descricao_atividade'];

echo "<tr>";
echo "<td>".$os."</td>";
echo "<td>".$data."</td>";
echo "<td>".$funcionario."</td>";
echo "<td>".$empresa."</td>";
echo "<td>".$id_cliente."</td>";
echo "<td>".$cliente."</td>";
echo "<td>".$equipamento."</td>";
echo "<td>".$tipo_servico."</td>";
echo "<td>".$descricao."</td>";

if ($tipo_atividade == "Finalizada") {
  echo "<td style='color:#191970;'><b>".$tipo_atividade."</b></td>";
}else{
echo "<td>".$tipo_atividade."</td>";
}
if($descricao_atividade == ""){
  echo "<td style='color:#D2691E;'>Aguardando avaliação</td>";
}else{
echo "<td>".$descricao_atividade."</td>";
}
echo "</tr>";

/*if ($empresa == "") {
  $empresa = "Pessoa Física";
}

$json = '{"id" : "'.$id.'", "empresa" : "'.$empresa.'", "nome" : "'.$nome.'", "dtNascimento" : "'.$dtNascimento.'"
, "cpf" : "'.$cpf.'", "tel_fixo" : "'.$tel_fixo.'", "tel_cel" : "'.$tel_cel.'", "email" : "'.$email.'"
, "logradouro" : "'.$logradouro.'", "bairro" : "'.$bairro.'", "cidade" : "'.$cidade.'", "uf" : "'.$uf.'"}';

echo $json;
*/
}
mysqli_close($strcon);
//echo "</table>";

?>
