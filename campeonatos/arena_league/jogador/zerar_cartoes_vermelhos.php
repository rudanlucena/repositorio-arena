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
                            include("../conexao.php"); 

                                        $sql ="UPDATE jogadores set cartao_vermelho = 0";
                                        $result = mysqli_query( $db, $sql);
                                                     if(!$result)
                                                          echo '<div class="alert alert-danger">
                                                                    <strong>Error!</strong> não foi possivel zerar os cartões vermelhos.
                                                                    <a href="../partida/listar_rodadas.php"><button type="button" class="btn btn-danger">ok</button>
                                                                </div>';
                                                     else{
                                                         echo '<div class="alert alert-success">
                                                                   <strong>Success!</strong> Cartões vermelhos zerados com sucesso.
                                                                        <a href="../partida/listar_rodadas.php"><button type="button" class="btn btn-primary">ok</button>
                                                               </div>';
                                                     }
                                                         
                            mysqli_close($db);
                        ?>                         
                    </div><!-- /.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>




















