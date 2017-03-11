<!DOCTYPE html>
<html >
<head>

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
          include("../conexao.php")
      ?>

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="UTF-8">
      <title>Configurações</title>
      <link href="../../../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
      <link href="../../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
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

                    <?php
                        $settings = $db->query("SELECT * from settings");
                        if($settings){
                           while ($config = $settings->fetch_assoc()){
                    ?>  

                            <form action="save_settings.php"method="post">
                                <div class="login-form">

                                      <div class="form-group log-status">
                                         <label>Nome campeonato:</label>
                                         <input type="text" class="form-control" name="nome_campeonato" value='<?=$config['nome_campeonato']?>' required>
                                      </div>

                                      <div class="form-group log-status">
                                         <label>nº grupos:</label>
                                         <input type="number" min="0" class="form-control" name="quant_grupos" value='<?=$config['grupos']?>' required>
                                      </div>

                                      <span class="alert">Invalid Credentials</span>
                                      <button type="submit" class="log-btn" >SALVAR</button>
                                      
                                </div><!--/.login-form-->
                            </form>

                    <?php         
                          }
                        $settings->free(); 
                      }
                    ?>      
                        

                    <?php
                        include("../rodape.html");
                    ?>

               </div><!--/.col-md-12-->
            </div><!--/.row-->
         </div> <!--/.container-->
      </div><!--/.main-content-->
      
      <script src="../../../js/jquery-1.10.2.min.js"></script>
      <script src="../../../bootstrap-3.7/js/bootstrap.min.js"></script>

      <script>
         $(window).load(function(){
            $("#loader").fadeOut("slow");
         });
      </script>
    
</body>
</html>
