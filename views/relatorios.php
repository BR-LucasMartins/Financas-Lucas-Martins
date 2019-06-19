 <?php  
  session_start();
  include '../verifica_sessao.php';
  include '../conexao.php';


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
        <h1 align="center" class="ls-title-intro ls-ico-stats"> Relatórios </h1>

        
  <div class="ls-box ">
    <div class="row">
      <div class="col-md-2 ls-txt-center">
      <span class="ls-ico-alone ls-ico-chart-bar-up"></span>
      </div>
      <div class="col-md-10">
        
          <h3 class="ls-title-5"><strong>Monte seu Relatório</strong></h3><br>
          <p> selecione os campos abaixo e busque as informações mais relevantes para sua necessidade. Para uma pesquisa<br> mais detalhada utilize o botão ao lado e combine mais filtros para uma busca específica.</p>
      </div>
      
      </div>
    </div>
    
 <div>
       <a class="ls-float-right (-xs, -sm) ls-btn-primary-danger" title="Combine campos para uma busca mais específica" href="#" data-ls-module="modal" data-target="#filtroAvancado"> # Fazer uma Busca  Avançada</a>
      </label>
   </div> <br><br><br><hr>

    <div data-ls-module="collapse" data-target="#30" class="ls-collapse ">
    <a href="#" class="ls-collapse-header">
      <h3 class="ls-collapse-title ls-text-lg">
        <b> #Gastos por Descrição </b>
      </h3>
    </a>
    <div class="ls-collapse-body" id="30">

        <p> veja o quanto você gastou com um determinado produto ou despeza, por exemplo, total de gastos com conta de luz. </p><br>
      <form action="../relatorios/descricao.php" method="post" class="ls-form ls-form-inline">
            <label class="ls-label ">
              <b class="ls-label-text ls-text-md ls-color-info">Período</b>
              <input type="date" name="data_inicio" autocomplete="off">
            </label>

            <label class="ls-label ">
              <b class="ls-label-text ls-text-md">a</b>
              <input type="date"  name="data_fim"  autocomplete="off" >
            </label> &nbsp; & &nbsp;

             <label class="ls-color-info "> <b> Descrição: </b> </label>

            <input type="text" name="descricao" autocomplete="off">  
               
              <input class="ls-btn" type="submit" name="Filtrar" value="Filtrar">
            </form>


    </div>
  </div><br>  

   <div data-ls-module="collapse" data-target="#30" class="ls-collapse ">
    <a href="#" class="ls-collapse-header">
      <h3 class="ls-collapse-title ls-text-lg">
        <b>#Buscar Contas por Categoria </b>
      </h3>
    </a>
    <div class="ls-collapse-body" id="30">

      <p> veja todos os lançamentos de uma categoria específica: </p><br>
      <form action="../relatorios/categoria.php" method="post" class="ls-form ls-form-inline ">
                    <label class="ls-label  col-md-6 col-sm-4">
                      <b class="ls-label-text ls-color-info">Filtrar por Categoria</b>
                      <div class="ls-custom-select">
                        <select name="categoria" class="ls-select">
                          <?php  

                            $sql = "SELECT * FROM categoria ORDER BY DESC_CATEGORIA ASC";
                            $categoria = Mysqli_query($conexao, $sql);

                            while ($row = mysqli_fetch_array($categoria)){
                            echo '<option value="'.$row['DESC_CATEGORIA'].'">'.$row['DESC_CATEGORIA'].'</option>';
                         }
                          ?>
                        </select>
                      </div>
                    </label>&nbsp;
                    <input type="submit" value="Filtrar" class="ls-btn" title="Filtrar">
                  </form>
    </div>
  </div> <br> 


  <div data-ls-module="collapse" data-target="#30" class="ls-collapse ">
    <a href="#" class="ls-collapse-header">
      <h3 class="ls-collapse-title ls-text-lg">
        <b>#Buscar por Contas Pagas/Pendentes</b>
      </h3>
    </a>
    <div class="ls-collapse-body" id="30">

       <p> veja a situação de suas contas: </p><br>

      <form action="../relatorios/situacao.php" class="ls-form" method="post">  
       
    <label class="ls-label  col-md-4 col-sm-4">
      <b class="ls-label-text ls-color-info">Filtrar por Situação</b><br>
      <div class="ls-custom-select">
        <select name="filtroSituacao" class="ls-select">
          <option>Pago</option>
          <option>Pendente</option>
          </select> 
      </div>
    </label>
    <input class="ls-btn" type="submit" name="filtrar" value="filtrar">

  </form>     
    </div>
  </div>  <br>


  <div data-ls-module="collapse" data-target="#30" class="ls-collapse ">
    <a href="#" class="ls-collapse-header">
      <h3 class="ls-collapse-title ls-text-lg">
        <b>#Status Rendimento do Mês</b>
      </h3>
    </a>
    <div class="ls-collapse-body" id="30">

        <p> veja o status de seu dinheiro no prazo de 30 dias </p><br>
      <form action="../relatorios/rendimento.php" method="post" class="ls-form ls-form-inline">
            <label class="ls-label ">
              <b class="ls-label-text ls-text-md ls-color-info">Período</b>
              <input type="date" name="data_pagamento" autocomplete="off">
            </label>

            <label class="ls-label ">
              <b class="ls-label-text ls-text-md">a</b>
              <input type="date"  name="data_vencimento"  autocomplete="off" >
            </label>      
              <input class="ls-btn" type="submit" name="Filtrar" value="Filtrar">
            </form>
    </div>
  </div><br>  
    

    <div data-ls-module="collapse" data-target="#30" class="ls-collapse ">
    <a href="#" class="ls-collapse-header">
      <h3 class="ls-collapse-title ls-text-lg">
        <b>#Cartão/Dinheiro</b>
      </h3>
    </a>
    <div class="ls-collapse-body" id="30">

        <p> veja suas compras por cartões de crédito/débito ou cédulas </p><br>

      <form action="../relatorios/tipo.php" class="ls-form" method="post">  
       
    <label class="ls-label  col-md-4 col-sm-4">
      <b class="ls-label-text ls-color-info">Filtrar por Situação</b><br>
      <div class="ls-custom-select">
        <select name="filtroTipo" class="ls-select">
          <option>Crédito</option>
          <option>Débito</option>
          <option>Dinheiro</option>
          </select> 
      </div>
    </label>
    <input class="ls-btn" type="submit" name="filtrar" value="filtrar">

  </form>     
    </div>
    </div>


  </div>
 </main>
 <div id="div">
   <style> #div{height: 350px;} </style>
 </div>

     <!-- ## -------------------------------------------------------------------------------------------------------##-->         

<!-- Modal do filtro Avançado-->
    <div class="ls-modal" id="filtroAvancado">
  <form action="../relatorios/avancado.php" class="ls-form" method="post">
    <div class="ls-modal-large">
      <div class="ls-modal-header">
        <button data-dismiss="modal">×</button>
        <h4 style="color: #FF7F00;"  class="ls-modal-title"> Pesquisa Avançada </h4>
      </div>

      <div class="ls-modal-body">

        <label>
              <b class="ls-label-text ls-text-md ls-color-info">Selecione um Período de tempo</b></label>
              <input type="date" name="data_pagamento" autocomplete="off">
            &nbsp;
            <label>
              <b class="ls-label-text ls-text-md">a</b></label> &nbsp;
              <input type="date"  name="data_vencimento"  autocomplete="off" ><br>
             
          <br>
        <label class="ls-label  col-md-6 col-sm-4">
           <b class="ls-label-text ls-color-info">Categoria</b></label>
              <div class="ls-custom-select">
                <select name="categoria" class="ls-select">
                   <?php  

                     $sql = "SELECT * FROM categoria ORDER BY DESC_CATEGORIA ASC";
                      $categoria = Mysqli_query($conexao, $sql);

                      while ($row = mysqli_fetch_array($categoria)){
                      echo '<option value="'.$row['DESC_CATEGORIA'].'">'.$row['DESC_CATEGORIA'].'</option>';
                    }
                    ?>
            </select>
          </div>
      
       <br><br>
 

    <label class="ls-label  col-md-8 col-sm-4">
      <b class="ls-label-text ls-color-info"> Status de Pagamento: </b><br>
      <div class="ls-custom-select">
        <select name="filtroSituacao" class="ls-select">
          <option>Pago</option>
          <option>Pendente</option>
          
          </select>
      </div>
    </label>

     <label class="ls-label  col-md-8 col-sm-4">
      <b class="ls-label-text ls-color-info"> Tipo: </b><br>
      <div class="ls-custom-select">
        <select name="filtroTipo" class="ls-select">
          <option>Crédito</option>
          <option>Débito</option>
           <option>Dinheiro</option>
          </select>
      </div>
    </label>
     
      </div>
      <div class="ls-modal-footer">
        <input class="ls-btn-primary" type="submit" name="buscar" value="Buscar">
        <a href="#" class="ls-btn ls-float-right" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </form>
</div>


    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>