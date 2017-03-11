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
            include("../conexao.php");
             
    ?>

    <title>novo clube</title>
    <link href="../../../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../../../css/templatemo_style.css" rel="stylesheet" media="screen"> 
    <link rel="stylesheet" href="../../../adm/css/style.css">
     <style>
    .button_form{
       text-align: center;
       margin-top: 20px;
     }
     </style>
</head>

<body> 
      <div id="loader"></div>
      <?php 
        include("../menu_adm.php");
      ?>

      <div class="bg-image"></div>
      <div class="main-content">
          <div class="container">

                        <form action="cadastro.php" method="post" name="partida">
                            <div class="login-form">


                                <div class="titulo_form">        
                                   <img src="../../../images/times/escudo.png">
                                </div> <!-- /.titulo_form -->

                                <div class="form-group">
                                    <label>nome:</label>
                                    <input type="text" class="form-control" maxlength="100"  name="nome_clube" required>
                                </div>

                                <div class="form-group">
                                    <label>abreviação</label>
                                    <input type="text" class="form-control" maxlength="3"  name="abreviacao" required>
                                </div>                                

                                <div class="form-group">
                                    <label>grupo:</label>
                                    <select class="form-control" name="grupo">
                                                      <option value="" >...</option>
                                                       <?php
                                                            $q_grupo = $db->query("SELECT * from settings");
                                                            if($q_grupo){
                                                                while ($grupos = $q_grupo->fetch_assoc()){
                                                                    $quant_grupos = $grupos['grupos']; 
                                                                }
                                                              $q_grupo->free();  
                                                            }

                                                            for($i=1; $i<=$quant_grupos; $i++){
                                                       ?>
                                                            <option value='<?php echo($i) ?>'> <?php echo($i) ?> </option>
                                                       <?php
                                                           }
                                                       ?>    
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>tecnico</label>
                                    <input type="text" class="form-control" maxlength="150"  name="nome_tecnico" required>
                                </div>

                                <div class="form-group">
                                  <label>e-mail:</label>
                                    <input type="email" class="form-control" maxlength="150" name="email">
                                </div>

                                <div class="form-group">
                                  <label>fone:</label>
                                    <input type="tel" class="form-control" maxlength="17" name="fone">
                                </div>

                                <div class="button_form">                              
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>Salvar</button>
                                </div>
                                
                           </div><!--/.login-form-->
                         </form>

              <?php
                  include("../rodape.html");
              ?>

         </div><!-- /.container--> 
       </div><!-- /.main-content--> 

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