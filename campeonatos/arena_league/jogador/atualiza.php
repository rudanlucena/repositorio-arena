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
            $nome_jogador = $_POST['nome_jogador'];
            $camisa_jogador = $_POST['camisa_jogador'];
            $clube_jogador = $_POST['clube_jogador'];
            $posicao_jogador = $_POST['posicao_jogador'];
            $gols_jogador = $_POST['gols_jogador'];
            $id = $_POST['id_jogador'];
            $cartao_amarelo = $_POST['cartao_amarelo'];
            $cartao_vermelho = $_POST['cartao_vermelho'];
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
                                        $sql ="UPDATE jogadores set nome ='$nome_jogador', num_camisa='$camisa_jogador', clube='$clube_jogador', posicao='$posicao_jogador', gols='$gols_jogador', cartao_amarelo='$cartao_amarelo', cartao_vermelho='$cartao_vermelho' where id='$id'";
                                        $result = mysqli_query( $db, $sql);
                                                     if(!$result)
                                                     {
                                                      ?>
                                                         <div class="alert alert-danger">
                                                                  <strong>Error!</strong> não foi possivel atualizar os dados do jogador.
                                                                  <a href="listar_jogador.php?id=<?=$clube_jogador?>"><button type="button" class="btn btn-danger">ok</button>
                                                              </div>
                                                       <?php       
                                                     }
                                                     else{
                                                        ?><div class="alert alert-success">
                                                                   <strong>Success!</strong> jogador atualizado com sucesso.
                                                                        <a href="listar_jogador.php?id=<?=$clube_jogador?>"><button type="button" class="btn btn-primary">ok</button>
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







