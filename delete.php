<?php
//session_start();
include('conexao.php');

if (isset($_POST['id'])) {
   $del = "DELETE FROM clientes WHERE ID =".$_POST['id'];
   $delgo = mysqli_query($conn, $del) or die ('Erro ao tentar deletar');
   echo "Cliente excluído com sucesso!";
//   header('location: servico.php');

}


?>
