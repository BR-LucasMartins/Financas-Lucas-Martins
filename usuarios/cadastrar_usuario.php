<!DOCTYPE html>
<html class="ls-theme-indigo">
  <head>
    <title>Add User</title>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="css/locastyle.css" rel="stylesheet" type="text/css" />
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
      
    </div>
  </div>

  <span class="ls-show-sidebar ls-ico-menu"></span>

   <a href="javascript:window.history.go(-1)" class="ls-go-next"> <span class="ls-text"> Voltar</span></a>

  <!-- Nome do produto/marca com sidebar -->
    <h1 class="ls-brand-name">
      <a href="../index.HTML" class="ls-ico-earth">
        <small>Financeiro</small>
        Prog. WEB
      </a>
    </h1>

  <!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->
</div>

    <br><br><br><div class="container-fluid">
        <h1 align="center" class="ls-title-intro ls-ico-user-add ls-color-theme"> Cadastrar Usuário </h1>
    </div>
    
    <div align="center" class="container-fluid">
        
        <form action="cadastrando_usuario.php" class="ls-form row" method="post">
          <fieldset>

            <label class="ls-label col-md-4">
              <b class="ls-label-text ls-color-theme">CPF</b>
              <input type="text" name="cpf"  class="ls-mask-cpf"  placeholder="000.000.000-00" required autocomplete="off" >
            </label>

            <label class="ls-label col-md-4">
              <b class="ls-label-text ls-color-theme">Nome</b>
              <input type="text" name="nome" placeholder="Digite seu Nome Completo" required autocomplete="off" >
            </label>
 
            <label class="ls-label col-md-4">
              <b class="ls-label-text ls-color-theme">E-mail</b>
              <input type="text" name="email" placeholder="Escreva seu email" required autocomplete="off" >
            </label>

            

            <label class="ls-label col-md-4">
              <b class="ls-label-text ls-color-theme">Usuário</b>
              <input type="text" name="user" placeholder="Nome de Usuário" required  autocomplete="off">
            </label>
            

            <label class="ls-label col-md-4">
              <b class="ls-label-text ls-color-theme">Senha</b>
              <div class="ls-prefix-group ls-field-lg">
              <input id="password_field" class="ls-login-bg-password" type="password" name="password" placeholder="Senha" required>
                <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#"></a>
              </div>
            </label>

            <label class="ls-label col-md-4">
              <b class="ls-label-text ls-color-theme"> Confirmar Senha</b>
              <div class="ls-prefix-group ls-field-lg">
              <input id="password_field1" class="ls-login-bg-password" type="password" name="confirm_password" placeholder=" Confirmar Senha" required>
                <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field1" href="#"></a>
              </div>

              
            <?php if(isset($_GET['erro'])){ ?>

              <br>
                    <div class="ls-alert-danger ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Nome de usuário Já existe. </div>   
            <?php } ?>

           

              <?php if(isset($_GET['erro2'])){ ?>

              <br>
                    <div class="ls-alert-danger ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Esse email Já foi cadastrado no nosso sistema. </div>   
            <?php } ?>

              <?php if(isset($_GET['erro3'])){ ?>

              <br>
                    <div class="ls-alert-danger ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 dados ou senha inválidos. </div>   
            <?php } ?>

            <?php if(isset($_GET['sucesso'])){ ?>

              <br>
                    <div class="ls-alert-success ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Usuário cadastrado com sucesso. </div>   
            <?php } ?>

              </label><br>
                <input  class="ls-btn-primary ls-btn-lg ls-ico-user " type="submit" name="salvar" value="Confirmar">

                <input class="ls-btn ls-btn-lg ls-ico-user" type="reset" name="cancelar"   value="Cancelar">

                <a id="voltar" class="ls-btn-dark ls-btn-lg" href="../index.HTML"> Voltar </a>
                <style>
                    #voltar{width: 90px;}
                 </style>
            
          </fieldset>
        </div>
      

    <!-- We recommended use jQuery 1.10 or up -->
     <script src="../js/jquery-2.1.0.min.js" type="text/javascript"></script>
    <script src="../js/locastyle.js" type="text/javascript"></script>
    <script  src="../js/jquery-mask.js" type="text/javascript"></script>
  </body>
</html>
