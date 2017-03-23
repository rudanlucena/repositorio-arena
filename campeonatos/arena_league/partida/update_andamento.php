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
						     include("../adm/ranking.php");

						     $gols_mandante = $_POST['placar_mandante'];
							 $gols_visitante = $_POST['placar_visitante'];
							 $gols_mandante_penalty = $_POST['placar_mandante_penalty'];
							 $gols_visitante_penalty = $_POST['placar_visitante_penalty'];
							 $situacao = $_POST['situacao'];
							 $tempo = $_POST['tempo'];
							 $id = $_POST['id'];

						     $sql ="UPDATE partida set  placar_mandante='$gols_mandante', placar_mandante_penalty='$gols_mandante_penalty', placar_visitante='$gols_visitante', placar_visitante_penalty='$gols_visitante_penalty',  situacao='$situacao', tempo='$tempo' where id='$id'";
						                $result = mysqli_query( $db, $sql);
											         if(!$result)
													     echo '<div class="alert alert-danger">
		                                                          <strong>Error!</strong> não foi atualizar a partida.
		                                                          <a href="../partida/listar_partidas.php"><button type="button" class="btn btn-danger">ok</button>
		                                                      </div>';
													 else{
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
													 	?><div class="alert alert-success">
						                                        <strong>Success!</strong> partida atualizada com sucesso.
						                                        <a href="tempo_real.php?id=<?=$id?>"><button type="button" class="btn btn-primary">ok</button>
						                                    </div>
						                                <?php 
						                                if($situacao == "encerrada")    
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









