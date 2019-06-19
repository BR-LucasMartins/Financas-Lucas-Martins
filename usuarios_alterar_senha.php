<?php  

session_start();
include 'conexao.php';
include 'verifica_sessao.php';

$id_usuario = $_SESSION['id_usuario'];

$senha_antiga = md5($_POST['senha_antiga']);
$nova_senha = md5($_POST['new_password']);
$confirmar_senha = md5($_POST['confirmar_senha']);


$query = "SELECT * FROM usuario WHERE senha = '$senha_antiga' AND COD_Usuario = '$id_usuario'";
$resultado = mysqli_query($conexao, $query);


if (mysqli_num_rows($resultado) != 1){

	header('location: views/usuarios.php?erro1');
}

else{

	if ($nova_senha == $confirmar_senha)
	{

		$query = "UPDATE usuario SET senha = '$nova_senha' WHERE COD_Usuario = '$id_usuario'";
			mysqli_query($conexao, $query);


			header('location: views/usuarios.php?sucesso1');

	}

	else
	{
		header('location: views/usuarios.php?erro2');
	}

}

?>