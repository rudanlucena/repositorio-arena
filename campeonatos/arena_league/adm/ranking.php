<meta charset="UTF-8">
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
			                    if($rodada['fase'] == "GRUPOS"){
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
			                    if($rodada['fase'] == "GRUPOS"){
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

	                $sql = "SELECT pontos_vitoria, pontos_empate, pontos_derrota  FROM settings";
	                $pontos_jogo = $db->query($sql);
	                if($pontos_jogo){
                        $ponto = $pontos_jogo->fetch_assoc();
	                	$pontos_vitoria = $ponto['pontos_vitoria'];
	                	$pontos_empate = $ponto['pontos_empate'];
	                	$pontos_derrota = $ponto['pontos_derrota'];

	                	$pontos_clube_atual = ($vitorias * $pontos_vitoria) + ($empates * $pontos_empate) + ($derrotas * $pontos_derrota);	                	   
	   
	                    $sql = "UPDATE clube set pontos='$pontos_clube_atual', jogos='$jogos', vitorias='$vitorias', empates='$empates', derrotas='$derrotas',
	                             gm='$gols_marcados', gs='$gols_sofridos', sg='$saldo_gols' where id='$id'";

				        $result = mysqli_query( $db, $sql);
				  
					    // Verifica se o comando foi executado com sucesso
					    if(!$result){?>
                            <div class="alert alert-danger">
                              <strong>Error!</strong>falha ao atualizar a classificacao do clube:<?php echo $time; ?>.
                                  <a href="../partida/listar_rodadas.php"><button type="button" class="btn btn-danger">ok</button>
                            </div><?php 
					    }
	                } 

					else{
						return false;
					}
					    				                
				}
					   
			}
			return true;
	}
          
?>