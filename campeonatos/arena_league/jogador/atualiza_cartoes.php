<html>
<head>

    <?php
            session_start();
            if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
            {
              unset($_SESSION['login']);
              unset($_SESSION['senha']);
              header('location:../adm/index.php');
            }

            $logado = $_SESSION['login'];
            include("../conexao.php");
            $id = $_POST['id_jogador'];
            $cartao_amarelo = $_POST['cartao_amarelo'];
            $cartao_vermelho = $_POST['cartao_vermelho'];
            $status = "";
                        
            $limite_cartoes = $db->query("SELECT limite_cartao_amarelo, limite_cartao_vermelho from settings");
            if($limite_cartoes){
               $limite_cartao = $limite_cartoes->fetch_assoc();
               $limite_amarelo = $limite_cartao['limite_cartao_amarelo'];
               $limite_vermelho = $limite_cartao['limite_cartao_vermelho'];
               if(($cartao_amarelo == $limite_amarelo) or ($cartao_vermelho == $limite_vermelho)){
                  $status = "suspenso";
               }
            }      
    ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="../../../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../../../css/templatemo_style.css" rel="stylesheet" media="screen">
</head>

<body> 
    <div class="bg-image"></div>
    <div class="main-content">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <?php
                                        $sql ="UPDATE jogadores set cartao_amarelo='$cartao_amarelo', cartao_vermelho='$cartao_vermelho', status='$status' where id='$id'";
                                        $result = mysqli_query( $db, $sql);
                                                     if(!$result)
                                                     {
                                                      ?>
                                                         <div class="alert alert-danger">
                                                                  <strong>Error!</strong> não foi possivel atualizar os dados do jogador.
                                                                  <a href="jogadores_com_cartao.php"><button type="button" class="btn btn-danger">ok</button>
                                                              </div>
                                                       <?php       
                                                     }
                                                     else{
                                                        ?><div class="alert alert-success">
                                                                   <strong>Success!</strong> cartôes atualizado com sucesso.
                                                                        <a href="jogadores_com_cartao.php"><button type="button" class="btn btn-primary">ok</button>
                                                                    </div>
                                                        <?php     
                                                     }
                                                         
                            mysqli_close($db);
                        ?>                        
                    </div><!-- /.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>







