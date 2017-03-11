<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta charset="UTF-8">

    <?php  
          //esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.
          session_start();
          if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
          {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:../adm/index.php');
          }

          $logado = $_SESSION['login'];
    ?>

    <title>alterar senha</title>
    <link href="../../../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../../../css/adm_style.css" rel="stylesheet" media="screen"> 
    <link href="../../../css/templatemo_style.css" rel="stylesheet" media="screen"> 
    <link rel="stylesheet" href="../../../adm/css/style.css"> 
</head>

<body>
      <div id="loader"></div> 
      <?php
          include("../menu_adm.php");
      ?>

      <div class="bg-image"></div>
      <div class="main-content">
          <div class="container">
              
               <div class="row">
                    <div class="col-md-12">
                        <form action="atualiza.php" method="post" name="partida">
                            <div class="login-form">

                                <div class="form-group log-status">
                                    <input type="text" class="form-control" maxlength="25" placeholder="usuario atual " id="UserName" name="user_atual" required>
                                    <i class="fa fa-user"></i>
                                </div>

                                <div class="form-group log-status">
                                    <input type="Password" class="form-control"  maxlength="25" placeholder="senha atual" id="UserName" name="senha_atual" required>
                                    <i class="fa fa-lock"></i>
                                </div>

                                <div class="form-group log-status">
                                    <input type="text" class="form-control" maxlength="25" placeholder="novo usuario" id="UserName" name="novo_user" required>
                                    <i class="fa fa-user"></i>
                                </div>

                                <div class="form-group log-status">
                                    <input type="Password" class="form-control"  maxlength="25" placeholder="nova senha" id="UserName" name="nova_senha" required>
                                    <i class="fa fa-lock"></i>
                                </div>

                                <div class="form-group log-status">
                                    <input type="Password" class="form-control"  maxlength="25" placeholder="nova senha" id="UserName" name="confirmacao" required>
                                    <i class="fa fa-lock"></i>
                                </div>
                                
                                <div class="button_form">
                                  <button type="submit" class="btn btn-success">Atualizar</button>
                                </div>
                      </div><!--/.login-form-->                      
                 </form>

                 <?php
                    include("../rodape.html") 
                 ?>

               </div><!--/.col-md-12-->
             </div><!--/.row-->
          </div><!--/.container-->
       </div><!--/.main-content-->

       <script src="../../../js/jquery-1.10.2.min.js"></script>          
       <script src="../../../bootstrap-3.7/js/bootstrap.min.js"></script> 

       <script>
         $(window).load(function(){
            $("#loader").fadeOut("slow");
         });
      </script>


</body>
      <?mysqli_close($db);?>
</html>

