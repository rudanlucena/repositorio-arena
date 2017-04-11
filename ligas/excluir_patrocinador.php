 <html>
<head>
    <?php
            session_start();
            if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
            {
              unset($_SESSION['login']);
              unset($_SESSION['senha']);
              header('location:index.php');
            }

            $logado = $_SESSION['login'];
    ?>
    <meta charset="UTF-8">
    <link href="../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/templatemo_style.css" rel="stylesheet" media="screen">
</head>

<body> 
    <div class="bg-image"></div>
    <div class="main-content">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">

                          <?php
                                include("../conexao.php");

                                            $id = $_GET['id'];       
                                            $sql = "DELETE from patrocinador where id='$id'";

                                            $result = mysqli_query( $db, $sql);
                                          
                                            if(!$result)
                                                echo '<div class="alert alert-danger">
                                                          <strong>Error!</strong> não foi possivel excluir o patrocinador.
                                                          <a href="listar_patrocinador.php"><button type="button" class="btn btn-danger">ok</button>
                                                      </div>';
                                            else{
                                                echo '<div class="alert alert-success">
                                                          <strong>Success!</strong> Patrocinador excluido com sucesso.
                                                          <a href="listar_patrocinador.php"><button type="button" class="btn btn-primary">ok</button>
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
    
    







