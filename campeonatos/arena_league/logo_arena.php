<div class="row">
    <div class="col-md-12">
        <div class="templatemo_logo">
            
                <img class="logo_arena" src="../../images/logo_arena/arenam1lg4au.png">
                <?php
                    $settings = $db->query("SELECT nome_campeonato from settings");
                    if($settings){
                        $settings = $settings->fetch_assoc();
                        $nome = $settings['nome_campeonato'];                                             
                    } 
                ?>
                <h1 class="texto_amarelo"><?php echo $nome ?></h1>
        </div> <!-- /.logo -->
    </div> <!-- /.col-md-12 -->
</div> <!-- /.row -->