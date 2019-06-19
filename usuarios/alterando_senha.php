<?php  

include '../conexao.php';


$nome = $_POST['nome'];
$email = $_POST['email'];
$user = $_POST['user'];
$password = md5($_POST['new_password']);
$confirm_password = md5($_POST['confirm_password']); 



$query = "SELECT * FROM usuario WHERE nome = '$nome' AND email = '$email' AND login = '$user' "; // verifica se os dados coincide com o cadastro

$resultado = mysqli_query($conexao, $query);

	if(mysqli_num_rows($resultado) != 1)
	{
		header('location: alterar_senha.php?erro');
		exit();
	}

	
	if($password == $confirm_password)
	{
		$query = "UPDATE financas_lucas_martins.usuario SET  senha = '$password' WHERE login = '$user'";
		mysqli_query($conexao, $query);

		header('location: alterar_senha.php?sucesso');
	}

	else {
		header('location: alterar_senha.php?erro2');
	}
	
?>