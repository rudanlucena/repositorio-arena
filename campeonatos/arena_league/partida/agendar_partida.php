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
          $rodada = $_GET['rodada'];
          include("../conexao.php");
    ?>
    
     <title>agendar_partida</title>
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

                <?php
                    $rodadas = $db->query("SELECT * FROM rodadas where rodada='$rodada'");
                    if(mysqli_affected_rows($db) > 0){
                          $r = $rodadas->fetch_assoc();
                          $fase = $r['fase'];
                    }
                ?>

                <div class="page-header">
                    <h2 class="page-title">RODADA: <?=$rodada?> - FASE: <?=$fase?></h2>
                </div> <!-- /.page-header -->              

                <div class="row">
                    <div class="col-md-12">

                         <form action="agenda.php" method="post" name="partida" class="form_partida">
                              <div class="login-form">

                                  <div class="invisivel">
                                      <label>id_rodada:</label>
                                      <input type="Number" class="form-control" name="id_rodada" value='<?=$rodada?>' required>
                                  </div> 

                                  <div class="invisivel">
                                      <label>id:</label>
                                      <input type="Number" class="form-control" name="rodada" value='<?=$rodada?>' required>
                                  </div>                                 

                                  <div class="form-group log-status">
                                      <label>data:</label>
                                      <input type="date" class="form-control" name="data_partida" required>
                                  </div>

                                  <div class="form-group log-status">
                                      <label>hora:</label>
                                      <input type="time" class="form-control" name="hora" required>
                                  </div>

                                  <div class="form-group log-status">
                                      <label>mandante:</label>
                                      <select name="mandante" class="form-control" required>
                                            <option value="" selected>...</option>
                                            <?php
                                                 $clubes = $db->query('SELECT nome, abreviacao from clube order by nome asc');
                                                 if($clubes){
                                                    while ($clube = $clubes->fetch_assoc()){
                                            ?>

                                                <option value='<?=$clube['abreviacao']?>'><?=$clube['nome']?></option>

                                            <?php         
                                                 }
                                              $clubes->free(); 
                                              }
                                            ?> 
                                      </select>                  
                                  </div>

                                 <div class="form-group log-status">
                                      <label>visitante:</label>
                                      <select name="visitante" class="form-control" required>
                                           <option value="" selected>...</option>
                                                  <?php
                                                      $clubes = $db->query('SELECT nome, abreviacao from clube order by nome asc');
                                                      if($clubes){
                                                          while ($clube = $clubes->fetch_assoc()){
                                                  ?>

                                                                <option value='<?=$clube['abreviacao']?>'><?=$clube['nome']?></option>

                                                  <?php         
                                                          }
                                                        $clubes->free(); 
                                                      }
                                                  ?>               
                                    </select>                  
                                </div>

                                <div class="button_form">
                                   <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>Salvar</button>
                                </div>

                            </div><!--/.login-form-->        
                        </form>

                        <?php
                            include("../rodape.html");
                        ?>
                    </div><!--/.col-md-12-->
                </div><!--/.row-->
                <?php
                  $rodadas->free();
                ?>
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