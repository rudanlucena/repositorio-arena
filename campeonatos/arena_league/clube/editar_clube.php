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
          $id = $_GET['id']; 
          include("../conexao.php"); 
    ?>
    
    <title>editar clube</title>
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

            <form action="atualiza.php" method="post" name="partida">

                <?php
                    $clubes = $db->query("SELECT * from clube where id='$id'");
                    if($clubes){
                        while ($clube = $clubes->fetch_assoc()){
                ?> 

                               <div class="login-form">

                                    <div class="titulo_form">        
                                       <img src="../../../images/times/escudo.png">
                                    </div> <!-- /.titulo_form -->

                                    <div class="form-group log-status invisivel">
                                        <input type="text" class="form-control" name="id" value=<?=$clube['id']?> readonly>
                                    </div>

                                    <div class="form-group log-status">
                                        <label>nome:</label>
                                        <input type="text" class="form-control" maxlength="100" name="nome_clube" value='<?=$clube['nome']?>'  required>
                                    </div>

                                    <div class="form-group log-status">
                                        <label>abreviação:</label>
                                        <input type="text" class="form-control" maxlength="3" name="abreviacao" value='<?=$clube['abreviacao']?>'  required>
                                    </div>                                    

                                    <div class="form-group log-status">
                                        <label>grupo:</label>
                                        <select class="form-control" name="grupo">
                                                <option value='<?=$clube['grupo']?>' selected ><?=$clube['grupo']?></option>
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
                                    
                                    <div class="form-group log-status">
                                        <label>tecnico:</label>
                                        <input type="text" class="form-control" maxlength="150" name="tecnico" value='<?=$clube['tecnico']?>'  required>
                                    </div>

                                    <div class="form-group log-status">
                                        <label>e-mail:</label>
                                        <input type="email" class="form-control" maxlength="150" name="email" value='<?=$clube['email']?>' >
                                    </div>

                                   <div class="form-group log-status">
                                        <label>fone:</label>
                                        <input type="tel" class="form-control" maxlength="17" name="fone" value='<?=$clube['fone']?>' >
                                   </div>

                                   <div class="button_form">
                                     <a href="listar_clube.php"><input type="button" class="btn btn-danger" value="Sair"></a>
                                     <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span>Atualizar</button>
                                   </div>

                           </div><!--/.login-form-->

                <?php         
                        }
                      $clubes->free(); 
                   }
                ?> 

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

