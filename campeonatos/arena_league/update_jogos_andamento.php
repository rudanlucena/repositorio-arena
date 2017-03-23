<?php
    include("conexao.php"); 
    global $db;

    $partidas = $db->query("SELECT * from partida where situacao = 'andamento' OR situacao = 'intervalo' ");
    if($partidas){
        if(mysqli_affected_rows($db) >= 1){
            while ($partida = $partidas->fetch_assoc()){ 
            $id_partida = $partida['id'];                                                                             
?> 

                <div class="col-md-4">
                    <div class="confrontos">
                        <a href="acompanhar_jogo.php?id_partida=<?=$id_partida?>">
                            <div class="member-infos">
                                <h5 class="member-name"> <spam class="glyphicon"><img src="../../images/times/escudo.png"></spam> <spam> <?php echo $partida['mandante'];?></spam> <spam class="placar"><?php echo $partida['placar_mandante'].$partida['placar_mandante_penalty'];;?></spam></h5>
                                <h5 class="member-name"> <spam class="glyphicon"><img src="../../images/times/escudo.png"></spam> <spam><?php echo $partida['visitante'];?></spam> <spam class="placar"><?php echo $partida['placar_visitante'].$partida['placar_visitante_penalty'];;?></spam></h5>
                                <spam class="glyphicon glyphicon-play"></spam>      
                            </div> </div><!-- /.member-infos -->  
                        </a>  
                    </div><!-- /.team-member -->  
                </div> <!-- /.col-xs-12 -->

<?php         
            }
        $partidas->free(); 
        }                                                    
    }

?>
