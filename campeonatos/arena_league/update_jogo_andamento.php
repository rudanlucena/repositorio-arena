<audio autoplay="autoplay">
    <source src="../../audios/gol.mp3" type="audio/mp3" />
    seu navegador não suporta HTML5
</audio>

<?php
    include("conexao.php"); 
    global $db;
    $id_partida = $_GET['id_partida'];
    echo $id_partida;

    $partidas = $db->query("SELECT * from partida where id = '$id_partida' ");
    if($partidas){
        if(mysqli_affected_rows($db) >= 1){
            while ($partida = $partidas->fetch_assoc()){                                                                            
?> 



                <div class="col-md-4">
                    <div class="confrontos">
                        <div class="member-infos">
                            <h5 class="member-name"> <spam class="glyphicon"><img src="../../images/times/escudo.png"></spam> <spam> <?php echo $partida['mandante'];?></spam> <spam class="placar"><?php echo $partida['placar_mandante'].$partida['placar_mandante_penalty'];;?></spam></h5>
                            <h5 class="member-name"> <spam class="glyphicon"><img src="../../images/times/escudo.png"></spam> <spam><?php echo $partida['visitante'];?></spam> <spam class="placar"><?php echo $partida['placar_visitante'].$partida['placar_visitante_penalty'];;?></spam></h5>
                            <h4><spam class="glyphicon glyphicon-play-circle"></h4>           
                        </div><!-- /.member-infos --> 
                    </div><!-- /.team-member -->  
                </div> <!-- /.col-xs-12 -->

<?php         
            }
        $partidas->free(); 
        }                                                    
    }

?>
