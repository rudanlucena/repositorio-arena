<html>
<head>
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
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>rodadas</title>
     <link href="../../../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
     <link href="../../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
     <link href="../../../css/templatemo_style.css" rel="stylesheet" media="screen">

     <style>
     .form_rodadas{
      display: none;
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
                          <div class="page-header">
                              <h2 class="page-title"><spam class="glyphicon glyphicon-calendar"></spam>RODADAS</h2>
                          </div> <!-- /.page-header -->                             
                          <div class="row rodadas">
                            
                            

                              <?php
                                   $rodadas = $db->query('SELECT * from rodadas ORDER BY rodada desc');
                                   if(mysqli_affected_rows($db) > 0){
                                      while ($rodada = $rodadas->fetch_assoc()){
                              ?>            
                                      <div class="col-md-3 col-sm-4">
                                          
                                            <div class="team-member">
                                                <div class="member-infos">
                                                    <h4 class="member-name"><?php echo "rodada: ".$rodada['rodada']; ?></h4>
                                                    <h4 class="member-name"><?php echo "fase: ".$rodada['fase']; ?></h4>
                                                    <div class="button_form">
                                                          <a href="listar_partidas.php?rodada=<?=$rodada['rodada']?>"><button type="button" class="btn btn-success"><spam class="glyphicon glyphicon-calendar"></spam>jogos</button></a>
                                                    </div>
                                                    <ul class="member-social">
                                                          <li><a href="editar_rodada.php?id=<?=$rodada['id']?>"><span class="glyphicon glyphicon-pencil"></span></a></li>
                                                          <li><a href="termo_excluir_rodada.php?id=<?=$rodada['id']?>"><span class="glyphicon glyphicon-trash"></span></a></li>
                                                    </ul>
                                                    
                                                </div>
                                            </div> <!-- /.col-md-4 -->

                                      </div>                  

                              <?php         
                                     }
                                   $rodadas->free(); 
                                }else{
                                  echo "<h4 class='sem_registros'>NÂO HA RODADAS REGISTRADAS!</h4>";
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