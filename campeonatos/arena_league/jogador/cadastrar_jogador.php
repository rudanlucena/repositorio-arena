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
          $nome_clube = $_GET['id'];
    ?>
    
     <title>novo jogador</title>
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
            

                <form action="cadastro.php" method="post" name="partida">
                      <div class="login-form">

                                <div class="titulo_form">        
                                    <img src="../../../images/times/jogador_mobile.png">
                                </div> <!-- /.titulo_form -->      

                                <div class="form-group log-status">
                                    <label>nome:</label>
                                    <input type="text" class="form-control" name="nome_jogador" required>
                                </div>

                                <div class="form-group log-status">
                                    <label>nº camisa</label>
                                    <input type="Number" min="0" class="form-control" name="camisa_jogador">
                                </div>

                                <div class="form-group log-status invisivel">
                                    <label>clube:</label>
                                    <input type="text" class="form-control" name="clube_jogador" value='<?=$nome_clube?>' readonly required>
                                </div>

                         
                                <div class="form-group log-status">
                                    <label>posicao:</label>
                                    <select class="form-control" name="posicao_jogador">
                                            <option value="" selected>...</option>
                                            <option value="gol">gol</option>
                                            <option value="zag">zag</option>
                                            <option value="vol">vol</option>
                                            <option value="lat">lat</option>
                                            <option value="mei">mei</option>
                                            <option value="ata">ata</option>
                                            <option value="cen">cen</option>
                                            <option value="pon">pon</option>
                                    </select>
                                </div>

                                <div class="button_form">
                                    <a href="listar_jogador.php?id=<?=$nome_clube?>"><input type="button" class="btn btn-danger" value="Sair"></a>
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>Salvar</button>
                                </div>  

                           </div><!--/.login-form-->
                 </form>

                <?php
                   include("../rodape.html");
                ?>
 
           </div>
      </div>

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