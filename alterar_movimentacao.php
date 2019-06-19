<?php
session_start();
include 'verifica_sessao.php';
include 'conexao.php';

if(isset($_GET['editar']))
{

$query = "SELECT * FROM movimentacoes";
$resultado = mysqli_query($conexao, $query);

	while($linha = mysqli_fetch_array($resultado)){

		if($linha['idFINANCAS'] == $_GET['editar']){

			$id_financas = $linha['idFINANCAS'];
			
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
        <h1 style="color: #FF7F00;" align="center" class="ls-title-intro ls-ico-cog"> Editar Movimetação </h1>
        	
        		<div align="center">
        		<form action="movimentacoes_opcoes.php?editar" class="ls-form row" method="post">

                <input type="hidden" name="id_financas" value="<?php echo $id_financas ?>">
        
                    <table class="ls-table  ls-table-bordered">
                  <tbody>
                     <!-- imput do campo data de Descrição --> 
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)"> <label class="ls-color-info "> <b> Descrição: </b> </label></td>
                      <td> <input type="text" name="descricao" placeholder="descrição" required  autocomplete="off" value="<?php echo $linha['DESCRICAO']; ?>"></td>
                      <td></td>
                    </tr>

                     <!-- imput do campo data de valor --> 
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)" >  <label class="ls-color-info"> <b>Valor: </b> </label></td>
                      <td><input type="number" name="valor" class="ls-mask-money ls-no-spin"  placeholder="  #.##0,00" required 
                        value="<?php echo $linha['VALOR']; ?>">
                      </td>
                      <td></td>
                    </tr>

                     <!-- imput do campo data de categoria--> 
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)"><label class="ls-color-info"> <b> Categoria: </b> </label></td>
                      <td><input type="text" name="categoria" placeholder="descrição" required  autocomplete="off" value="<?php echo $linha['CATEGORIA']; ?>">
                      </td>
                      <td></td>
                    </tr>

                     <!-- imput do campo data de pagamento --> 
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)" ><label class="ls-color-info"> <b> Data pagamento: </b> </label></td>
                      <td> <input type="date"  name="data_pagamento"  placeholder="Data Pagamento" value="<?php echo $linha['DATA_PAGAMENTO']; ?>" ></td>
                      <td></td>
                    </tr>


                     <!-- imput do campo data de Vencimento --> 
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)" > <label class="ls-color-info"> <b> Data Vencimento: </b> </label> </td>
                      <td> <input type="date"  name="data_vencimento"  placeholder="Data vencimento" value="<?php echo $linha['DATA_VENCIMENTO']; ?>" ></td>
                      <td></td>
                    </tr>


                    <!-- imput do campo Forma de pagamento -->
                     <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)" > <label class="ls-color-info"> <b> Forma pagamento:  </b> </label> </td>
                      <td><input type="text" name="forma_pagamento" placeholder="descrição" required  autocomplete="off" value="<?php echo $linha['FORMA_PAGAMENTO']; ?>">
                    </td>
                    <td></td>
                    </tr>


                    <!-- imput do campo Tipo--> 
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)" >  <label class="ls-color-info"> <b> Tipo:  </b> </label> </td>
                      <td> <div class="ls-custom-select">
                        <select name=" tipo" class="ls-select">
                          <option> Crédito </option>
                          <option> Débito </option>
                          <option> Dinheiro </option>
                        </select>
                      </td></div>
                      <td></td>
                    </tr>


                    <!-- imput do campo  Situação --> 
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)"> <label class="ls-color-info "> <b> Situação: </b> </label></td>
                      <td> 
                        <input type="radio" name="situacao" value="Pago">
                          <label class="ls-label-text ls-text-md"> Pago </label> 
                        <input type="radio" name="situacao" value="Pendente">
                          <label class="ls-label-text ls-text-md"> Pendente </label>
                      </td>
                      <td></td>
                    </tr>

                  </tbody>
                </table> 

                <input id="salvar" class="ls-btn-danger ls-btn-lg ls-col-md " type="submit" name="salvar" value="Salvar"> 
                <a href="views/movimentacoes.php" id="cancelar" class="ls-btn-dark ls-btn-lg"> Cancelar</a>

                <style type="text/css">
                  #salvar{
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
		}     // FECHANDO CHAVE DO  *IF(ISSET) NA PRIMEIRA LINHA

	}       // FECHANDO CHAVE DO WHILE 

}         // FECHANDO CHAVE DA CONDIÇAO DE SE O *IF $LINHA= ID FOR IGUAL AO ID DA VARIAVEL GET.
