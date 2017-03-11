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

     <title>listar jogadores</title>
     <link href="../../../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
     <link href="../../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
     <link href="../../../css/font-awesome.min.css" rel="stylesheet" media="screen">
     <link href="../../../css/templatemo_style.css" rel="stylesheet" media="screen"> 
     <link href="../../../css/adm_style.css" rel="stylesheet" media="screen">
 
         
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
                  <div class="col-md-12 col-sm-12">

                      <div class="table-responsive">


                          <table class="cadastro_partida gallery-content listar_jogadores">


                                                        <thead>
                                                              <tr>
                                                                  <th class="nome_clube_jogadores" colspan="7">
                                                                      <spam class="glyphicon"><img src="../../../images/times/escudo.png"></spam><?php echo $nome_clube; ?>
                                                                  </th>
                                                               </tr>  

                                                               <tr>
                                                                    <th>JOGADORES</th>
                                                                    <th><spam><img src="../../../images/bola.png"></spam></th>
                                                                    <th class="cartao"><spam><img src="../../../images/cartao_amarelo.png"></spam></th>
                                                                    <th class="cartao"><spam><img src="../../../images/cartao_vermelho.png"></spam></th>
                                                                    <th class="editar"><span class="glyphicon glyphicon-pencil"></span></th>
                                                                    <th class="excluir"><span class="glyphicon glyphicon-trash"></span></th>
                                                               </tr>

                                                        </thead>

                                                        <tbody>
                                                               <tr>
                                                                 <td colspan="6">
                                                                     <a href="cadastrar_jogador.php?id=<?=$nome_clube?>"><div class="novo_jogador">
                                                                        <span class="glyphicon glyphicon-plus"></span>novo jogador
                                                                     </div></a>
                                                                  </td>
                                                               </tr>

                                                                <?php
                                                                    $jogadores = $db->query("SELECT * from jogadores where clube ='$nome_clube' order by nome asc");
                                                                     if(mysqli_affected_rows($db) > 0){
                                                                        $cont=0;
                                                                            while ($jogador = $jogadores->fetch_assoc()){                                                           
                                                                ?> 
                                                                                      
                                                                                        <tr> 
                                                                                            <td class="nome_jogador">
                                                                                              <spam>
                                                                                                  <?=$jogador['num_camisa']?>
                                                                                               </spam>
                                                                                                <?=$jogador['nome']?>
                                                                                            </td> 

                                                                                            <td >
                                                                                                <?=$jogador['gols']?>
                                                                                            </td>

                                                                                            <td>
                                                                                                <?=$jogador['cartao_amarelo']?>
                                                                                            </td>

                                                                                            <td>
                                                                                                <?=$jogador['cartao_vermelho']?>
                                                                                            </td>

                                                                                            <td class="editar"><a href="editar_jogador.php?id=<?=$jogador['id']?>&nome_clube=<?=$nome_clube?>"><span class="glyphicon glyphicon-pencil"></span></td> 
                                                                                            <td class="excluir"><a href="termo_excluir_jogador.php?id=<?=$jogador['id']?>"><span class="glyphicon glyphicon-trash"></span></a></td>  
                                                                                        </tr>    

                                                                    <?php         
                                                                           }
                                                                          $jogadores->free(); 
                                                                       }
                                                                    ?>
                                                              </body>            
                                                        
                            </table>
                       </div><!--/.table-responsive-->  
                        
                       <?php
                          include("../rodape.html");
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