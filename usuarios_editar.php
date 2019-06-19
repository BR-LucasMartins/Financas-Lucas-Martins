<?php  

session_start();
include 'conexao.php';
include 'verifica_sessao.php';

$id = $_SESSION['id_usuario'];

$query = "SELECT * FROM usuario Where COD_Usuario = '$id'";
$resultado = mysqli_query($conexao, $query);

while($linha = mysqli_fetch_array($resultado))
{
    $nome = $linha['nome'];
    $cpf = $linha['cpf'];
    $email = $linha['email'];
    $user = $linha['login'];
    $id_usuario = $linha['COD_Usuario'];
}

?>

<!DOCTYPE html>
<html class="ls-theme-turquoise">
  <head>
    <title>Financeiro</title>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="http://assets.locaweb.com.br/locastyle/3.10.1/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/locawebstyle/assets/images/ico-boilerplate.png">
  </head>
  <body>
    <div class="ls-topbar ">

  <!-- Barra de Notificações -->
  <div class="ls-notification-topbar">

    <!-- Dropdown com detalhes da conta de usuário -->
    <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
      <a href="#" class="ls-ico-user">
        <img src="#" alt="" />
        <span class="ls-name"> <?php    echo $_SESSION['nome']; ?></span>
      </a>

      <nav class="ls-dropdown-nav ls-user-menu">
        <ul>
          <li><a href="usuarios.php">Meus dados</a></li>
          <li><a href="logout.php">Sair</a></li>
         </ul>
      </nav>
    </div>
  </div>

  <span class="ls-show-sidebar ls-ico-menu"></span>

   <a href="javascript:window.history.go(-1)" class="ls-go-next"> <span class="ls-text"> Voltar</span></a>

  <!-- Nome do produto/marca com sidebar -->
    <h1 class="ls-brand-name">
      <a href="views/home.php" class="ls-ico-earth">
        <small>Financeiro</small>
        Prog. WEB
      </a>
    </h1>

  <!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->
</div>


    <aside class="ls-sidebar">

  <div class="ls-sidebar-inner">
      <a href="#"  class="ls-go-prev"><span class="ls-text">Voltar à lista de serviços</span></a>
      <nav class="ls-menu">
        <ul>
           <li> <a href="views/dashboard.php" class="ls-ico-dashboard" title="Dashboard"> Dashboard </a> </li>
           <li><a href="views/movimentacoes.php" class="ls-ico-hours" title="Clientes">Movimentações</a></li>
           <li><a href="views/relatorios.php" class="ls-ico-stats" title="Relatórios">Relatórios</a></li>
           <li>
            <a href="#" class="ls-ico-cog" title="Configurações">Configurações</a>
            <ul>
              <li><a href="views/usuarios.php">Usuarios</a></li>
              <li><a href="views/categorias.php">Categorias</a></li>
              <li><a href="views/forma_pagamento.php">Formas de pagamento</a></li>

            </ul>
          </li>
        </ul>
      </nav>
  </div>
</aside>


    <main class="ls-main ">
      <div class="container-fluid">
        <h1 class="ls-title-intro ls-ico-cog"> Meus dados </h1>
        	<h1  style="color: #FF7F00;" align="center"> Editar Perfil </h1><br>
        	<hr>
        		<div align="center">
        		<form action="usuarios_alterar.php" class="ls-form row" method="post">
         

              			<label class="ls-label col-md-8 ">
				              <b class="ls-label-text ls-color-theme">CPF<br></b>
				              <input class="ls-field-lg" type="text" name="cpf" value="<?php echo($cpf); ?>" required  autocomplete="off">
				            </label>
                  		
                  
                  			<label class="ls-label col-md-8 ">
				              <b class="ls-label-text ls-color-theme">Nome</b>
				              <input  class="ls-field-lg" type="text" name="nome" value="<?php echo($nome);; ?>" required autocomplete="off" >
				            </label>
                  	
                 
                  			<label class="ls-label col-md-8">
				              <b class="ls-label-text ls-color-theme">E-mail</b>
				              <input class="ls-field-lg" type="text" name="email" value="<?php echo($email); ?>" required autocomplete="off" >
				            </label>
                 

               
                  			<label class="ls-label col-md-8 ">
				              <b class="ls-label-text ls-color-theme">Usuário<br></b>
				              <input class="ls-field-lg" type="text" name="user" value="<?php echo($user); ?>" required  autocomplete="off">
				            </label>
                  		
               
                </div> 
              </div>
              </label><br>
                <div align="center">
                <input  class="ls-btn-primary ls-btn-lg " type="submit" name="salvar" value="Confirmar">

                  <a href="views/usuarios.php" class="ls-btn ls-btn-lg "  > Cancelar </a>
            	</div><br>
          </fieldset>

      </div>
    </main>

    

    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>



