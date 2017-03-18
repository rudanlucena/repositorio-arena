<!DOCTYPE html>
<html class="no-js" lang="pt-br"> 
<head>
    <title>ARENA M1L G4AU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!--<meta http-equiv="refresh"  content="6000">-->
    <meta name="ARENA" content="ARENA">
    <meta charset="UTF-8">
    
    <!-- CSS -->
    <link href="../../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../../css/font-awesome.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../../css/templatemo_misc.css">
    <link rel="stylesheet" href="../../css/animate.css">
    <link href="../../css/templatemo_style.css" rel="stylesheet" media="screen">
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="../../images/logo_arena/arenam1lg4au_mobile.png">
    
    <!-- JavaScripts -->
    <script src="../../js/jquery-1.10.2.min.js"></script>
    <script src="../../js/modernizr.js"></script>
    <script type="text/javascript" src="funcs.js"></script>
    
    <?php
        include("conexao.php"); 
    ?>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-90935951-1', 'auto');
      ga('send', 'pageview');

    </script>    
</head>
    
<body>
    <div id="loader"></div>
    <div class="bg-image"></div>
    <div class="overlay-bg"></div>

    <!-- menu para dispositivos moveis-->
    <div class="responsive-navigation visible-sm visible-xs">
        <a href="#" class="menu-toggle-btn">
            <i class="fa fa-bars fa-2x"></i>
        </a>
        <div class="responsive_menu">
            <ul class="main_menu">
                <li><a href="../../index.php" data-toggle="tooltip" data-original-title="ligas"><spam class="glyphicon glyphicon-home"></spam><i></i>Arena</a></li>
                <li><a class="show-1 homebutton" href="#" data-toggle="tooltip" data-original-title="Informações da liga"><spam><img src="../../images/times/trofeu.png" ></spam><i class="fa"></i>Liga</a></li>
                <li><a class="show-2" href="#" data-toggle="tooltip" data-original-title="Artilheiro"><spam><img src="../../images/times/artilheiro.png" ></spam><i class="fa"></i>Artilheiro</a></li>
                <li><a class="show-4" href="#" data-toggle="tooltip" data-original-title="Elencos"><spam><img src="../../images/times/escudo.png" ></spam><i class="fa"></i>Elencos</a></li>
                
            </ul> <!-- /.main_menu -->
        </div> <!-- /.responsive_menu -->
    </div> <!-- /responsive_navigation -->
    
    <div class="main-content">
        <div class="container">
            <div class="row">

                <!-- menu estatico -->
                <div class="col-md-2 visible-md visible-lg">
                    <div class="main_menu">
                        <div class="menu_fifa">
                            <a href="../../index.php" data-toggle="tooltip"><div class="menu_item"><spam class="glyphicon glyphicon-home"></spam>ARENA</div></a>
                            <a class="show-1 homebutton" href="#"><div class="menu_item">JOGOS</div></a>
                            <a class="show-2" href="#" data-toggle="tooltip"><div class="menu_item">ARTILHEIROS</div></a>
                            <a class="show-4" href="#" data-toggle="tooltip"><div class="menu_item">CLUBES</div></a>  
                            
                        </div>
                    </div> <!-- /.main-menu -->
                </div> <!-- /.col-md-2 -->

                <!-- Begin Content -->
                <div class="col-md-10">

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
                     

                    <div id="menu-container">
<!--===========================================================================================================================================================-->

<!--=====================================pagina inicial (jogos da rodada e tabela de classificação)============================================================-->
    
                        <div id="menu-1" class="homepage">
                            <div class="content-inner">
    <!-- _________________________________________________________ jogos em andamento ________________________________________________________________________ -->
                                <div class="row services">
                                    <div class="col-md-12 col-sm-12">

                                        <div class="service">
                                                <div class="header">
                                                    <div class="header-bg"></div>
                                                    <div class="service-header">
                                                        <h3 class="service-title">
                                                            BOLA ROLANDO
                                                        </h3>
                                                    </div>
                                                </div>

                                            <div class="body">
                                                <div class="row">
                                                    <div id="update_jogos">

                                                    </div>
                                                </div>      
                                            </div><!-- /.body -->
                                        </div> <!-- /.services --> 

                                    </div> <!-- /.col-md-4 -->   
                                </div> <!-- /.row -->
    <!-- _____________________________________________________________________________________________________________________________________________________ -->                            
     
     <!-- ______________________________________________________________________ tabela de jogos ______________________________________________________________ -->                                                       <div class="page-header">
                                    <h2 class="page-title">JOGOS DA RODADA</h2>
                                </div> <!-- /.page-header -->

                                <div class="row services">
                                    <div class="col-md-12 col-sm-12">

                                        <div class="service">
                                                <div class="header">
                                                    <div class="header-bg"></div>
                                                    <div class="service-header">

                                                        <form class="buscarPartidas">
                                                            <select class="postform" name="rodada" id="busca" onchange="buscarJogos(this.value)" />
                                                                                                                                                  
                                                                <?php
                                                                    $rodadas = $db->query("SELECT * from rodadas order by rodada desc");
                                                                    if($rodadas){
                                                                        while ($rodada = $rodadas->fetch_assoc()){ ?>
                                                                            <option value='<?=$rodada['rodada']?>'><?php echo "Rodada: ".$rodada['rodada']." - Fase: ".$rodada['fase'];?></option> 
                                                                            
                                                                        <?php $ultima_rodada =  $rodada['rodada']; $ultima_fase=$rodada['fase'];
                                                                        }
                                                                        $rodadas->free();  
                                                                    } ?>
                                                                    
                                                            </select>
                                                        </form>    
                                                          
                                                    </div>
                                                </div>

                                            <div class="body">
                                                <div vlass="table-responsive">
                                                    <div class="row">
                                                        <div id="rodada_jogos">
                                                            
                                                        </div>

                                                        <script type="text/javascript">
                                                            var rodada = document.getElementById('busca');
                                                            buscarJogos(rodada.value);
                                                        </script>
                                                        
                                                    </div> 
                                                </div>    
                                            </div><!-- /.body -->
                                        </div> <!-- /.services -->    
                                    </div> <!-- /.col-md-4 -->   
                                </div> <!-- /.row -->
    <!-- _____________________________________________________________________________________________________________________________________________________ -->                                                      


    <!-- ________________________________________________________________ classificação _______________________________________________________________________ -->

                                <div  class="fase_de_grupos">

                                     <div class="page-header">
                                        <h2 class="page-title">FASE DE GRUPOS</h2>
                                     </div> <!-- /.page-header -->

                                     <div class="row">
                                         <?php
                                            include("classificacao.php");
                                         ?>
                                     </div><!--/row-->    
                                </div> <!-- /.fase_de_grupos-->
    <!-- _____________________________________________________________________________________________________________________________________________________ -->
                                                            
                            </div> <!-- /.content-inner -->
                        </div> <!-- /.homepage -->

<!--===========================================================================================================================================================-->




<!--========================================================== pagina do ranking de artilheiros ===============================================================-->
                        <div id="menu-2" class="content about-us">
                            <div class="content-inner">
                                <div class="row services">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="service">

                                            <div class="header">
                                                <div class="header-bg"></div>
                                                <div class="service-header">
                                                    <div class="icon">
                                                        <spam><img src="../../images/bola.png"></spam>
                                                    </div>
                                                    <h4 class="service-title">ARTILHEIROS</h4>
                                                </div>
                                            </div>

                                                <div class="body">
                                                    <div class="table-responsive">
                                                        <div class="artilheiros">
                                                                <table class="lista_artilheiro">

                                                                        <tr class="texto_amarelo">
                                                                            <th></th><!--RANKING-->
                                                                             
                                                                            <th>JOGADOR</th>
                                                                            <th><img src="../../images/times/escudo.png"></th>
                                                                            <th><img src="../../images/bola.png"></th>
                                                                        </tr> 
                                                                         
                                                                        <?php
                                                                           $artilheiros = $db->query('SELECT * FROM `jogadores`  where gols>=1 order by gols desc, nome asc');
                                                                            if($artilheiros){
                                                                                $cont = 1;
                                                                                while ($artilheiro = $artilheiros->fetch_assoc()){
                                                                        ?>

                                                                            <tr class="linha_artilheiro">  

                                                                                <td class="texto_amarelo">
                                                                                    <?=$cont++?>º
                                                                                </td>

                                                                                <td > 
                                                                                    <div class="nome_jogador">
                                                                                        <spam class="member-name"><?=$artilheiro['nome']?></spam> 
                                                                                        <div class="posicao_jogador">
                                                                                            <span class="member-name"><?=$artilheiro['posicao']?></span> 
                                                                                            <span class="member-name"><?=$artilheiro['num_camisa']?></span> 
                                                                                        </div>
                                                                                     </div> 
                                                                                </td> 

                                                                                <td> 
                                                                                    <div class="time_artilheiro">
                                                                                        <spam class="member-name"><?=$artilheiro['clube']?></spam>                                                                                            
                                                                                    </div> 
                                                                                </td> 

                                                                                <td> 
                                                                                    <div class="gols_artilheiro">
                                                                                        <spam class="gallery-title gols"><?=$artilheiro['gols']?></spam>                                                                                                                                                                              
                                                                                     </div>
                                                                                </td> 
                                                                            </tr>
                                                                    
                                                                        <?php         
                                                                                }
                                                                              $artilheiros->free(); 
                                                                            }
                                                                        ?>                                                              

                                                                </table>  
                                                            
                                                        </div><!--/.artilheiros-->
                                                    </div><!--/.table-responsive-->
                                                </div><!-- /.body-->
                                            </div><!--/.service-->
                                       </div> <!-- /.col-md-12 -->
                                  </div> <!-- /.row -->
                             </div> <!-- /.content-inner -->
                        </div> <!-- /.about-us (ARTILHEIRO PAGE)-->
<!--===========================================================================================================================================================-->




<!--===================================================================pagina do regulamento ==================================================================-->
                        <!--<div id="menu-3" class="content">
                            <div class="content-inner">
                                <div class="row services">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="service">

                                            <div class="header">
                                                <div class="header-bg"></div>
                                                <div class="service-header">
                                                    <div class="icon">
                                                        <spam><img src="../../images/regulamento.png">
                                                    </div>
                                                    <h4 class="service-title">REGULAMENTO</h4>
                                                </div>
                                            </div>

                                            <div class="body">
                                                <div class="regulamento">
                                                    <iframe src="/ScrumeXPDiretodasTrincheiras.pdf" style="border: none;"></iframe>
                                                </div>
                                            </div>.

                                        </div>
                                    </div> 
                                </div> 
                            </div> 
                        </div>-->
<!--===========================================================================================================================================================-->




<!--=============================================================== elencos dos clubes ========================================================================-->                        
                        <div id="menu-4" class="content">

                            <div class="page-header">
                                <h2 class="page-title">CLUBES</h2>
                            </div> <!-- /.page-header -->

                            <div class="content-inner">
                                <div class="row services">

                                    <?php
                                        $clubes = $db->query("SELECT * from clube order by nome");
                                        if($clubes){
                                            while ($clube = $clubes->fetch_assoc()){
                                                $time = $clube['nome'];
                                                $abreviacao = $clube['abreviacao'];  
                                    ?> 

                                        <div class="col-md-12 col-sm-12">


                                            <div class="service">

                                                <div class="header">
                                                    <div class="header-bg"></div>
                                                    <div class="service-header">
                                                        <div class="icon">
                                                            <spam><img src="../../images/times/escudo.png">
                                                        </div>
                                                        <h4 class="service-title"><?=$clube['nome']?> (<?=$clube['abreviacao']?>)</h4>
                                                    </div>
                                                </div>
                
                                                    <div class="body">
                                                        <div class="row">
                                                            
                                                                <div class="elenco col-md-8">

                                                                    <div class="detalhes_clube">
                                                                            <p><h3>ELENCO</h3></p>
                                                                    </div>

                                                                    

                                                                    <div class="table-responsive">
                                                                
                                                                        <table  class="lista_artilheiro elenco_jogadores">
                                                                         
                                                                            <tr>
                                                                                <thead>
                                                                                    <th></th>
                                                                                    <th class="texto_amarelo">JOGADOR</th>
                                                                                    <th><spam class="cartao"><img src="../../images/bola.png"></spam></th>
                                                                                    <th><spam class="cartao"><img src="../../images/cartao_amarelo.png"></spam></th>
                                                                                    <th> <spam class="cartao"><img src="../../images/cartao_vermelho.png"></spam></th>
                                                                                </thead>
                                                                            </tr>
                                                                                              
                                                                            <?php
                                                                                $jogadores = $db->query("SELECT * from jogadores where clube='$time' order by nome");
                                                                                if($jogadores){
                                                                                    while ($jogador = $jogadores->fetch_assoc()){
                                                                            ?>

                                                                                <tr  class="linha_artilheiro detalhes_clube">

                                                                                    <td class="img_artilheiro">
                                                                                        <img src="../../images/times/jogador.png" >
                                                                                    </td>

                                                                                    <td> 
                                                                                        <div class="nome_jogador">
                                                                                            <spam class="member-name"><?=$jogador['nome']?></spam> 
                                                                                                <div class="posicao_jogador">
                                                                                                    <span ><?=$jogador['posicao']?></span>
                                                                                                    <span><?=$jogador['num_camisa']?></span> 
                                                                                                </div>
                                                                                        </div> 
                                                                                    </td> 

                                                                                    <td><?=$jogador['gols']?></td>
                                                                                    <td><?=$jogador['cartao_amarelo']?></td>
                                                                                    <td><?=$jogador['cartao_vermelho']?></td>      
                                                                                </tr>

                                                                            <?php         
                                                                                        }
                                                                                    $jogadores->free(); 
                                                                                }
                                                                            ?> 

                                                                                <tr>
                                                                                    <td colspan="5">
                                                                                        <div><h4>TÉCNICO</h4></div>
                                                                                        <div class="member-name"><h5>(<?=$clube['tecnico']?>)</h5></div>
                                                                                    </td>
                                                                                </tr> 

                                                                        </table>
                                                                    </div><!-- /.table-responsive-->
                                                                </div><!-- /.elenco-->

                                                                <div class="historico_clube col-md-4">
                                                                    <div class="row">

                                                                        <div class="col-md-12">
                                                                                <p><h3>CONFRONTOS<span class="glyphicon glyphicon-export"></span></h3></p>
                                                                        </div>

                                                                                <?php
                                                                                    $partidas = $db->query("SELECT * from partida where (visitante='$abreviacao' or mandante='$abreviacao') and situacao ='encerrada'");
                                                                                     if($partidas){
                                                                                            while ($partida = $partidas->fetch_assoc()){      
                                                                                ?> 

                                                                                    <div class="col-md-12">
                                                                                        <div class="table-responsive">
                                                                                            <div class="confrontos">
                                                                                                <div class="member-infos">
                                                                                                    <h5 class="member-name"> <spam class="glyphicon"><img src="../../images/times/escudo.png"></spam> <spam><?php echo $partida['mandante'];?></spam>  <spam class="placar"><?php echo $partida['placar_mandante'];?> <?php echo $partida['placar_visitante'];?></spam> <spam><?php echo $partida['visitante'];?></spam> <spam class="glyphicon"><img src="../../images/times/escudo.png"></spam> </h5>
                                                                                                </div><!-- /.member-infos --> 
                                                                                            </div><!-- /.confrontos -->
                                                                                        </div>  
                                                                                    </div> <!-- /.col-xs-12 -->

                                                                                <?php         
                                                                                      }
                                                                                     $partidas->free(); 
                                                                                   }
                                                                                ?>
                                                                    </div>         

                                                                </div><!--/.historico_clube-->
                                                        </div><!--/.row-->
                                                    </div><!-- /.body -->      
                                            </div><!-- /.service -->
                                        </div> <!-- /.col-md-12 -->

                                    <?php         
                                                }
                                            $clubes->free(); 
                                        }
                                    ?> 

                                </div> <!-- /.row -->
                            </div> <!-- /.content-inner -->
                        </div> <!-- /.services -->
<!--===========================================================================================================================================================-->                        




<!--========================================================================== quem somos? ======================================================================-->                        
                        
<!--===========================================================================================================================================================-->



<!--=========================================================================  footer  ==========================================================================-->                        
                        <div class="site-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="copyright-text">Copyright &copy; ARENA M1L G4AU 
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <div class="social-icons-footer">
                                        <ul>
                                            <li><a target="_parent" href="http://www.facebook.com/arenam1lg4au" class="fa fa-facebook"></a></li>
                                            <li><a href="#" class="fa fa-twitter"></a></li>
                                            <li><a href="#" class="fa fa-linkedin"></a></li>
                                            <li><a href="#" class="fa fa-instagram"></a></li>
                                            <li><a href="#" class="fa fa-rss"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.site-footer -->

                    </div> <!-- /.content-holder -->
                
                </div> <!-- /.col-md-10 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.main-content -->

    
    <script src="../../bootstrap-3.7/js/bootstrap.min.js"></script>
    <script src="../../js/jquery.mixitup.min.js"></script>
    <script src="../../js/jquery.nicescroll.min.js"></script>
    <script src="../../js/jquery.lightbox.js"></script>
    <script src="../../js/templatemo_custom.js"></script>
    <script src="update_jogos.js"></script>

    <script>
         $(window).load(function(){
            $("#loader").fadeOut("slow");
         });
    </script> 
    
<!--   -->
</body>
    <?php
        mysqli_close($db);
    ?>
</html>
