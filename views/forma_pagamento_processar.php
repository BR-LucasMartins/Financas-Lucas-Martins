<?php  

session_start();
include '../verifica_sessao.php';
include '../conexao.php';



// CONDIÇÃO PARA CAIR NO PROCESSO DE CADASTRAR DADOS NO BD.

if(isset($_GET['inserir']))
{
	
	$forma_pagamento = $_POST['forma_pagamento'];
	$desc_pagamento = $_POST['desc_pagamento'];


	$query = "INSERT INTO forma_pagamento(FORMA_PAGAMENTO, DESC_FORMA_PAGAMENTO) VALUES('$forma_pagamento', '$desc_pagamento')";
	mysqli_query($conexao,$query);

	header("location: forma_pagamento.php?sucesso1"); 

	exit();

} 


/* -----------------------------------------------------------------------------------------------------------------------*/



// CONDIÇÃO PARA CAIR NA PAGINA DE ALTERAR OS DADOS DE FORMA_PAGAMENTO.


if(isset($_GET['editar']))
{

$query = "SELECT * FROM forma_pagamento";
$resultado = mysqli_query($conexao, $query);

	while($linha = mysqli_fetch_array($resultado)){

		if($linha['ID_FORMA_PAGAMENTO'] == $_GET['editar']){

			$id_forma_pagamento = $linha['ID_FORMA_PAGAMENTO'];
			
		?>

		<!DOCTYPE html>
<html class="ls-theme-turquoise">
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
          <li><a href="../logout.php">Sair</a></li>
         </ul>
      </nav>
    </div>
  </div>

  <span class="ls-show-sidebar ls-ico-menu"></span>

   <a href="javascript:window.history.go(-1)" class="ls-go-next"> <span class="ls-text"> Voltar</span></a>

  <!-- Nome do produto/marca com sidebar -->
    <h1 class="ls-brand-name">
      <a href="home.php" class="ls-ico-earth">
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
           <li> <a href="dashboard.php" class="ls-ico-dashboard" title="Dashboard"> Dashboard </a> </li>
           <li><a href="movimentacoes.php" class="ls-ico-hours" title="Clientes">Movimentações</a></li>
           <li><a href="relatorios.php" class="ls-ico-stats" title="Relatórios">Relatórios</a></li>
           <li>
            <a href="#" class="ls-ico-cog" title="Configurações">Configurações</a>
            <ul>
              <li><a href="usuarios.php">Usuarios</a></li>
              <li><a href="categorias.php">Categorias</a></li>
              <li><a href="forma_pagamento.php">Formas de pagamento</a></li>

            </ul>
          </li>
        </ul>
      </nav>
  </div>
</aside>


    <main class="ls-main ">
      <div class="container-fluid">
        <h1  align="center" style="color: #FF7F00;" class="ls-title-intro ls-ico-star3">  Alterar Forma de Pagamento </h1>
        <br>
        	<hr>
        		<div align="center">
        		<form action="../forma_pagamento_alterar.php" class="ls-form row" method="post">

                <input type="hidden" name="id_forma_pagamento" value="<?php echo $id_forma_pagamento ?>">
         

              			<label class="ls-label col-md-8 ">
				              <b class="ls-label-text ls-color-theme">Forma de Pagamento <br></b>
				              <input class="ls-field-lg" type="text" name="forma_pagamento"  value="<?php echo $linha['FORMA_PAGAMENTO']; ?>" required  autocomplete="off">
				            </label>


              			<label class="ls-label col-md-8 ">
				              <b class="ls-label-text ls-color-theme">Descrição <br></b>
				              <input class="ls-field-lg" type="text" name="desc_pagamento" required value="<?php echo $linha['DESC_FORMA_PAGAMENTO']; ?>"  autocomplete="off">
				            </label>

                    <hr>

                        <input id="alterar" class="ls-btn-primary ls-btn-lg ls-ico-user " type="submit" name="alterar" value="Alterar">

                        <a href="forma_pagamento.php" id="cancelar" class="ls-btn ls-btn-lg "> Cancelar </a> 
                        
                        <style type="text/css">
                            
                            #alterar{
                              width: 150px;
                            }
                            #cancelar{
                              width: 150px;
                            }
                        </style>
                </div> 
             
                <div align="center">
                
            	</div><br>
          </fieldset>

      </div>
    </main>

    

    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>	

<?php
		}   // FECHANDO CHAVE DO  *IF(ISSET) NA PRIMEIRA LINHA

	}		// FECHANDO CHAVE DO WHILE 

}			// FECHANDO CHAVE DA CONDIÇAO DE SE O *IF $LINHA= ID FOR IGUAL AO ID DA VARIAVEL GET.


//---------------------------------------------------------------------------------------------------------------------------------//
 
 // excluir dados


if(isset($_GET['excluir']))
{

  $query = "SELECT * FROM forma_pagamento";
  $resultado = mysqli_query($conexao, $query);

  while($linha = mysqli_fetch_array($resultado)){

    if($linha['ID_FORMA_PAGAMENTO'] == $_GET['excluir']){

      $id_forma_pagamento = $linha['ID_FORMA_PAGAMENTO'];
          
    }

  }

      $query = "DELETE FROM forma_pagamento WHERE ID_FORMA_PAGAMENTO = '$id_forma_pagamento'";
      mysqli_query($conexao, $query);

      header('location: forma_pagamento.php?sucesso3');
}