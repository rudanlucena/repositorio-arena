<?php
// Incluir aquivo de conexão
include("conexao.php");
 
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$partidas = $db->query("SELECT * FROM partida WHERE rodada ='$valor' and situacao!= 'andamento'");
 
// Exibe todos os valores encontrados
if(mysqli_affected_rows($db) > 0){
	while ($partida = $partidas->fetch_assoc()) { ?>
	        <div class="col-md-12">
                    <div class="confrontos">
                        <div class="member-infos">
                            <h4 class="member-name"><spam class="glyphicon"><img src="../../images/times/escudo.png"></spam> <?php echo $partida['mandante']; ?> <spam class="placar"><?php echo  $partida['placar_mandante']; if($partida['placar_mandante_penalty']){ echo "(".$partida['placar_mandante_penalty'].")";} ?></spam> <spam class="placar"><?php echo $partida['placar_visitante']; if($partida['placar_visitante_penalty']){ echo "(".$partida['placar_visitante_penalty'].")";} ?></spam> <?php echo $partida['visitante']; ?> <spam class="glyphicon"><img src="../../images/times/escudo.png"></spam> </h4>
                            <h5 class="member-name"><?php echo $partida['data_hora_jogo']." ".$partida['hora']; ?></h5>
                        </div><!-- /.member-infos --> 
                    </div><!-- /.confrontos -->  
            </div> <!-- /.col-md-12 --> <?php
	}
}else{
	echo '<div class="texto_amarelo">AINDA NAO HA PARTIDAS AGENDADAS PARA ESTA RODADA</div>';
}
 
?>