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
          $nome_clube = $_GET['nome_clube'];
          include("../conexao.php");        
    ?>
    
     <title>editar jogador</title>
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
                      $jogadores = $db->query("SELECT * from jogadores where id='$id'");
                        if($jogadores){
                           while ($jogador = $jogadores->fetch_assoc()){
                  ?>

                            <div class="login-form"> 

                                <div class="form-group log-status invisivel">
                                    <input type="text" class="form-control" name="id_jogador" value=<?=$jogador['id']?> readonly>
                                </div>

                                <div class="form-group log-status">
                                    <label>nome:</label>
                                    <input type="text" class="form-control" name="nome_jogador" value='<?=$jogador['nome']?>' required>
                                </div>

                                <div class="form-group log-status">
                                    <label>camisa:</label>
                                    <input type="Number" class="form-control" min="0" name="camisa_jogador" value=<?=$jogador['num_camisa']?>>
                                </div>


                                <div class="form-group log-status">
                                    <label>clube:</label>
                                    <select class="form-control" name="clube_jogador" required>

                                            <option class="marcacao_red" value='<?=$jogador['clube']?>' selected><?=$jogador['clube']?></option>

                                            <?php
                                              $clubes = $db->query('SELECT abreviacao from clube');
                                              if($clubes){
                                                  while ($clube = $clubes->fetch_assoc()){
                                            ?>
                                                        <option value='<?=$clube['abreviacao']?>'><?=$clube['abreviacao']?></option>

                                            <?php         
                                                     }
                                                  $clubes->free(); 
                                               }
                                            ?> 
                                    </select>
                                </div>

                         
                                <div class="form-group log-status">
                                    <label>posicao:</label>
                                    <select class="form-control" name="posicao_jogador">
                                            <?php if($jogador['posicao']){ ?><option class="marcacao_red" value=<?=$jogador['posicao']?> selected><?=$jogador['posicao']?></option><?php } ?>
                                            <option value="">SEM POSICAO</option>
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

                                 <div class="form-group log-status">
                                    <label>gols:</label>
                                    <input type="Number" class="form-control"  min="0" name="gols_jogador" value=<?=$jogador['gols']?> required>
                                </div>

                                <?php
                                    $limite_cartoes = $db->query("SELECT limite_cartao_amarelo, limite_cartao_vermelho from settings");
                                      if($limite_cartoes){
                                         $limite_cartao = $limite_cartoes->fetch_assoc();
                                         $limite_amarelo = $limite_cartao['limite_cartao_amarelo'];
                                         $limite_vermelho = $limite_cartao['limite_cartao_vermelho'];
                                       }
                                ?>

                                <div class="form-group log-status">
                                    <label>amarelos:</label>
                                    <input type="Number" class="form-control"  min="0" max=<?=$limite_amarelo?> name="cartao_amarelo" value=<?=$jogador['cartao_amarelo']?> required>
                                </div>

                                <div class="form-group log-status">
                                    <label>vermelhos:</label>
                                    <input type="Number" class="form-control"  min="0"max=<?=$limite_vermelho?> name="cartao_vermelho" value=<?=$jogador['cartao_vermelho']?> required>
                                </div>

                                <div class="button_form">
                                    <a href="listar_jogador.php?id=<?=$nome_clube?>"><input type="button" class="btn btn-danger" value="Sair"></a>
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span>Atualizar</button>  
                                </div>
                                
                           </div><!--/.login-form--> 

                            <?php         
                                  }
                                 $jogadores->free(); 
                               }
                            ?>

                 </form>

                 <?php
                     include("../rodape.html");
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

