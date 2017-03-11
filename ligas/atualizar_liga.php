<html>
<head>

    <?php  
          //esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.
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

                                            $tipo = $_POST['tipo'];
                                            $nome = $_POST['nome'];
                                            $link = $_POST['link'];
                                            $data = $_POST['data'];
                                            $hora = $_POST['hora'];
                                            $local = $_POST['local'];
                                            $clubes = $_POST['clubes'];
                                            $organizador = $_POST['organizador'];
                                            $facebook = $_POST['facebook'];
                                            $fone = $_POST['fone'];
                                            $inscricao = $_POST['inscricao'];
                                            $primeiro_lugar = $_POST['primeiro_lugar'];
                                            $segundo_lugar = $_POST['segundo_lugar'];
                                            $terceiro_lugar = $_POST['terceiro_lugar'];
                                            $quarto_lugar = $_POST['quarto_lugar'];
                                            $quinto_lugar = $_POST['quinto_lugar'];
                                            $data_upload = $_POST['data_upload'];
                                            $vencimento = $_POST['vencimento'];
                                           
                                           
                                                    $sql ="UPDATE liga SET tipo='$tipo', nome='$nome', link='$link', data='$data', hora='$hora', local='$local', clubes='$clubes', organizador='$organizador', facebook='$facebook', fone='$fone', inscricao='$inscricao', primeiro_lugar='$primeiro_lugar', segundo_lugar='$segundo_lugar', terceiro_lugar='$terceiro_lugar', quarto_lugar='$quarto_lugar', quinto_lugar='$quinto_lugar', data_upload='$data_upload', vencimento='$vencimento' ";

                                                        $result = mysqli_query( $db, $sql);
                                                         if(!$result)
                                                              echo '<div class="alert alert-danger">
                                                                      <strong>Error!</strong> não foi possivel atualizar a liga.
                                                                      <a href="listar_ligas.php"><button type="button" class="btn btn-danger">ok</button>
                                                                  </div>';
                                                         else
                                                            {                              
                                                                echo '<div class="alert alert-success">
                                                                            <strong>Success!</strong> liga atualizada com sucesso.
                                                                                <a href="listar_ligas.php"><button type="button" class="btn btn-primary">ok</button>
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

                       
