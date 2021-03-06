<?php 

 session_start();
  include '/../verifica_sessao.php';
  include '/../conexao.php';

$id_usuario = $_SESSION['id_usuario'];
$filtroCategoria = $_POST['categoria'];

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
        <h1 align="center" class="ls-title-intro ls-ico-hours"> Movimentações </h1>

            <table class="ls-table ls-no-hover ">
              <tr>
                <td width="600px;">
                  <form action="../filtros/filtro_categoria.php" method="post" class="ls-form ls-form-inline ">
                    <label class="ls-label  col-md-9 col-sm-4">
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

              <a id="recarregar" href="../views/movimentacoes.php" title="Recarregar" class="ls-btn ls-ico-spinner">
            </a>
            </form>
            </td>     
        </tr>
    </table>
        
           
<!-- ########################################################################################################## -->
             <div>       
                  <table class="ls-table ls-bg-header ls-table-striped ls-table-bordered">
                  <thead>
                    <tr>
                      <th class="ls-txt-center">Descrição </th>
                      <th class="ls-txt-center" >Valor</th>
                      <th class="ls-txt-center">Categoria</th>
                      <th class="ls-txt-center">Data Pagamento</th>
                      <th class="ls-txt-center"> Data Vencimento</th>
                      <th class="ls-txt-center"> Forma Pagamento</th>
                      <th class="ls-txt-center"> Tipo</th>
                      <th class="ls-txt-center"> Situação</th>
                      <th class="ls-txt-center">Opções</th>
                    </tr>
                  </thead>
                  <tbody>
                  
              <?php  

                $query = "SELECT * FROM movimentacoes WHERE idUSUARIO = '$id_usuario' AND CATEGORIA = '$filtroCategoria'  
                ORDER By idFINANCAS DESC";
                $resultado = Mysqli_query($conexao, $query);

                if(mysqli_num_rows($resultado) <= 0)
                {
                  
                  ?> <p class="ls-text-md ls-color-danger"> Nenhum Resultado foi encontrado.</p>
                 

                <?php }

                while ($linha = mysqli_fetch_array($resultado))
                {
                  $data_pagamento = $linha['DATA_PAGAMENTO'];
                  $data_vencimento = $linha['DATA_VENCIMENTO'];
                  $valor = $linha['VALOR'];
                  $situacao = $linha['SITUACAO'];

                   $valor = number_format($valor, 2,',','.'); 

                  $data1 = implode("-",array_reverse(explode("-",$data_pagamento)));
                  $data2 = implode("-",array_reverse(explode("-",$data_vencimento)));

                  // essas duas funçoes quebram a string no formato Y/m/d e junta no formato d/m/Y.

                  ?>
                  <tr><td class="ls-txt-center"> <?php echo $linha['DESCRICAO'];?></td>

                   <?php if($valor <= 0){ ?>
                  <td class="ls-txt-center" > <span style="color: red;">R$ <?php echo $valor;?></td> </span> 
                   <?php } 
                   else { ?>
                  <td class="ls-txt-center" > <span style="color: green;">R$ <?php echo $valor;?></td> </span>
                  <?php } ?>

                  <td class="ls-txt-center" width="250px;"><?php echo $linha['CATEGORIA'];?></td>
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
                    <td class="ls-txt-center"> 

                      <a href="../alterar_movimentacao.php?editar=<?php echo($linha['idFINANCAS'])?>" class="ls-tooltip-bottom" aria-label="Editar"><i class="ls-ico-edit-admin ls-text-xl"> </i> </a> &nbsp; &nbsp; 

                        <a href="" data-ls-module="modal" class="ls-tooltip-bottom" aria-label="Excluir" data-action="../movimentacoes_opcoes.php?excluir=<?php echo($linha['idFINANCAS']) ?>" data-content="<h2> Deseja mesmo excluir está informação ? </h2> <br><p> Aviso , está ação não pode ser revertida , ao clicar em aceitar os dados serão apagados permanentemente da sua base de dados. </p>" data-title="Excluir" data-class="ls-btn-danger" data-save="Sim" data-close="Fechar"> <i class="ls-ico-remove ls-text-xl"></i></a></td>
                        
                        
                    </td></tr>
                  
              <?php

                }

              ?>

       </tbody>            
    </main>


      

    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>
