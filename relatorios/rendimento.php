 <?php  
  session_start();
  include '../verifica_sessao.php';
  include '../conexao.php';

  $data_pg = $_POST['data_pagamento']; 
  $data_vc = $_POST['data_vencimento'];
  $id_usuario = $_SESSION['id_usuario'];
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
          <li><a href="../views/usuarios.php">Meus dados</a></li>
          <li><a href="../logout.php">Sair</a></li>
         </ul>
      </nav>
    </div>
  </div>

  <span class="ls-show-sidebar ls-ico-menu"></span>

  <a href="javascript:window.history.go(-1)" class="ls-go-next"> <span class="ls-text"> Voltar</span></a>

  <!-- Nome do produto/marca com sidebar -->
    <h1 class="ls-brand-name">
      <a href="../views/home.php" class="ls-ico-earth">
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
           <li> <a href="../views/dashboard.php" class="ls-ico-dashboard" title="Dashboard"> Dashboard </a> </li>
           <li><a href="../views/movimentacoes.php" class="ls-ico-hours" title="Clientes">Movimentações</a></li>
           <li><a href="../views/relatorios.php" class="ls-ico-stats" title="Relatórios da revenda">Relatórios</a></li>
           <li>
            <a href="#" class="ls-ico-cog" title="Configurações">Configurações</a>
            <ul>
              <li><a href="../views/usuarios.php">Usuarios</a></li>
               <li><a href="../views/categorias.php">Categorias</a></li>
              <li><a href="../views/forma_pagamento.php">Formas de pagamento</a></li>

            </ul>
          </li>
        </ul>
      </nav>
  </div>
</aside>


    <main class="ls-main ">
      <div class="container-fluid">
        <h1 align="center" class="ls-title-intro ls-ico-stats"> Relatórios </h1>

         <?php  

          $query = "SELECT * FROM movimentacoes WHERE idUSUARIO = '$id_usuario' AND DATA_VENCIMENTO
                BETWEEN ('$data_pg') AND ('$data_vc')";
          $resultado = mysqli_query($conexao, $query); 
          $num_linhas = mysqli_num_rows($resultado);

          $data1 = implode("-",array_reverse(explode("-",$data_pg)));
          $data2 = implode("-",array_reverse(explode("-",$data_vc)));

          if($num_linhas <= 0){ ?>

            <h3 style="color: red;"> Nenhum lançamento Encontrado! </h3> 
          <?php }

          else {

        ?>     
        
         <ul>

          <li><p class="ls-text-md"><b> Todos os  lançamentos entre:</b> &nbsp; <span class="ls-color-info"> <?php echo $data1; ?></span> &nbsp; e &nbsp;
                  <span class="ls-color-info"> <?php echo $data2; ?>.</span></p></li>
         <li> <p class="ls-text-md"><b> Total de registros encontrados: </b> &nbsp;<span class="ls-color-info"> <?php echo $num_linhas ?>. </span></p></li>

              <?php  

                $query = "SELECT SUM(VALOR) as total FROM movimentacoes WHERE DATA_VENCIMENTO
                BETWEEN ('$data_pg') AND ('$data_vc') AND LANCAMENTO = 'Receita' AND idUSUARIO = '$id_usuario' ";
                $total = mysqli_query($conexao, $query);

                while ($linha = mysqli_fetch_array($total))
                {
                  $soma_receita = number_format($linha['total'], 2,'.',''); 
                }

                if ($soma_receita < 0){
                  $soma_receita = $soma_receita*(-1);
                }
              ?>

             <li> <p class="ls-text-md"><b> valor Total das receitas do mês: </b> <span style="color: green;" > &nbsp;<?php echo $soma_receita; ?> R$.</span> </p> </li>

              <?php  

                $query = "SELECT SUM(VALOR) as total FROM movimentacoes WHERE DATA_VENCIMENTO
                BETWEEN ('$data_pg') AND ('$data_vc') AND LANCAMENTO = 'Despeza' AND idUSUARIO = '$id_usuario' ";
                $total = mysqli_query($conexao, $query);

                while ($linha = mysqli_fetch_array($total))
                {
                  $soma_despeza = number_format($linha['total'], 2,'.',''); 
                }

                if ($soma_despeza < 0){
                  $soma_despeza= $soma_despeza*(-1);
                }
              ?>

             <li> <p class="ls-text-md"><b> valor Total das Despezas do mês: </b> <span style="color: red;"> &nbsp;<?php echo $soma_despeza ?> R$.</span> </p> </li>

              <?php  

                $saldo = $soma_receita - $soma_despeza;
                $saldo = number_format($saldo, 2,'.',''); 

              ?>

              <li> <p class="ls-text-md"><b> Saldo Final do Mês: </b> <span style="color: green;"> &nbsp;<?php echo $saldo ?> R$.
              </span> </p> </li>
                <br>
              </ul> 


              <button class="ls-btn-primary" id="imprimir" onclick="myFunction()"> Imprimir </button>
              <style type="text/css"> #imprimir{width: 100px;}</style>

                <table class="ls-table ls-bg-header ls-table-striped ls-table-bordered">
                  <thead>
                    <tr>
                      <th width="180px;" class="ls-txt-center">Descrição </th>
                      <th class="ls-txt-center" >Valor</th>
                      <th width="180px;" class="ls-txt-center">Categoria</th>
                      <th width="130px;" class="ls-txt-center">Data Pagamento</th>
                      <th width="130px;" class="ls-txt-center"> Data Vencimento</th>
                      <th class="ls-txt-center"> Forma Pagamento</th>
                      <th class="ls-txt-center"> Tipo</th>
                      <th class="ls-txt-center"> Situação</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php   
                  while ($linha = mysqli_fetch_array($resultado))
                  {
                  $data_pagamento = $linha['DATA_PAGAMENTO'];
                  $data_vencimento = $linha['DATA_VENCIMENTO'];
                  $valor = $linha['VALOR'];
                  $situacao = $linha['SITUACAO'];

                  $data1 = implode("-",array_reverse(explode("-",$data_pagamento)));
                  $data2 = implode("-",array_reverse(explode("-",$data_vencimento)));

                  // essas duas funçoes quebram a string no formato Y/m/d e junta no formato d/m/Y.

                  $valor = number_format($valor, 2,',','.');

                  ?>
                  <tr><td class="ls-txt-center"> <?php echo $linha['DESCRICAO'];?></td>

                  <?php if($valor <= 0){ ?>
                  <td class="ls-txt-center" > <span style="color: red;">R$ <?php echo $valor;?></td> </span> 
                   <?php } 
                   else { ?>
                  <td class="ls-txt-center" > <span style="color: green;">R$ <?php echo $valor;?></td> </span>
                <?php } ?>

                  <td class="ls-txt-center" width="450px;"><?php echo $linha['CATEGORIA'];?></td>
                  <td class="ls-txt-center"> <?php echo"$data1"; ?></td>
                  <td class="ls-txt-center"> <?php echo "$data2"; ?></td>
                  <td class="ls-txt-center"><?php echo $linha['FORMA_PAGAMENTO'];?></td>
                  <td class="ls-txt-center" width="120px;"><?php echo $linha['TIPO'];?></td>

                  <?php if($situacao == 'Pago'){ ?>
                  <td class="ls-txt-center" > <span style="color: green;"> <?php echo $situacao;?></td> </span> 
                   <?php } 
                   else { ?>
                  <td class="ls-txt-center" > <span style="color: red;"> <?php echo $situacao;?></td> </span>
                <?php } ?> 

                </td></tr>

            <?php } 

          }

          ?>

        </tbody>

    </div>
</main>


<script>
        function myFunction(){
          window.print();
        }
      </script>

    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>