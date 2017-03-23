<?php
    include("conexao.php"); 
    global $db;
    $id_partida = $_GET['id_partida'];
    
    $partidas = $db->query("SELECT * from partida where id = '$id_partida' ");
    if($partidas){
        if(mysqli_affected_rows($db) >= 1){
            if($partida = $partidas->fetch_assoc()){
                $gols_mandante = $partida['placar_mandante'];
                $gols_visitante = $partida['placar_visitante']; 
                $gols_mandante_penalty = $partida['placar_mandante_penalty'];
                $gols_visitante_penalty = $partida['placar_visitante_penalty']; 

                $aux = $db->query("SELECT * from aux_jogos_andamentos where id = '$id_partida' ");
                if($aux){
                    if(mysqli_affected_rows($db) >= 1){
                        $aux = $aux->fetch_assoc();
                        if($gols_mandante > $aux['placar_mandante']){?>
                            <audio autoplay="autoplay">
                                <source src="../../audios/gol.mp3" type="audio/mp3" />
                                seu navegador não suporta HTML5
                            </audio>
                         <?php }
                        if($gols_visitante > $aux['placar_visitante']){?>
                            <audio autoplay="autoplay">
                                <source src="../../audios/gol.mp3" type="audio/mp3" />
                                seu navegador não suporta HTML5
                            </audio>
                         <?php }
                        if($gols_mandante_penalty > $aux['placar_mandante_penalty']){?>
                            <audio autoplay="autoplay">
                                <source src="../../audios/gol.mp3" type="audio/mp3" />
                                seu navegador não suporta HTML5
                            </audio>
                         <?php }
                        if($gols_visitante_penalty > $aux['placar_visitante_penalty']){?>
                            <audio autoplay="autoplay">
                                <source src="../../audios/gol.mp3" type="audio/mp3" />
                                seu navegador não suporta HTML5
                            </audio>
                         <?php }

                        if(($aux['placar_mandante'] != $gols_mandante) or ($aux['placar_visitante'] != $gols_visitante) or ($aux['placar_mandante_penalty'] != $gols_mandante_penalty) or ($aux['placar_visitante_penalty'] != $gols_visitante_penalty)){
                            $result = $db->query("UPDATE aux_jogos_andamentos SET placar_mandante='$gols_mandante', placar_visitante='$gols_visitante', placar_mandante_penalty='$gols_mandante_penalty', placar_visitante_penalty='$gols_visitante_penalty' ");    
                        }
                    } 
                }                                                                        
?> 

                <div class="col-md-12">
                    <div class="confrontos">
                        <div class="member-infos">
                            <h5 class="member-name"> <spam class="glyphicon"><img src="../../images/times/escudo.png"></spam> <spam> <?php echo $partida['mandante'];?></spam> <spam class="placar"><?php echo $partida['placar_mandante'].$partida['placar_mandante_penalty'];;?></spam></h5>
                            <h5 class="member-name"> <spam class="glyphicon"><img src="../../images/times/escudo.png"></spam> <spam><?php echo $partida['visitante'];?></spam> <spam class="placar"><?php echo $partida['placar_visitante'].$partida['placar_visitante_penalty'];;?></spam></h5>
                            <h5 class="member-name tempo"> <spam class="glyphicon glyphicon-time"></spam> <?php echo $partida['tempo']." MIM"; ?> <h5>
                            <h5><?php if($partida['situacao'] == 'intervalo'){ ?><spa class="texto_amarelo">intervalo</span><?php } ?></h5>                       
                        </div><!-- /.member-infos --> 
                    </div><!-- /.team-member -->  
                </div> <!-- /.col-xs-12 -->

<?php         
            }
        $partidas->free(); 
        }


    }

?>
