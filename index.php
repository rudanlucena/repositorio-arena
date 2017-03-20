<!DOCTYPE html>
<html class="no-js" lang="pt-br"> 
<head>
    <title>ARENA M1L G4AU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="O ARENA M1L G4AU É UM SITE ESPORTIVO QUE TEM COMO OBJETIVO DIVULGAR OS PRINCIPAIS CAMPEONATOS/TORNEIOS LOCAIS. NA PAGINA INICIAL É POSSIVEL VISUALIZAR TODOS OS CAMPEONATOS/TORNEIOS QUE SERÃO REALIZADOS, O MESMO SUPORTA TODOS OS FORMATOS DE CAMPEONATO. ATRAVÉZ DE NOSSA PAGINA VOCÊ FICA POR DENTRO DAS PRINCIPAIS COMPETIÇÕES QUE ACONTECEM NA CIDADA.">
    <meta name="author" content="ARENAM1lG4AU">
    <meta name="keywords" content="arena, arenamilgrau, arenam1lg4au, local, torneios, campeonatos, futebol, divulgacao, mauriti, contato">
    <meta charset="UTF-8">
    
    <!-- CSS -->
    <link href="bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/font-awesome.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/templatemo_style.css" rel="stylesheet" media="screen">
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="images/logo_arena/arenam1lg4au_mobile.png">
    
    <!-- JavaScripts -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/modernizr.js"></script>
    <?php
       include("conexao.php");
    ?>

      <style>
      .carousel-inner > .item > img,
      .carousel-inner > .item > a > img {
          width: auto;
          margin: auto;
      }
      #myCarousel{
        margin-bottom: 30px;
      }

      .language-select { text-align: center; position: relative; z-index: 9999; top: 30px; margin-bottom: 60px; }
      </style>
      

</head>

<body>
    <div id="loader"></div> 
    <div class="bg-image"></div>
    <div class="overlay-bg"></div>
    
    <div class="main-content">
        <div class="container">
            <div class="row">
            
                <!-- Begin Content -->
                <div class="col-md-12">

                               <div class="row">
                                    <div class="col-md-12">
                                        <div class="templatemo_logo">
                                                <img class="logo_arena" src="images/logo_arena/arenam1lg4au.png">
                                                <h1 class="texto_amarelo">ARENA M1l G4AU</h1>
                                        </div> <!-- /.logo -->
                                    </div> <!-- /.col-md-12 -->
                                </div> <!-- /.row -->


                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                      <!-- Indicators -->
                                      <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                      </ol>

                                      <!-- Wrapper for slides -->
                                      <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                          <a href="#"><img src="images/slide/playStore.png" alt="M1LG4AU">
                                          <div class="carousel-caption">
                                          </div></a>
                                        </div>


                                        <div class="item">
                                          <img src="images/slide/modelo-frente.jpg" alt="M1LG4AU">
                                          <div class="carousel-caption">
                                            <h3>Anuncie Aqui</h3>
                                            <p>.</p>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- Left and right controls -->
                                      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                     </a>
                                  </div>

                                  <div class="page-header">
                                        <h2 class="page-title">CAMPEOANATOS</h2>
                                     </div> <!-- /.page-header -->

                                  <div class="language-select ">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select name="cat2" onchange="javascript: abrejanela(this.value)">
                                                <option value="#" selected>-- SELECIONE --</option>
                                                <?php
                                                   $campeonatos = $db->query("SELECT * FROM campeonatos");
                                                   if(mysqli_affected_rows($db) > 0){
                                                      while($campeonato = $campeonatos->fetch_assoc()){
                                                ?>
                                                            <option value='campeonatos/<?=$campeonato['link']?>/index.php'><?php echo $campeonato['nome'];?></option>
                                                <?php
                                                      }
                                                      $campeonatos->free();
                                                    }   
                                                ?>

                                                
                                            </select>
                                        </div> <!-- /.col-md-12 -->
                                    </div> <!-- /.row -->
                                </div> <!-- /.language-select -->
                                                               
                     

                                <div  class="ligas">
                                     <div class="page-header">
                                        <h2 class="page-title">TORNEIOS</h2>
                                     </div> <!-- /.page-header -->

                                     <div class="row">
                                        <?php
                                            $ligas = $db->query("SELECT * FROM liga");
                                            if($ligas){
                                                while($liga = $ligas->fetch_assoc()){
                                        ?>
                                                    <div class="col-md-3 clubes">
                                                      <div class="team-member">
                                                          <div class="member-thumb">
                                                              <img src="images/menus/generic.png" alt="">
                                                          </div>
                                                          <div class="member-infos">
                                                            <h5 class="member-name"><spam class="texto_amarelo"><?=$liga['nome']?></spam></h5>
                                                            <h6 class="member-name"><spam class="glyphicon glyphicon-map-marker"></spam><?=$liga['local']?></h6>
                                                            <h6 class="member-name"><spam class="glyphicon glyphicon-calendar"></spam><?=$liga['data']?></h6>
                                                            <h6 class="member-name"><spam class="glyphicon glyphicon-user"></spam> <?=$liga['organizador']?></h6>
                                                            <div class="button_form">
                                                                <a href="detalhes_liga.php?id=<?=$liga['id']?>"><button type="button" class="btn btn-success"><spam class="glyphicon glyphicon-list"></spam>mais</button></a>
                                                            </div>
                                                          </div>
                                                      </div>
                                                    </div> <!-- /.col-md-3-->

                                        <?php
                                               }
                                               $ligas->free();
                                           }

                                        ?>            
                                     </div><!--/row-->
                                </div> <!-- /.ligas-->

                                  
                                    <div class="content-inner">
                                        <div class="row services">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="service">

                                                    <div class="header">
                                                        <div class="header-bg"></div>
                                                        <div class="service-header">
                                                            <h4 class="service-title"><spam><img src="images/logo_arena/arenam1lg4au_mobile.png"></spam></h4>
                                                        </div>
                                                    </div>

                                                    <div class="body">
                                                        <div class="quem_somos">
                                                            <div class="col-md-8">
                                                                O ARENA M1L G4AU É UM SITE ESPORTIVO QUE TEM COMO OBJETIVO DIVULGAR OS PRINCIPAIS CAMPEONATOS/TORNEIOS LOCAIS.
                                                                NA PAGINA INICIAL É POSSIVEL VISUALIZAR TODOS OS CAMPEONATOS/TORNEIOS QUE SERÃO REALIZADOS, O MESMO SUPORTA TODOS OS FORMATOS DE CAMPEONATO.
                                                                ATRAVÉZ DE NOSSA PAGINA VOCÊ FICA POR DENTRO DAS PRINCIPAIS COMPETIÇOES QUE ACONTECEM NA CIDADA. VEJA A POSIÇÃO DO SEU TIME NA TABELA, 
                                                                O ARTILHEIRO DO CAMPEONATO, E OS RESULTADOS DOS OUTROS CLUBES. VOCÊ TAMBEM PODE VER O ELENCO DAS EQUIPES E DETALHES SOBRE OS JOGADORES.
                                                                O ARENA M1L G4AU TAMBEM CONTA FERRAMENTA DE JOGOS EM TEMPO REAL, ONDE VOCÊ PODE ACOMPANHAR OS RESULTADOS DOS JOGOS EM ANDAMENTO.
                                                                É MUITO FACIL DIVULGAR SEU CAMPEONATO NA NOSSA ARENA, ENTRE EM CONTATO CONOSCO.         
                                                            </div>
                                                        </div><!-- /.quem_somos-->

                                                        <div class="col-md-4">
                                                            <div class="information">
                                                                <h3 class="widget-title">Contatos da arena:</h3>
                                                                <ul class="our-location">
                                                                    
                                                                    <li><span><i></i>whatsapp:</span>(83) 99145 - 4106</li>
                                                                    <li><span><i></i>whatsapp:</span>(88) 99985 - 9188</li>
                                                                    <li><span><i class="fa fa-phone"></i></span>(83) 99891 - 4084</li>
                                                                    <li><a href="https://www.facebook.com/Arena-M1lg4au-1083495895100623/?ref=ts&fref=ts"><span><i class="fa fa-facebook"></i></span>Arena M1lg4au</a></li>
                                                                    <li><span><i></i>Email:</span>arenamilgrau@gmail.com</li>
                                                                </ul>
                                                            </div> <!-- /.information -->
                                                        </div> <!-- /.col-md-4 -->

                                                    </div><!-- /.body -->
                                                </div><!-- /.service -->
                                            </div> <!-- /.col-md-12 -->   
                                        </div> <!-- /.row -->
                                    </div> <!-- /.content-inner -->
                               
  
                                <div class="site-footer">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="copyright-text">Copyright &copy; ARENA M1L G4AU 
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-icons-footer">
                                                <ul>
                                                    <li><a target="_parent" href="https://www.facebook.com/Arena-M1lg4au-1083495895100623/?ref=ts&fref=ts" class="fa fa-facebook"></a></li>
                                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                                    <li><a href="#" class="fa fa-linkedin"></a></li>
                                                    <li><a href="#" class="fa fa-instagram"></a></li>
                                                    <li><a href="#" class="fa fa-rss"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /.site-footer -->             
                
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.main-content -->

    
    <script src="bootstrap-3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.lightbox.js"></script>
    <script src="js/templatemo_custom.js"></script>
    <script src="update_jogos.js"></script> 

    <script type="text/javascript">
        function abrejanela(url){
            location.href=url;
        }
        $(window).load(function(){
          $("#loader").fadeOut("slow");
       });
    </script>
    
<!--   -->
</body>

</html>
