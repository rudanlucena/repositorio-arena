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
    
     <title>listar partidas</title>
     <link href="../../../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
     <link href="../../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
     <link href="../../../css/adm_style.css" rel="stylesheet" media="screen">  
     <link href="../../../css/templatemo_style.css" rel="stylesheet" media="screen">
     
     <style>
        .placar{
          color: yellow;
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
              <div class="about-us">                        
                  <div class="content-inner">                            
                      <div class="our-team">

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
                              <div class="button_nova_partida">
                                  <a href="agendar_partida.php?rodada=<?=$rodada?>"><button type="button" class="btn btn-success"><spam class="glyphicon glyphicon-calendar"></spam>NOVA PARTIDA</button></a>
                              </div>
                            

                              <?php
                                $partidas = $db->query("SELECT * from partida where rodada='$rodada' order by data_hora_jogo desc ");
                                    if(mysqli_affected_rows($db) > 0){
                                       while ($partida = $partidas->fetch_assoc()){
                              ?>    
                                       
                                      <div class="col-md-12">
                                          <div class="col-margin">
                                            <div class="table-responsive">
                                              <div class="team-member">
                                                  <div class="member-infos">
                                                    <h5 class="member-name"><?php echo $partida['data_hora_jogo']." ".$partida['hora']; ?></h5>
                                                    <h4 class="member-name"><spam class="glyphicon"><img src="../../../images/times/escudo.png"></spam> <?php echo $partida['mandante']; ?> <spam class="placar"><?php echo  $partida['placar_mandante']; if($partida['placar_mandante_penalty']){ echo "(".$partida['placar_mandante_penalty'].")";} ?> </spam></h4>
                                                    <h4 class="member-name"><spam class="glyphicon"><img src="../../../images/times/escudo.png"></spam> <?php echo $partida['visitante']; ?> <spam class="placar"><?php echo $partida['placar_visitante']; if($partida['placar_visitante_penalty']){ echo "(".$partida['placar_visitante_penalty'].")";} ?></spam></h4>
                                                    <h4 class="member-name"></h4>
                                                    
                                                    <h6 class="member-name"><?php echo $partida['situacao']; ?></h6>
                                                    <ul class="member-social">
                                                        <li><a href="editar_partida.php?id=<?=$partida['id']?>&rodada=<?=$rodada?>"><span class="glyphicon glyphicon-pencil"></span></a></li>
                                                        <li><a href="termo_excluir_partida.php?id=<?=$partida['id']?>"><span class="glyphicon glyphicon-trash"></span></a></li>
                                                    </ul>
                                                  </div><!-- /.member-infos --> 
                                              </div><!-- /.team-member -->
                                              </div> 
                                          </div><!-- /.col-margin -->  
                                      </div> <!-- /.col-xs-12 --> 
                                                      
                              <?php         
                                        }
                                      $partidas->free(); 
                                  }
                                  else{
                                      echo "<h4 class='sem_registros'>NÂO HA PARTIDAS REGISTRADAS!</h4>";
                                  }
                                  
                              ?>

                          </div><!-- /.row -->    
                      </div> <!-- /.our-team -->
                  </div> <!-- /.content-inner -->          
              </div> <!-- /.about-us -->   

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