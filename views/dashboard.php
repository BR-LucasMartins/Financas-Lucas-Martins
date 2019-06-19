<?php 

  session_start();
  include '../verifica_sessao.php';
  include '../conexao.php';

  $id_usuario = $_SESSION['id_usuario'];

  // aqui pega o total das receitas que foram pagas

  $query = "SELECT SUM(VALOR) as total FROM movimentacoes WHERE SITUACAO = 'Pago' AND LANCAMENTO = 'Receita' AND idUSUARIO = '$id_usuario' ";

      $total = mysqli_query($conexao, $query);

                while ($linha = mysqli_fetch_array($total))
                {
                  $soma_receita = number_format($linha['total'], 2,'.',''); 
                }

                if ($soma_receita < 0){
                  $soma_receita = $soma_receita*(-1);
                }
              ?>

              <?php  

              // aqui soma o total das despezas pagas.

    $query = "SELECT SUM(VALOR) as total FROM movimentacoes WHERE SITUACAO = 'Pago' AND LANCAMENTO = 'Despeza' AND 
    idUSUARIO = '$id_usuario' ";

    $total = mysqli_query($conexao, $query);


            while ($linha = mysqli_fetch_array($total))
            {
               $soma_despeza = number_format($linha['total'], 2,'.',''); 
            }

            if ($soma_despeza < 0){
                $soma_despeza= $soma_despeza*(-1);
            }
            ?>

            <?php  

            // saldo = total receitas - total despezas

            $saldo = $soma_receita - $soma_despeza;
            $saldo = number_format($saldo, 2,',','.'); 


            // aqui pega data e valor do ultimo pagamento recebido.
            $query = "SELECT VALOR , DATA_VENCIMENTO FROM movimentacoes WHERE CATEGORIA = 'SALÁRIO' AND 
             idUSUARIO = '$id_usuario' ORDER BY DATA_VENCIMENTO DESC LIMIT 1 ";
            $resultado = mysqli_query($conexao, $query);


            // validação caso o usuario seja novo e não possua salarios cadastrados ainda.
            if(mysqli_num_rows($resultado) != 0){

            while ($linha = mysqli_fetch_array($resultado)){

             $data_salario1 = $linha['DATA_VENCIMENTO'];
             $valor_salario1 = $linha['VALOR'];
            }

            $data_salario = implode("/",array_reverse(explode("-",$data_salario1)));
            $valor_salario = number_format($valor_salario1, 2,',','.');

            }


            // calcula o total de contas pendentes

            
            $query = "SELECT SUM(VALOR) as total FROM movimentacoes WHERE SITUACAO = 'Pendente' AND LANCAMENTO = 'Despeza' AND 
            idUSUARIO = '$id_usuario' ";

            $total = mysqli_query($conexao, $query);

            if(mysqli_num_rows($resultado) != 0) {

            while ($linha = mysqli_fetch_array($total))
            {
              $total_despeza = $linha['total'];
            }



            if ($total_despeza < 0){
              $total_despeza= $total_despeza*(-1);
            }

              $total_despeza = number_format($total_despeza, 2,',','.'); 
            }

            

             // pega  o numero de contas pendentes

            $query = "SELECT COUNT(idFinancas) AS total FROM movimentacoes WHERE SITUACAO = 'Pendente' 
            AND idUSUARIO ='$id_usuario'";

            $total = mysqli_query($conexao,$query);

            while ($linha = mysqli_fetch_array($total))
            {
              $num_pendentes = $linha['total']; 
            }


            // pega o numero de contas pagas.

            $query = "SELECT COUNT(idFinancas) AS total FROM movimentacoes WHERE SITUACAO = 'Pago' AND LANCAMENTO = 'Despeza'
            AND idUSUARIO ='$id_usuario'";

            $total = mysqli_query($conexao,$query);

            while ($linha = mysqli_fetch_array($total))
            {
              $num_pagos = $linha['total']; 
            }

         
            // query busca a despeza com maior valor o banco de dados.

            $query = "SELECT * FROM movimentacoes WHERE  VALOR = (SELECT MIN(VALOR) FROM movimentacoes WHERE
            LANCAMENTO = 'Despeza' AND idUSUARIO = '$id_usuario') ORDER BY DATA_VENCIMENTO DESC LIMIT 1";
            $resultado = mysqli_query($conexao, $query);

            if(mysqli_num_rows($resultado) != 0) {

            while ($linha = mysqli_fetch_array($resultado))
            {

            $menor_descricao = $linha['DESCRICAO'];
            $menor_valor = $linha['VALOR'];
            $menor_categoria = $linha['CATEGORIA'];
            $menor_data = $linha['DATA_VENCIMENTO'];
           $menor_situacao = $linha['SITUACAO'];
          }

        $menor_data = implode("/",array_reverse(explode("-",$menor_data)));
         }

        // query busca a despeza com menor valor no banco de dados
           $query = "SELECT * FROM movimentacoes WHERE VALOR = (SELECT MAX(VALOR) FROM movimentacoes WHERE
          LANCAMENTO = 'Despeza' AND idUSUARIO = '$id_usuario')  ORDER BY DATA_VENCIMENTO ASC LIMIT 1";
          $resultado = mysqli_query($conexao, $query);

          if(mysqli_num_rows($resultado) != 0) {

          while ($linha = mysqli_fetch_array($resultado))
          {

            $maior_descricao = $linha['DESCRICAO'];
            $maior_valor = $linha['VALOR'];
            $maior_categoria = $linha['CATEGORIA'];
            $maior_data = $linha['DATA_VENCIMENTO'];
            $maior_situacao = $linha['SITUACAO'];
           }


          if($maior_valor < 0 ){
           $maior_valor = $maior_valor *(-1);
          } 

        if($menor_valor < 0){
       $menor_valor = $menor_valor *(-1);
    }

    $maior_data = implode("/",array_reverse(explode("-",$maior_data)));
    $maior_valor = number_format($maior_valor, 2,',','.');
    $menor_valor = number_format($menor_valor, 2,',','.'); 

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
           <li><a href="relatorios.php" class="ls-ico-stats" title="Relatórios da revenda">Relatórios</a></li>
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
      <h1 class="ls-title-intro ls-ico-dashboard">Dashboard</h1>
      <p align="right"> “Regra número 1: nunca perca dinheiro. Regra número 2: não esqueça a regra número1”.<br> Warren Buffett. </p>

<div class="ls-alert-box ls-dismissable">
  <header class="ls-info-header">
    <h2 class="ls-title-4">Patrimônio</h2>
    
  </header><!-- /header -->
  
  <h3 class="ls-title-5"></h3>
  <table class="ls-table ls-table-striped">
    <tbody>
      <tr>
        <td><strong> Saldo Atual: </strong> &nbsp;&nbsp; <span style="color: green; font-size: 16pt;">R$&nbsp;
          <?php echo $saldo; ?>. </span></td>
      </tr>
      <tr>
        <td><strong> Último Sálario:</strong> &nbsp;&nbsp; recebido em <span class="ls-color-info"> &nbsp; <?php 
        if(isset($data_salario)) { echo $data_salario; } ?> </span> &nbsp; - &nbsp;  Valor: &nbsp; <span style="color: green;"> R$&nbsp; <?php
        if(isset($valor_salario)){ echo $valor_salario; } ?></span> 
        </td>
      </tr>
       <tr>
        <td>
          <strong>Valor total das despezas em aberto:</strong>&nbsp;&nbsp; <span style="color: red;"> 
            <?php if(isset($total_despeza)){ ?>
          R$  <?php echo $total_despeza; }?> </span>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <h2 class="ls-title-3">Relatório diário</h2>
    
  </header>

  <div id="sending-stats" class="row">
    <div class="col-sm-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4">Total de Contas Pendentes
            <a href="#" class="ls-ico-help" data-trigger="hover" data-ls-module="popover" data-placement="bottom" data-custom-class="ls-width-300" data-content="<p>Este número corresponde á todos lançamentos registrados no sistema , cujo a situação do pagamento está em aberto. Algumas podem ser referentes aos próximos meses. Para consultar o vencimento das suas contas vá no menu Movimentações.</p>"></a></h6>

        </div>
        <div class="ls-box-body">
          <span class="ls-board-data"><br>
            
            <strong><span style="color: red;"> <?php echo $num_pendentes ?> </span> </strong>
          </span>
        </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4">Valor Conta mais Cara</h6>
        </div>
        <div class="ls-box-body">
          <span style="font-size: 12pt;">

            <?php if(isset($menor_valor)){ ?>

            <strong>R$  <?php echo $menor_valor ?> </strong>
          </span><br><br>
          <p style="font-size: 10pt;" class=" ls-color-info"> <?php echo "$menor_descricao - $menor_categoria <br> $menor_data -";
            if ($menor_situacao == 'Pago') { ?> 
              <span style="color: green; font-size: 10pt;"> <?php echo "$menor_situacao"; 
            ?></span> <?php } 

            else { ?>  
            <span style="color: red; font-size: 10pt;"> <?php echo "$menor_situacao"; ?></span>
          <?php } }?> </p>
        </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4">valor Conta mais Barata</h6>
        </div>
        <div class="ls-box-body">
          <span class="ls-board-data">

            <?php if (isset($maior_valor)) { ?>
            <strong>R$  <?php echo $maior_valor ?></strong>
          </span><br><br>
          <p style="font-size: 10pt;" class=" ls-color-info"> <?php echo "$maior_descricao - $maior_categoria <br> $maior_data -";
            if ($maior_situacao == 'Pago') { ?> 
              <span style="color: green; font-size: 10pt;"> <?php echo "$maior_situacao"; 
            ?></span> <?php } 

            else { ?>  
            <span style="color: red; font-size: 10pt;"> <?php echo "$maior_situacao"; ?></span>
          <?php } } ?> </p>        
            
        </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4"> Total de Contas Pagas</h6>
        </div>
        <div class="ls-box-body">
          <span class="ls-board-data">
            
            <strong> <span style="color: green;"> <?php echo $num_pagos ?> </span> </strong>
          </span> <br>
          <p style="font-size: 10pt;" > Parabéns. Você já acumulou <br> um total de <span class="ls-color-info"> <?php echo $num_pagos; ?> </span>
           contas pagas.</p>
        
        </div>
      </div>
    </div>

  </div>
  <hr class="ls-no-border">
  <div id="panel-charts-2" class="ls-clear-both"></div>
</div>

<div class="ls-alert-box ls-dismissable">
  
    <h2 class="ls-title-4">Suas Últimas Contas pagas </h2>

  </div>
  <h3 class="ls-title-5"></h3>
  <table class="ls-table ls-table-striped">
  <tbody>
  <?php  

      $query = "SELECT * FROM movimentacoes WHERE idUSUARIO = '$id_usuario' AND SITUACAO = 'Pago' AND LANCAMENTO = 'Despeza'  ORDER BY DATA_PAGAMENTO DESC LIMIT 4";

      $resultado = mysqli_query($conexao,$query);

      while ($linha = mysqli_fetch_array($resultado)){

          $descricao = $linha['DESCRICAO'];
          $valor = number_format($linha['VALOR'], 2,',','.');
          $categoria = $linha['CATEGORIA'];
          $data_pagamento = $linha['DATA_PAGAMENTO'];
          $forma_pagamento = $linha['FORMA_PAGAMENTO'];

          if($valor < 0)
          {
            $valor = $valor*(-1);
          }

          $valor = number_format($valor, 2,',','.');
          
          $data = implode("/",array_reverse(explode("-",$data_pagamento))); ?>





          <tr>
        <td>
           <i style="color: green;" class="ls-ico-checkmark"> </i> 
              <span style="color: green;"><?php echo "$descricao &nbsp;&nbsp;  - &nbsp;&nbsp; R$ $valor 
              &nbsp;&nbsp;  - &nbsp; &nbsp; $categoria &nbsp;&nbsp;   - &nbsp;&nbsp;  $data &nbsp;&nbsp;   - 
              &nbsp;&nbsp;  $forma_pagamento "; ?> </span>
            
        </td>
      </tr>

    <?php  }

  ?>
  
  </main>

    

    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>
