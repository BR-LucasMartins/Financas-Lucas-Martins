<?php  

include '../conexao.php';

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$user = $_POST['user'];
$password = md5($_POST['password']);
$confirm_password = md5($_POST['confirm_password']); 


//echo "$user, $password, $confirm_password, $cpf, $nome, $email";


$query = "SELECT * FROM usuario WHERE login = '$user'";
$resultado = mysqli_query($conexao,$query); 

if(mysqli_num_rows($resultado) == 1){

	header('location: cadastrar_usuario.php?erro');
	exit();
}


$query = "SELECT * FROM usuario WHERE email = '$email'";
$resultado = mysqli_query($conexao,$query); 

if(mysqli_num_rows($resultado) == 1){

	header('location: cadastrar_usuario.php?erro2');
	
	exit();
}


if(("$password" == "$confirm_password") && mysqli_num_rows($resultado) != 1 )
{
	$query = "INSERT INTO usuario (cpf, nome, login, senha, email) VALUES ('$cpf', '$nome', '$user', '$password', '$email')";
	mysqli_query($conexao,$query); 

	header('location: cadastrar_usuario.php?sucesso');
	exit();

}

else {
	header('location: cadastrar_usuario.php?erro3');
}

?>