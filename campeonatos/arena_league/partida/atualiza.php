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
    <link href="../../..//bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
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
                                            $data = $_POST['data_partida'];
                                            $hora = $_POST['hora'];
                                            $mandante = $_POST['mandante'];
                                            $visitante = $_POST['visitante'];
                                            $placar_mandante = $_POST['placar_mandante'];
                                            $placar_mandante_penalty = $_POST['placar_mandante_penalty'];
                                            $placar_visitante = $_POST['placar_visitante'];
                                            $placar_visitante_penalty = $_POST['placar_visitante_penalty'];
                                            $situacao = $_POST['situacao'];

                                            if($situacao == "agendada"){
                                                $sql ="UPDATE partida set data_hora_jogo ='$data', hora='$hora', situacao='agendada', placar_mandante=null, placar_visitante=null where id='$id'";
                                                $result = mysqli_query( $db, $sql);
                                                   if(!$result){
                                                        ?>
                                                        <div class="alert alert-danger">
                                                                <strong>Error!</strong> não foi possivel atualizar a partida.
                                                                <a href="listar_partidas.php?rodada=<?=$rodada?>"><button type="button" class="btn btn-danger">ok</button>
                                                        </div>
                                                        <?php
                                                   }else{
                                                       $partidas = $db->query("SELECT * from aux_jogos_andamentos where id = '$id' ");
                                                       if(mysqli_affected_rows($db) == 1){
                                                          $partida = $db->query("DELETE from aux_jogos_andamentos where id = '$id' ");
                                                       }
                                                       ?>
                                                       <div class="alert alert-success">
                                                                 <strong>Success!</strong> partida atualizada com sucesso.
                                                                      <a href="listar_partidas.php?rodada=<?=$rodada?>"><button type="button" class="btn btn-primary">ok</button>
                                                                  </div>
                                                      <?php
                                                   }
                                            }
                                            else if($situacao == "andamento"){
                                                if($placar_mandante == ""){
                                                  $placar_mandante = 0;
                                                }
                                                if($placar_visitante == ""){
                                                  $placar_visitante = 0;
                                                }

                                                $sql ="UPDATE partida set data_hora_jogo ='$data', hora='$hora', placar_mandante='$placar_mandante', placar_mandante_penalty='$placar_mandante_penalty', placar_visitante='$placar_visitante', placar_visitante_penalty='$placar_visitante_penalty', situacao='andamento' where id='$id'";
                                                  $result = mysqli_query( $db, $sql);
                                                           if(!$result){
                                                                ?>
                                                                <div class="alert alert-danger">
                                                                        <strong>Error!</strong> não foi possivel atualizar a partida.
                                                                        <a href="listar_partidas.php?rodada=<?=$rodada?>"><button type="button" class="btn btn-danger">ok</button>
                                                                </div>
                                                                <?php
                                                           }else{

                                                              $partidas = $db->query("SELECT * from aux_jogos_andamentos where id = '$id' ");
                                                              if(mysqli_affected_rows($db) == 0){
                                                                  $sql ="INSERT INTO aux_jogos_andamentos (id, placar_mandante,  placar_visitante, placar_mandante_penalty, placar_visitante_penalty) values('$id', '$placar_mandante', '$placar_visitante', '$placar_mandante_penalty', '$placar_visitante_penalty') ";           
                                                                  $result = mysqli_query( $db, $sql);
                                                                  if(!$result){
                                                                        ?>
                                                                        <div class="alert alert-danger">
                                                                                <strong>Error!</strong>A alerta de gols não está habilitado corretamente.
                                                                        </div>
                                                                        <?php
                                                                   }
                                                              }
                                                              ?>

                                                              <div class="alert alert-success">
                                                                         <strong>Success!</strong> partida atualizada com sucesso.
                                                                              <a href="listar_partidas.php?rodada=<?=$rodada?>"><button type="button" class="btn btn-primary">ok</button>
                                                              </div>
                                                              <?php
                                                           }
   
                                            }else{
                                                $sql ="UPDATE partida set data_hora_jogo ='$data', hora='$hora', placar_mandante='$placar_mandante', placar_mandante_penalty='$placar_mandante_penalty', placar_visitante='$placar_visitante', placar_visitante_penalty='$placar_visitante_penalty', situacao='$situacao' where id='$id'";
                                                $result = mysqli_query( $db, $sql);
                                                         if(!$result){
                                                              ?>
                                                              <div class="alert alert-danger">
                                                                      <strong>Error!</strong> não foi possivel atualizar a partida.
                                                                      <a href="listar_partidas.php?rodada=<?=$rodada?>"><button type="button" class="btn btn-danger">ok</button>
                                                              </div>
                                                              <?php
                                                         }else{
                                                             ranking();
                                                             $partidas = $db->query("SELECT * from aux_jogos_andamentos where id = '$id' ");
                                                             if(mysqli_affected_rows($db) == 1){
                                                                $partida = $db->query("DELETE from aux_jogos_andamentos where id = '$id' ");
                                                             } ?>

                                                             <div class="alert alert-success">
                                                                       <strong>Success!</strong> partida atualizada com sucesso.
                                                                            <a href="listar_partidas.php?rodada=<?=$rodada?>"><button type="button" class="btn btn-primary">ok</button>
                                                             </div>
                                                            <?php

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
