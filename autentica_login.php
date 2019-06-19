<?php  

include 'conexao.php';


$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$query = "SELECT * FROM usuario WHERE (login ='$usuario' OR email = '$usuario') AND senha ='$senha'";
$resultado = mysqli_query($conexao, $query);


if(mysqli_num_rows($resultado) == 1) // retorna uma linha se o resultado for true .
{
	
	while($row = mysqli_fetch_assoc($resultado)) // essa função pega os dados no banco para gravar em sessão dados do usuário.
	{
		$id_usuario = $row['COD_Usuario'];
		$nome = $row['nome'];
		$cpf = $row['cpf'];
		$email = $row['email'];
		$user = $row['login'];
		
	}

	session_start();

	$_SESSION['login'] = true;
	$_SESSION['usuario'] = $usuario;
	$_SESSION['id_usuario']	= $id_usuario;	
	$_SESSION['nome'] = $nome;
	$_SESSION['cpf'] = $cpf;
	$_SESSION['email'] = $email;
	$_SESSION['user'] = $user;
	
	header('location: views/home.php');
	exit;
}

else
{
	header('location: indexErro.html');
	exit;
}


?>