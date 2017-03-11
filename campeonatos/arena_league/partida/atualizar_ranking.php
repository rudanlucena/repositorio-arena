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
          include("../conexao.php");
    ?>
    
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
  <link href="../../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
  <link href="../../../css/templatemo_style.css" rel="stylesheet" media="screen">  
</head>
<body>
	<div id="loader"></div>  
    <div class="bg-image"></div>
    <div class="main-content">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">

					<?php
					                //funcao que atualiza os dados dos clubes
					                function ranking(){

					                	global $db;

										$clubes = $db->query('SELECT abreviacao, id FROM clube');
							                if($clubes){

							                    while ($clube = $clubes->fetch_assoc()){

							                    	$time = $clube['abreviacao'];
							                    	$id = $clube['id'];

					                                $jogos_mandante =0; $vitorias_mandante=0; $empates_mandante=0; $derrotas_mandante=0; $gols_marcados_mandante=0; $gols_sofridos_mandante=0;

							                        $partidas = $db->query("SELECT * FROM partida where mandante='$time' and situacao='encerrada' ");
							                        if($partidas){
							                            while ($partida = $partidas->fetch_assoc()){

							                            	$rodada_partida = $partida['rodada'];
							                            	$rodadas = $db->query("SELECT * FROM rodadas where rodada='$rodada_partida'");
											                if(mysqli_affected_rows($db) > 0){
											                    $rodada = $rodadas->fetch_assoc();
											                    if($rodada['fase'] == 'grupos'){

									                                $jogos_mandante++;

									                                if($partida['placar_mandante'] > $partida['placar_visitante'])
									                                	$vitorias_mandante++;		                                  

									                                if($partida['placar_mandante'] == $partida['placar_visitante'])
									                                        $empates_mandante++;

									                                if($partida['placar_mandante'] < $partida['placar_visitante'])
									                                        $derrotas_mandante++;

									                                $gols_marcados_mandante = $gols_marcados_mandante + $partida['placar_mandante'];
									                                
									                                $gols_sofridos_mandante = $gols_sofridos_mandante + $partida['placar_visitante'];
									                            }
									                        }        
							                            }                

									                }
					                                
									                $jogos_visitante =0; $vitorias_visitante=0; $empates_visitante=0; $derrotas_visitante=0; $gols_marcados_visitante=0; $gols_sofridos_visitante=0;
									                
									                $partidas = $db->query("SELECT * FROM partida where visitante='$time'  and situacao='encerrada'");
							                        if($partidas){
							                            while ($partida = $partidas->fetch_assoc()){

							                            	$rodada_partida = $partida['rodada'];
							                            	$rodadas = $db->query("SELECT * FROM rodadas where rodada='$rodada_partida'");
											                if(mysqli_affected_rows($db) > 0){
											                    $rodada = $rodadas->fetch_assoc();
											                    if($rodada['fase'] == 'grupos'){

									                                $jogos_visitante++;

									                                if($partida['placar_visitante'] > $partida['placar_mandante'])
									                                        $vitorias_visitante++;

									                                if($partida['placar_visitante'] == $partida['placar_mandante'])
									                                        $empates_visitante++;

									                                if($partida['placar_visitante'] < $partida['placar_mandante'])
									                                        $derrotas_visitante++;

									                                $gols_marcados_visitante = $gols_marcados_visitante + $partida['placar_visitante'];
									                                $gols_sofridos_visitante = $gols_sofridos_visitante + $partida['placar_mandante'];
									                            }
									                        }        
							                            }                

									                }     

									                $vitorias = $vitorias_mandante + $vitorias_visitante;
									                $jogos = $jogos_mandante + $jogos_visitante;
									                $empates = $empates_mandante + $empates_visitante;
									                $derrotas = $derrotas_mandante + $derrotas_visitante;
									                $gols_marcados = $gols_marcados_mandante + $gols_marcados_visitante;
									                $gols_sofridos = $gols_sofridos_mandante + $gols_sofridos_visitante;
									                $saldo_gols = $gols_marcados - $gols_sofridos;

									                $pontos = ($vitorias * 3) + ($empates * 1) + ($derrotas * 0);
									                    
									   
									                    $sql = "UPDATE clube set pontos='$pontos', jogos='$jogos', vitorias='$vitorias', empates='$empates', derrotas='$derrotas',
									                             gols_marcados='$gols_marcados', gols_sofridos='$gols_sofridos', saldo_gols='$saldo_gols' where id='$id'";

												        $result = mysqli_query( $db, $sql);
												  
													    // Verifica se o comando foi executado com sucesso
													    if(!$result)
													        die("erro ao atualizar a classificacao ".$time. mysqli_error());
													}
                                                      
													?>

					                                    <div class="alert alert-success">
					                                            <strong>Success!</strong> ranking finalizado.
					                                            <a href="../partida/listar_rodadas.php"><button type="button" class="btn btn-primary">ok</button>
					                                    </div>	

													<?php
													   
											    }
										    }
										    ranking();
						mysqli_close($db);				          
					?>
                    </div><!-- /.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

    <script src="../../../js/jquery-1.10.2.min.js"></script>

    <script>
		 $(window).load(function(){
		    $("#loader").fadeOut("slow");
		 });
	 </script> 

</body>
</html>
