<!DOCTYPE html>
<html class="no-js" lang="pt-br"> 
<head>
    <?php  
          include("conexao.php");
          $id = $_GET['id'];
    ?>

    <title>ARENA M1L G4AU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!--<meta http-equiv="refresh"  content="6000">-->
    <meta name="ARENA" content="ARENA">
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
                     

                                <div  class="detalhes_liga">
                                     <div class="page-header">
                                        <h2 class="page-title">LIGAS</h2>
                                     </div> <!-- /.page-header -->

                                     <div class="row">
                                        <?php
                                            $ligas = $db->query("SELECT * FROM liga where id='$id'");
                                            if($ligas){
                                                while($liga = $ligas->fetch_assoc()){
                                        ?>
                                                    <div class="col-md-12 clubes">
                                                      <div class="team-member">
                                                          <div class="member-thumb">
                                                              <img src="images/menus/generic.png" alt="">
                                                          </div>
                                                          <div class="member-infos">
                                                            <h4 class="member-name"><?=$liga['tipo']?></h4>
                                                            <h4 class="member-name nome_liga"><spam class="texto_amarelo"><?=$liga['nome']?></spam></h4>
                
                                                                <div class="social-icons-footer premios">
                                                                    <ul>
                                                                        <?php if($liga['primeiro_lugar']){ ?><li><a target="_parent" class="fa">1°</a><spam> <?=$liga['primeiro_lugar']?> </spam></a></li> <?php } ?>
                                                                        <?php if($liga['segundo_lugar']){ ?><li><a target="_parent" class="fa">2°</a><spam> <?=$liga['segundo_lugar']?> </spam></a></li> <?php } ?>
                                                                        <?php if($liga['terceiro_lugar']){ ?><li><a target="_parent" class="fa">3°</a><spam> <?=$liga['terceiro_lugar']?> </spam></a></li> <?php } ?>
                                                                        <?php if($liga['quarto_lugar']){ ?><li><a target="_parent" class="fa">4°</a><spam> <?=$liga['quarto_lugar']?> </spam></a></li> <?php } ?>
                                                                        <?php if($liga['quinto_lugar']){ ?> <li><a target="_parent" class="fa">5°</a><spam> <?=$liga['quinto_lugar']?> </spam></a></li> <?php } ?>
                                                                    </ul>
                                                                </div>
                                                                <?php if($liga['clubes']){ ?><h6 class="member-name">Clubes: <?=$liga['clubes']?></h6>  <?php } ?>
                                                                <h6 class="member-name"><spam class="glyphicon glyphicon-map-marker"></spam> <?=$liga['local']?></h6>
                                                                <h6 class="member-name"><spam class="glyphicon glyphicon-calendar"></spam> <?=$liga['data']?></h6>
                                                                <?php if($liga['hora']){ ?><h6 class="member-name"><spam class="glyphicon glyphicon-time"></spam> <?=$liga['hora']?></h6>  <?php } ?>
                                                                <h6 class="member-name"><spam class="glyphicon">R$</spam><?=$liga['inscricao']?></h6>
                                                                <h6 class="member-name"><spam class="glyphicon glyphicon-user"></spam> <?=$liga['organizador']?></h6>
                                                                <h6 class="member-name"><spam class="glyphicon glyphicon-phone"></spam><?=$liga['fone']?></h6>
                                                                <a href='<?=$liga['facebook']?>'><h6 class="member-name"><spam class="glyphicon fa fa-facebook"></spam><?=$liga['facebook']?></h6></a>

                                                            <div class="button_form">
                                                                <a href="index.php"><button type="button" class="btn btn-success"><spam class="glyphicon glyphicon-backward"></spam>voltar</button></a>
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
                
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.main-content -->

    
    <script src="bootstrap-3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.lightbox.js"></script>
    <script src="js/templatemo_custom.js"></script>

    <script>
         $(window).load(function(){
            $("#loader").fadeOut("slow");
         });
    </script> 
    
<!--   -->
</body>

</html>
