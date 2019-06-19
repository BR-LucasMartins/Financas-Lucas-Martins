<?php  
session_start();
include '../verifica_sessao.php';
include '../conexao.php';

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
              <li><a href="#">Usuarios</a></li>
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
        <h1  class="ls-title-intro ls-ico-users"> Meus dados </h1>

        <div align="center" >
            <img src="../img/user_ico.png">  
        </div> 

        <hr><br>

        <?php if(isset($_GET['sucesso'])){ ?>    <!-- sucesso ao alterar dados de perfil-->
                  <br>
                    <div class="ls-alert-success ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Dados alterados com sucesso. </div>   
            <?php } ?>

            <?php if(isset($_GET['sucesso1'])){ ?>    <!-- sucesso ao alterar senha -->
                  <br>
                    <div class="ls-alert-success ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Senha alterada com sucesso. </div>   
            <?php } ?>

            <?php if(isset($_GET['erro2'])){ ?>    <!-- sucesso ao alterar senha -->
                  <br>
                    <div class="ls-alert-danger ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Senha Inválida. Verifique se digitou corretamente sua senha. </div>   
            <?php } ?>

            <?php if(isset($_GET['erro1'])){ ?>    <!-- sucesso ao alterar senha -->
                  <br>
                    <div class="ls-alert-danger ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Senha Inválida. </div>   
            <?php } ?>



        <div>
            <p class="ls-txt-left (-xs, -sm) ls-lg-margin-left ls-text-lg "> <b>Nome:&nbsp;</b> <span class="ls-color-info"> <?php echo "$nome";?></span> </p><br>
            <p class="ls-txt-left (-xs, -sm) ls-lg-margin-left ls-text-lg"> <b>N° do CPF:&nbsp;</b> <span class="ls-color-info"> <?php echo "$cpf";?></span>  </p><br>
            <p class="ls-txt-left (-xs, -sm) ls-lg-margin-left ls-text-lg"> <b>E-mail:&nbsp;</b> <span class="ls-color-info"> <?php echo "$email";?> </span></p><br>
            <p class="ls-txt-left (-xs, -sm) ls-lg-margin-left ls-text-lg"> <b>Nome de Usuário:&nbsp;</b> <span class="ls-color-info"> <?php echo "$user";?></span></p><br>
            <p class="ls-txt-left (-xs, -sm) ls-lg-margin-left ls-text-lg"> <b> Codigo de Usuário:&nbsp;</b> <span class="ls-color-info"> <?php echo "$id_usuario";?> </span></p><br>

            <div id="alterar">
              <style type="text/css">
                 div#alterar{
                  position: absolute;
                  right: 350px;
                  bottom: 140px;
                 }
              </style>
              <a href="../usuarios_editar.php" class="ls-btn-primary"> Editar Perfil </a> 

              <button data-ls-module="modal" data-action="../usuarios_deletar.php" data-content="<h2>Deseja mesmo excluir sua conta de usuário ?</h2> <br><p>Aviso , ao clicar em aceitar você  perderá todos seus dados. esta ação não pode ser revertida , caso você queira acessar o sistema novamente depois de excluir sua conta você vai precisar criar uma nova conta de usuário. </p>" data-title="Excluir minha conta " data-class="ls-btn-danger" data-save="Aceitar" data-close="Fechar" class="ls-btn-primary-danger"> Excluir perfil </button>

              <a href="#" class="ls-btn-primary-danger" data-ls-module="modal" data-target="#editPassword"> Alterar Senha </a> 

                
            </div>


            <!-- Modal de senha -->
<div class="ls-modal" id="editPassword">
  <form action="../usuarios_alterar_senha.php" class="ls-form" method="post">
    <div class="ls-modal-small">
      <div class="ls-modal-header">
        <button data-dismiss="modal">×</button>
        <h4 style="color: #FF7F00;"  class="ls-modal-title"> Alterar senha </h4>
      </div>
      <div class="ls-modal-body">

          <label class="ls-label">
            <b class="ls-label-text">Senha Antiga *</b>
            <input type="password" name="senha_antiga" required />
          </label>
          <label class="ls-label">
            <b class="ls-label-text"> Nova Senha *</b>
            <input type="password" name="new_password" required />
          </label>
          <label class="ls-label">
            <b class="ls-label-text"> Confirmação de senha *</b>
            <input type="password" name="confirmar_senha" required />
          </label>

      </div>
      <div class="ls-modal-footer">
        <button type="submit" class="ls-btn-primary"> Salvar </button>
        <a href="#atualizar-senha" class="ls-btn ls-float-right" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </form>
</div>
            </div>
        </div>

        

      </div>
    </main>

    

    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>
