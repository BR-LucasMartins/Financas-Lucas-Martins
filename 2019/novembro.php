<?php  

  session_start();
  include '../verifica_sessao.php';
  include '../conexao.php';

$id_usuario = $_SESSION['id_usuario'];

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 0;    // verifica se existe um GET pagina

$movimentacao = "SELECT * FROM movimentacoes WHERE idUSUARIO = '$id_usuario'";  // pesquisa a tabela 
$resultato_movimentacao = mysqli_query($conexao, $movimentacao);

$num_linhas = mysqli_num_rows($resultato_movimentacao);  // pega o numero d elinhas na tabela
$itens_por_pagina = 10;  

$num_paginas = ceil($num_linhas/$itens_por_pagina);   // total d epaginas 

$inicio = ($itens_por_pagina*$pagina);                  


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
      <div class="container-fluid"><br>
        <h2 align="justify" style="color: #FF7F00;" align="center"> Histórico das Movimentações Novembro/2019</h2><br>

      
<div>
  <a id="recarregar" href="../views/movimentacoes.php" title="Recarregar" class="ls-btn ls-ico-spinner ls-float-right">
            </a>
  <!-- variavel $_SERVER envia o metjodo post para a propria pagina no [PHP_SELF] (termo referente a selfie auto) -->
  <form id="label" name="busca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscar" class="ls-form ls-form-inline ">
                <label  class="ls-label col-md-9 col-sm-4" role="search">
                  <b class="ls-label-text ls-hidden-accessible">Descrição</b>
                  <input type="text" id="palavra" name="palavra" aria-label="Faça sua busca por descrição" placeholder="Descrição" required="" autocomplete="off" class="ls-field ">
                </label>
                <div class="ls-actions-btn">
                  <input type="submit" value="Buscar" class="ls-btn" title="Buscar">
                </div>
                <style type="text/css"> #label{position: absolute; right: 80px;} </style>
              </form><br><br>


  <div data-ls-module="dropdown" class="ls-dropdown">
  <a href="#" class="ls-btn-dark ">2019</a>
  <ul class="ls-dropdown-nav">
       <li><a href="janeiro.php">Janeiro</a></li>
        <li><a href="fevereiro.php">Fevereiro</a></li>
        <li><a href="marco.php">Março</a></li>
        <li><a href="abril.php">Abril</a></li>
        <li><a href="maio.php">Maio</a></li>
        <li><a href="junho.php">Junho</a></li>
        <li><a href="julho.php">Julho</a></li>
        <li><a href="agosto.php">Agosto</a></li>
        <li><a href="setembro.php">Setembro</a></li>
        <li><a href="outubro.php">Outubro</a></li>
        <li><a href="novembro.php">Novembro</a></li>
        <li><a href="dezembro.php">Dezembro</a></li>
  </ul>  
</div>

   <div data-ls-module="dropdown" class="ls-dropdown">
  <a href="#" class="ls-btn-dark">2020</a>
  <ul class="ls-dropdown-nav">
       <li><a href="../2020/janeiro.php">Janeiro</a></li>
        <li><a href="../2020/fevereiro.php">Fevereiro</a></li>
        <li><a href="../2020/marco.php">Março</a></li>
        <li><a href="../2020/abril.php">Abril</a></li>
        <li><a href="../2020/maio.php">Maio</a></li>
        <li><a href="../2020/junho.php">Junho</a></li>
        <li><a href="../2020/julho.php">Julho</a></li>
        <li><a href="../2020/agosto.php">Agosto</a></li>
        <li><a href="../2020/setembro.php">Setembro</a></li>
        <li><a href="../2020/outubro.php">Outubro</a></li>
        <li><a href="../2020/novembro.php">Novembro</a></li>
        <li><a href="../2020/dezembro.php">Dezembro</a></li>
  </ul>  
</div>
<div data-ls-module="dropdown" class="ls-dropdown">
  <a href="#" class="ls-btn-dark">2021</a>
  <ul class="ls-dropdown-nav">
       <li><a href="../2021/janeiro.php">Janeiro</a></li>
        <li><a href="../2021/fevereiro.php">Fevereiro</a></li>
        <li><a href="../2021/marco.php">Março</a></li>
        <li><a href="../2021/abril.php">Abril</a></li>
        <li><a href="../2021/junho.php">Maio</a></li>
        <li><a href="../2021/julho.php">Junho</a></li>
        <li><a href="../2021/julho.php">Julho</a></li>
        <li><a href="../2021/agosto.php">Agosto</a></li>
        <li><a href="../2021/setembro.php">Setembro</a></li>
        <li><a href="../2021/outubro.php">Outubro</a></li>
        <li><a href="../2021/novembro.php">Novembro</a></li>
        <li><a href="../2021/dezembro.php">Dezembro</a></li>
  </ul>  
</div>

<?php  
  
      $query = "SELECT SUM(VALOR) as total FROM movimentacoes WHERE DATA_VENCIMENTO
          BETWEEN '2019-11-01' AND '2019-11-30' AND LANCAMENTO = 'Receita' AND idUSUARIO = '$id_usuario' ";
       $total = mysqli_query($conexao, $query);

          while ($linha = mysqli_fetch_array($total))
          {
           $soma_receita = number_format($linha['total'], 2,'.',''); 
          }

          if ($soma_receita < 0){
             $soma_receita = $soma_receita*(-1);
          }
            

           $query = "SELECT SUM(VALOR) as total FROM movimentacoes WHERE DATA_VENCIMENTO
          BETWEEN '2019-11-01' AND '2019-11-30' AND LANCAMENTO = 'Despeza' AND idUSUARIO = '$id_usuario' ";
          $total = mysqli_query($conexao, $query);

           while ($linha = mysqli_fetch_array($total))
            {
              $soma_despeza = number_format($linha['total'], 2,'.',''); 
            }

            if ($soma_despeza < 0){
               $soma_despeza= $soma_despeza*(-1);
            } 

                $saldo = $soma_receita - $soma_despeza;
                $saldo = number_format($saldo, 2,'.',''); 


?>

<div align="center">
  
   <a href="#" id="info" class="ls-btn-dark " data-ls-module="popover" data-title="Informações" 
   data-content="<p><b> Valor Total das despezas: &nbsp; </b> <span> <?php echo $soma_despeza ?> R$.</spam></p> <br>
    <p><b> Valor Total das receitas do mês: &nbsp; </b><span> <?php echo $soma_receita ?> R$.</spam></p> <br>
     <p><b> Saldo Final:</b> &nbsp; </b><span> <?php echo $saldo ?> R$.</spam> </P>" 
      data-placement="bottom">
                Informações <style > #info{width: 190px;}</style>
              </a>
</div>

 <?php 

 // Verificamos se a ação é de busca
 @ $a = $_GET['buscar'];

 @ $palavra = ($_POST['palavra']);

  ?>


</div>
<!-- ########################################################################################################## -->
        <?php if(isset($_GET['sucesso1'])){ ?>    <!-- sucesso ao alterar dados de perfil-->
                  <br>
                    <div class="ls-alert-success ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Dados alterados com sucesso. </div>   
            <?php } ?>

            <?php if(isset($_GET['sucesso2'])){ ?>    <!-- sucesso ao alterar dados de perfil-->
                  <br>
                    <div class="ls-alert-success ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Registro excluído com sucesso. </div>   
            <?php } ?>

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

                $query = "SELECT * FROM movimentacoes WHERE DATA_VENCIMENTO BETWEEN '2019-11-01' AND '2019-11-30' AND idUSUARIO = '$id_usuario' AND DESCRICAO LIKE '%".$palavra."%'  ORDER By idFINANCAS DESC LIMIT $inicio, $itens_por_pagina";
                $resultado = Mysqli_query($conexao, $query);

                if(mysqli_num_rows($resultado) <= 0)
                {
                  
                  ?> <hr> <p class="ls-text-md ls-color-danger"> Nenhum Resultado foi encontrado.</p>
                 

                <?php }

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

      <?php

      $anterior = $pagina-1;
      $proximo =  $pagina+1;

      $links = 6;
      $links_laterais = ceil($links / 2);

      $inicio = $pagina - $links_laterais;
      $limite = $pagina + $links_laterais;

      ?>

      <div class="ls-pagination-filter">
        <ul class="ls-pagination">
          <li>
              <?php 
                if($anterior >= 0)
                { ?>
                  <a href="novembro.php?pagina=<?php echo $anterior; ?>">&laquo; Anterior</a></li>  
                <?php 
                }

              ?>
            

          <?php  
            for($i=$inicio; $i<= $limite; $i++){  

              if($i == $pagina){

              
              }

              else{

                if($i >= 1 && $i <= $num_paginas){
              ?>
              <li> <a  href="novembro.php?pagina=<?php echo $i-1; ?>"> <?php echo $i; ?> </a></li>
    
          <?php } } }?>

          <li><span class="ls-gap">...</span></li>
          <li><a href="novembro.php?pagina=<?php echo $proximo; ?>">Próximo &raquo;</a></li>
        </ul>
      </div>

    </div>
</main>
    
    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>