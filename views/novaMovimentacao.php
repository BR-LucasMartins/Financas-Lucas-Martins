<?php 
  
  session_start();
  include '../verifica_sessao.php';
  include '../conexao.php';

  $query = "SELECT * FROM categoria ORDER BY DESC_CATEGORIA ASC";
  $consulta_categoria = mysqli_query($conexao,$query);


  $query = "SELECT * FROM forma_pagamento ORDER BY FORMA_PAGAMENTO ASC";
  $consulta_pagamento = mysqli_query($conexao, $query);



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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
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

        <h1 align="ls-txt-center" class="ls-title-intro ls-ico-hours"> <a style="text-decoration: none; color:#000000;" href="movimentacoes.php">Movimentações</a>  </h1>

        <h1  style="color: #FF7F00;" align="center"> Adicionar Nova Movimentação </h1><br>
          <?php if(isset($_GET['sucesso'])){ ?>    <!-- sucesso ao cadastrar dados de perfil-->
                  <br>
                    <div class="ls-alert-success ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Dados cadastrados com sucesso. </div>   
            <?php } ?>
              

              <div align="center" >

                <form  action="../inserir_novaMovimentacao.php" class="ls-form" method="post">

                <table class="ls-table ls-bg-header ls-table-bordered">

                  <thead >
                    <tr>
                      <th></th>
                      <th "></th>
                      <th></th>
                      <th> </th>
                    </tr>
                  </thead><br>

                  <tbody>

                     <tr>
                      <td></td>
                      <td></td>
                      <td class="ls-text-lg"> </td>
                      <td> </td>
                    </tr>
                    
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)" >  <label class="ls-color-info"> <b> Tipo de Lançamento:  </b> </label> </td>
                      <td> <div class="ls-custom-select">
                        <select name=" lancamento" class="ls-select">
                          <option> Receita </option>
                          <option> Despeza </option>    
                        </select>
                      </td></div>
                      <td></td>
                    </tr>

                     <!-- imput do campo data de Descrição --> 
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)"> <label class="ls-color-info "> <b> Descrição: </b> </label></td>
                      <td> <input type="text" name="descricao" placeholder="descrição" required  autocomplete="off"></td>
                      <td></td>
                    </tr>

                     <!-- imput do campo data de valor --> 
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)" >  <label class="ls-color-info"> <b>Valor: </b> </label></td>
                      <td><input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" name="valor" class="ls-mask-money ls-no-spin"  placeholder="  #.##0,00" required >
                      </td>
                      <td></td>
                    </tr>

                     <!-- imput do campo data de categoria--> 
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)"><label class="ls-color-info"> <b> Categoria: </b> </label></td>
                      <td><div class="ls-custom-select"> 
                        <select name="categoria" type="text" class="ls-select">
                        <?php 

                          while ($linha = mysqli_fetch_array($consulta_categoria)){
                            echo '<option value="'.$linha['DESC_CATEGORIA'].'">'.$linha['DESC_CATEGORIA'].'</option>';

                            // esse while está colocando os cmapos da tabela categoria dentro do menu select do formulario.
                            // a variavel $linha recebe uma função que busca cada linha da tabela
                          }

                        ?>
                        
                      </select></div>
                      </td>
                      <td></td>
                    </tr>

                     <!-- imput do campo data de pagamento --> 
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)" ><label class="ls-color-info"> <b> Data pagamento: </b> </label></td>
                      <td> <input type="date"  name="data_pagamento"  placeholder="Data Pagamento" autocomplete="off" ></td>
                      <td></td>
                    </tr>


                     <!-- imput do campo data de Vencimento --> 
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)" > <label class="ls-color-info"> <b> Data Vencimento: </b> </label> </td>
                      <td> <input type="date"  name="data_vencimento"  placeholder="Data vencimento" autocomplete="off" ></td>
                      <td></td>
                    </tr>


                    <!-- imput do campo Forma de pagamento -->
                     <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)" > <label class="ls-color-info"> <b> Forma pagamento:  </b> </label> </td>
                      <td><div class="ls-custom-select">
                       <select name=" forma_pagamento" class="ls-select">

                        <?php 

                            while($linha= mysqli_fetch_array($consulta_pagamento))
                            {
                              echo '<option value="'.$linha['FORMA_PAGAMENTO'].'">'.$linha['FORMA_PAGAMENTO'].'</option>';
                            }

                         ?>
                          
                      </select></div>
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


                    <!-- imput do campo Parcelo--> 
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)" > <label class="ls-color-info" > <b> Parcelado: </b> </label></td>
                      <td> <div class="ls-custom-select">
                         <select id="mySelect" name=" parcela" class="ls-select">
                              <option> Não</option>
                              <option> Sim </option>
                            </select>
                      </td></div>
                      <td></td>
                    </tr>

                    

                      
                    </div>


                      <!-- imput do campo qtd parcelas--> 
                    
                    <tr>
                      <td></td>
                      <td class="ls-text-lg ls-txt-right (-xs, -sm)" >  <label class="ls-color-info"> <b> Qtd de Parcelas: </b> </label></td>
                      <td> <div class="ls-custom-select">
                        <div id="inputOculto">
                         <select name=" parcelado" class="ls-select">
                              <?php  
                                for ($i=1; $i<=36; $i++)
                                {
                                  echo "<option> $i </option>";
                                }  
                              ?>
                              
                            </select> </div>
                      </td> </div>
                      <td></td>
                    </tr>
                      


                    <tr>
                      <td></td>
                      <td></td>
                      <td class="ls-text-lg"> </td>
                      <td> </td>
                    </tr>



                    <thead > <!-- acabamento de borda colorida na base da tabela -->
                    <tr>
                      <th></th>
                      <th "></th>
                      <th></th>
                      <th> </th>
                    </tr>
                  </thead>

                  </tbody>
                </table> 
                
                
                <input id="salvar" class="ls-btn-danger ls-btn-lg ls-col-md " type="submit" name="salvar" value="Salvar"> 
                <input id="cancelar" class="ls-btn-dark ls-btn-lg " type="reset" name="cancelar" value="Cancelar"> 

                <style type="text/css">
                  #salvar{
                    width: 150px;
                  }
                  #cancelar{
                    width: 150px;
                  }
                </style> 
                                

                </fieldset>
                </div>
                <br><br>
    </main>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#inputOculto').hide();
        $('#mySelect').change(function() {
          if ($('#mySelect').val() == 'Sim') {
            $('#inputOculto').show();
          } else {
            $('#inputOculto').hide();
          }
        });
      });

    </script>



    <!-- We recommended use jQuery 1.10 or up -->
    
    <script src="../js/jquery-2.1.0.min.js" type="text/javascript"></script>
    <script src="../js/locastyle.js" type="text/javascript"></script>
    <script  src="../js/jquery-mask.js" type="text/javascript"></script>
  </body>
</html>