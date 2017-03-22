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
                                              <spam><img src="../../../images/apito.png"></spam>
                                          </th>
                                       </tr>  

                                       <tr>
                                            <th>Jogador</th>
                                            <th>Clube</th>
                                            <th class="cartao"><spam><img src="../../../images/cartao_amarelo.png"></spam></th>
                                            <th class="cartao"><spam><img src="../../../images/cartao_vermelho.png"></spam></th>
                                            <th >Status</span></th>
                                            <th class="editar"><span class="glyphicon glyphicon-pencil"></span></th>
                                       </tr>

                                </thead>

                                <tbody>

                                        <?php
                                            $jogadores = $db->query("SELECT * from jogadores where cartao_amarelo > 0 or cartao_vermelho > 0 order by cartao_vermelho desc, cartao_amarelo desc ");
                                             if(mysqli_affected_rows($db) > 0){
                                                $cont=0;
                                                    while ($jogador = $jogadores->fetch_assoc()){                                                           
                                        ?> 
                                                              
                                                                <tr> 
                                                                    <td class="nome_jogador">
                                                                      <spam class="member-name"><?=$jogador['num_camisa']?></spam>
                                                                      <spam class="member-name"><?=$jogador['nome']?></spam>
                                                                    </td>

                                                                    <td>
                                                                    
                                                                    <div class="time_artilheiro">
                                                                        <spam class="member-name"><?=$jogador['clube']?></spam>                                                                                            
                                                                    </div> 
                                                                    </td> 

                                                                    <td>
                                                                        <?=$jogador['cartao_amarelo']?>
                                                                    </td>

                                                                    <td>
                                                                        <?=$jogador['cartao_vermelho']?>
                                                                    </td>

                                                                    <td>
                                                                      <spam class="member-name marcacao_red"><?=$jogador['status']?></spam>
                                                                    </td>

                                                                    <td class="editar">
                                                                      <a href="editar_cartoes.php?id=<?=$jogador['id']?>&nome_clube=<?=$jogador['clube']?>"><span class="glyphicon glyphicon-pencil"></span>
                                                                    </td> 
                                                                </tr>    

                                            <?php         
                                                   }
                                                  $jogadores->free(); 
                                               }
                                            ?>
                                      </tbody>                                                                  
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