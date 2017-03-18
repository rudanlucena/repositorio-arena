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
							include("ranking.php"); 
						               
						            $nome_campeonato = $_POST['nome_campeonato'];
						            $quantidade_grupos = $_POST['quant_grupos'];
						            $criterio_desempate1 = $_POST['criterioDesempate1'];
						            $criterio_desempate2 = $_POST['criterioDesempate2'];
						            $criterio_desempate3 = $_POST['criterioDesempate3'];
						            $criterio_desempate4 = $_POST['criterioDesempate4'];
						            $limite_cartao_amarelo = $_POST['limiteCartaoAmarelo']; 
						            $limite_cartao_vermelho = $_POST['limiteCartaoVermelho']; 
						            $pontos_vitoria = $_POST['pontosVitoria'];
						            $pontos_empate = $_POST['pontosEmpate'];
						            $pontos_derrota = $_POST['pontosDerrota'];


								        $sql ="UPDATE settings set nome_campeonato='$nome_campeonato', grupos='$quantidade_grupos', limite_cartao_amarelo='$limite_cartao_amarelo', limite_cartao_vermelho='$limite_cartao_vermelho', pontos_vitoria='$pontos_vitoria', pontos_empate='$pontos_empate', pontos_derrota='$pontos_derrota', criterio_desempate1='$criterio_desempate1', criterio_desempate2='$criterio_desempate2', criterio_desempate3='$criterio_desempate3', criterio_desempate4='$criterio_desempate4' ";
									    $result = mysqli_query( $db, $sql);

											if(!$result)
												echo '<div class="alert alert-danger">
	                                                        <strong>Error!</strong> não foi possivel atualizar as configurações.
	                                                        <a href="../partida/listar_rodadas.php"><button type="button" class="btn btn-danger">ok</button>
                                                      </div>';
										    else{
										    	ranking();
												echo '<div class="alert alert-success">
											                <strong>Success!</strong> configuraçoes salvas com sucesso.
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











