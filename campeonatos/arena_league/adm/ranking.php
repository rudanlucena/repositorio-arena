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
								   
						    }
					    }
          
?>