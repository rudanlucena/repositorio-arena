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
                                include("../adm/ranking.php"); 
                                           
                                            $id = $_POST['id'];
                                            $rodada = $_POST['rodada'];
                                            $fase = $_POST['fase'];



                                            $rodadas = $db->query("SELECT * from rodadas where id='$id'");
                                            if($rodadas){
                                                $rodada_anterior = $rodadas->fetch_assoc();
                                                $anterior = $rodada_anterior['rodada'];

                                                $sql ="UPDATE rodadas set rodada='$rodada', fase='$fase' where id='$id'";
                                                $result = mysqli_query( $db, $sql);
                                                                 if(!$result){
                                                                      ?>
                                                                      <div class="alert alert-danger">
                                                                              <strong>Error!</strong> não foi possivel atualixzar a rodada.
                                                                              <a href="listar_rodadas.php"><button type="button" class="btn btn-danger">ok</button>
                                                                      </div>
                                                                      <?php 
                                                                 }else{
                                                                        ranking();

                                                                        if($anterior != $rodada){
                                                                              $sql ="UPDATE partida set rodada='$rodada' where rodada='$anterior'";
                                                                              $result = mysqli_query( $db, $sql);
                                                                              if(!$result){
                                                                                      ?>
                                                                                      <div class="alert alert-danger">
                                                                                            <strong>Error!</strong> não foi possivel atualizar as partidas desta rodada.
                                                                                            <a href="listar_rodadas.php"><button type="button" class="btn btn-danger">ok</button>
                                                                                      </div>
                                                                                      <?php 
                                                                              }else{
                                                                                    ?>
                                                                                    <div class="alert alert-success">
                                                                                            <strong>Success!</strong> rodada atualizada com sucesso.
                                                                                            <a href="listar_rodadas.php"><button type="button" class="btn btn-primary">ok</button>
                                                                                    </div>
                                                                                    <?php
                                                                              } 
                                                                        }
                                                                        else{

                                                                          ?>
                                                                              <div class="alert alert-success">
                                                                                   <strong>Success!</strong> rodada atualizada com sucesso.
                                                                                   <a href="listar_rodadas.php"><button type="button" class="btn btn-primary">ok</button>
                                                                              </div>
                                                                          <?php

                                                                        }                                             
                                                                                      
                                                        
                                                                 }           
                                                    
                                            }
                                          

                                          
                                mysqli_close($db);
                            ?> 
                                                   
                    </div><!-- /.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>











