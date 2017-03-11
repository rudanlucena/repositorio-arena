<html>
<head>

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
    ?>
    
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                                                                               
                                        $fase = $_POST['fase'];
                                        $rodada = $_POST['rodada'];
                                                                                                                        
                                        $sql ="INSERT INTO rodadas (rodada, fase) values ('$rodada', '$fase')"; 
                                                             

                                        $result = mysqli_query( $db, $sql);
                                        if(!$result){?>
                                            <div class="alert alert-danger">
                                                <strong>Error!</strong> não foi possivel cadastrar a rodada!
                                                <a href="listar_rodadas.php"><button type="button" class="btn btn-danger">ok</button>
                                            </div><?php
                                        }

                                       else{?>              
                                            <div class="alert alert-success">
                                                  <strong>Success!</strong> nova rodada criada, agende todas as partidas dessa rodada.
                                                  <a href="listar_rodadas.php">
                                                  <button type="button" class="btn btn-primary">ok</button>
                                            </div><?php
                                       }
                                                           
                            mysqli_close($db);                                                       
                        ?>                          
                    </div><!-- /.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>











                       
