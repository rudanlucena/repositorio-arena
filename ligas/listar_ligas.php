<!DOCTYPE html>
<html class="no-js" lang="pt-br"> 
<head>
    <?php
            session_start();
            if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
            {
              unset($_SESSION['login']);
              unset($_SESSION['senha']);
              header('location:index.php');
            }

            $logado = $_SESSION['login'];
    ?>

    <title>LIGAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!--<meta http-equiv="refresh"  content="6000">-->
    <meta name="ARENA" content="ARENA">
    <meta charset="UTF-8">
    
    <!-- CSS -->

    <link href="../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    
    <link href="../css/font-awesome.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../css/templatemo_misc.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link href="../css/templatemo_style.css" rel="stylesheet" media="screen">
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="images/logo_arena/arenam1lg4au_mobile.png">
    
    <!-- JavaScripts -->
    <script src="../js/jquery-1.10.2.min.js"></script>
    <script src="../js/modernizr.js"></script>

    <?php
       include("../conexao.php");
    ?>    
</head>

<body>

    <?php
        include("menu_ligas.php");
    ?>
   
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
                                                <img class="logo_arena" src="../images/logo_arena/arenam1lg4au.png">
                                                <h1 class="texto_amarelo">ARENA M1l G4AU</h1>
                                        </div> <!-- /.logo -->
                                    </div> <!-- /.col-md-12 -->
                                </div> <!-- /.row -->                     

                                <div  class="ligas">
                                     <div class="page-header">
                                        <h2 class="page-title">LIGAS</h2>
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
                                                              <img src="../images/menus/generic.png" alt="">
                                                          </div>
                                                          <div class="member-infos">
                                                            <h5 class="member-name texto_amarelo"><?=$liga['nome']?></h5>
                                                            <h6 class="member-name"><spam class="glyphicon glyphicon-map-marker"></spam><?=$liga['local']?></h6>
                                                            <h6 class="member-name"><spam class="glyphicon glyphicon-calendar"></spam><?=$liga['data']?></h6>
                                                            <h6 class="member-name"><spam class="glyphicon glyphicon-time"></spam><?=$liga['hora']?></h6>
                                                            <h6 class="member-name"><spam class="glyphicon glyphicon-user"></spam><?=$liga['organizador']?></h6>
                                                                <ul class="member-social">
                                                                  <li><a href="editar_liga.php?id=<?=$liga['id']?>"><span class="glyphicon glyphicon-pencil"></span></a></li>
                                                                  <li class="excluir_liga"><a href="termo_excluir_liga.php?id=<?=$liga['id']?>"><span class="glyphicon glyphicon-trash"></span></a></li>
                                                                </ul>
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

    
    <script src="../bootstrap-3.7/js/bootstrap.min.js"></script>
    <script src="../js/jquery.mixitup.min.js"></script>
    <script src="../js/jquery.nicescroll.min.js"></script>
    <script src="../js/jquery.lightbox.js"></script>
    <script src="../js/templatemo_custom.js"></script> 

    
<!--   -->
</body>
     <?mysqli_close($db);?>
</html>
