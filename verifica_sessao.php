<?php  

if(!$_SESSION['usuario']) { 				// se não existir a variavel global , o header direciona para o index.
	header('Location: index.php');
	exit();
}

/* essa função serve para verificar se o login foi autenticado , caso contrário ele redireciona o usuario para pagina de login */

?>