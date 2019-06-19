<?php 

session_start();
include 'conexao.php';
include 'verifica_sessao.php';

$id_usuario = $_SESSION['id_usuario'];


// aqui exclui os dados do usuario no sistema.
$query = " DELETE FROM usuario WHERE COD_Usuario = '$id_usuario'";
mysqli_query($conexao, $query);	


// aqui exclui todos os lançamentos registrados do usuario excluido, para que os mesmos não fiquem salvos no bancos, melhorando performance e  liberando espaço de armazenamento;.

$sql= "DELETE FROM movimentacoes WHERE idUSUARIO = '$id_usuario'";
mysqli_query($conexao, $sql);		

			header('location: logout.php');

 ?>