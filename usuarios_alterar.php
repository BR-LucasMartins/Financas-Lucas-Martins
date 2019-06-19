<?php 

session_start();
include 'conexao.php';
include 'verifica_sessao.php';

$id_usuario = $_SESSION['id_usuario'];


$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$user = $_POST['user'];


$query = "UPDATE usuario SET cpf = '$cpf', nome = '$nome', login = '$user', email = '$email' 
WHERE COD_Usuario = '$id_usuario'";

		mysqli_query($conexao, $query);			

			header('location: views/usuarios.php?sucesso');

 ?>