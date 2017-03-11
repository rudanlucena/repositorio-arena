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
    <link href="../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/font-awesome.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../css/templatemo_misc.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link href="../css/templatemo_style.css" rel="stylesheet" media="screen">
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="../images/logo_arena/arenam1lg4au_mobile.png">
    
    <!-- JavaScripts -->
    <script src="../js/jquery-1.10.2.min.js"></script>
    <script src="../js/modernizr.js"></script>
    <?php
       include("../conexao.php");
    ?>

    <style>
    .language-select { text-align: center; position: relative; z-index: 9999; top: 10px; margin-bottom: 20px; }
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
                                  
                                  <div class="language-select ">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select name="cat2" onchange="javascript: abrejanela(this.value)">
                                                <option value="#" selected>-- CAMPEONATOS --</option>
                                                <?php
                                                   $campeonatos = $db->query("SELECT * FROM campeonatos");
                                                   if(mysqli_affected_rows($db) > 0){
                                                      while($campeonato = $campeonatos->fetch_assoc()){
                                                ?>
                                                            <option value='<?=$campeonato['link']?>/adm/index.php'><?php echo $campeonato['nome'];?></option>
                                                <?php
                                                      }
                                                      $campeonatos->free();
                                                    }   
                                                ?>

                                                
                                            </select>
                                        </div> <!-- /.col-md-12 -->
                                    </div> <!-- /.row -->
                                </div> <!-- /.language-select -->
                                                               
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
    </script>

    <script>
         $(window).load(function(){
            $("#loader").fadeOut("slow");
         });
    </script>
    
<!--   -->
</body>

</html>
