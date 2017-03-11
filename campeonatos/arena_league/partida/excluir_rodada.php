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
            $id = $_GET['id'];
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
                                  include("../adm/ranking.php");
                                              
                                          $sql = "DELETE from rodadas where id='$id'";

                                          $result = mysqli_query( $db, $sql);
                                        
                                          // Verifica se o comando foi executado com sucesso
                                          if(!$result){?>
                                              <div class="alert alert-danger">
                                                          <strong>Error!</strong> Não foi possivel excluir a rodada.
                                                          <a href="listar_rodadas.php"><button type="button" class="btn btn-danger">ok</button>
                                                    </div><?php
                                          }else{?>
                                              <div class="alert alert-success">
                                                        <strong>Success!</strong> Rodada excluida com sucesso.
                                                        <a href="listar_rodadas.php"><button type="button" class="btn btn-primary">ok</button>
                                              </div><?php
                                              ranking();
                                          } 
                                          
                                  mysqli_close($db);                              
                          ?>  
                                                  
                    </div><!-- /.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>



