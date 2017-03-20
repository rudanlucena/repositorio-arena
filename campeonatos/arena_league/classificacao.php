<?php
    $configuracoes = $db->query("SELECT * from settings");
    if($configuracoes){
        $config = $configuracoes->fetch_assoc();
        $quant_grupos = $config['grupos'];
        $criterio_desempate1 = $config['criterio_desempate1'];
        $criterio_desempate2 = $config['criterio_desempate2'];
        $criterio_desempate3 = $config['criterio_desempate3'];
        $criterio_desempate4 = $config['criterio_desempate4'];  
    }

    for($i=1; $i<=$quant_grupos; $i++){
?>

        <div class="col-md-6 col-sm-6">
            <div class="table-responsive">
                <table class="lista_tabela gallery-content">
                    <thead>
                       <td colspan="9"><div class="titulo_grupo">GRUPO <?php echo($i) ?></div></td>
                    </thead>

                    <tr class="inf_tabela">
                        <th></th>    
                        <th>TIME</th>
                        <th>PTS</th>
                        <th>J</th>
                        <th>V</th>
                        <th>E</th>
                        <th>D</th>
                        <th>SG</th>
                    </tr>
                     
                    <?php
                        $clubes=null;
                        if($criterio_desempate1 == "gs"){
                            $clubes= $db->query("SELECT * FROM clube where grupo='$i' ORDER BY pontos desc, $criterio_desempate1 asc, $criterio_desempate2 desc, $criterio_desempate3 desc, $criterio_desempate4 desc, nome asc");
                        }
                        else if($criterio_desempate2 == "gs"){
                            $clubes= $db->query("SELECT * FROM clube where grupo='$i' ORDER BY pontos desc, $criterio_desempate1 desc, $criterio_desempate2 asc, $criterio_desempate3 desc, $criterio_desempate4 desc, nome asc");
                        }
                        else if($criterio_desempate3 == "gs"){
                            $clubes= $db->query("SELECT * FROM clube where grupo='$i' ORDER BY pontos desc, $criterio_desempate1 desc, $criterio_desempate2 desc, $criterio_desempate3 asc, $criterio_desempate4 desc, nome asc");
                        }
                        else if($criterio_desempate4 == "gs"){
                            $clubes= $db->query("SELECT * FROM clube where grupo='$i' ORDER BY pontos desc, $criterio_desempate1 desc, $criterio_desempate2 desc, $criterio_desempate3 desc, $criterio_desempate4 asc, nome asc");
                        }
                        if($clubes){
                            $cont=1;
                            while ($clube = $clubes->fetch_assoc()){
                    ?>

                                <tr>  
                                    <td class="posicao_time_tabela">
                                      <?=$cont++?>º
                                    </td>

                                    <td class="nome_time_tabela">
                                        <spam class="escudo"><img src="../../images/times/escudo.png"></spam><spam class="member-name"><?=$clube['abreviacao']?></spam>
                                    </td>

                                    <td class="pontos_tabela">
                                        <?=$clube['pontos']?>
                                    </td>

                                    <td class="quantidade_jogos">
                                       <?=$clube['jogos']?>
                                    </td>

                                    <td class="quantidade_vitorias">
                                       <?=$clube['vitorias']?>
                                    </td>

                                    <td class="quantidade_empates">
                                      <?=$clube['empates']?>
                                    </td>

                                    <td class="quantidade_derrotas">
                                       <?=$clube['derrotas']?>
                                    </td>

                                    <td class="saldo_gols">
                                      <?=$clube['sg']?>
                                    </td>
                                </tr>

                    <?php         
                           }
                         $clubes->free();  
                        }
                    ?>

                </table>
            </div><!--./table-responsive-->    
        </div><!--/col--> 
    <?php
         }
    ?>