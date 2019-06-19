<?php  
		
		// iniciar a sessão para poder destruir a mesma.		
	session_start();

		//destroi a sessão
	session_destroy();

	header('location: index.html');

?>