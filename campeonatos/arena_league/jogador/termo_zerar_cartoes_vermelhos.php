<html>
<head>

    <?php
            session_start();
            if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
            {
              unset($_SESSION['login']);
              unset($_SESSION['senha']);
              header('location:../adm/index.php');
            }

            $logado = $_SESSION['login'];
    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="../../../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../../../css/templatemo_style.css" rel="stylesheet" media="screen">   
</head>

<body> 
    <div class="bg-image"></div>
    <div class="main-content">
        <div class="container">
            <div class="row">
               <div id="termo_excluir_clube">
                    <div class="col-md-12">
                        <div class="termo"> 
                            VOCÊ REALMENTE DESEJA ZERAR OS CARTOES VERMELHOS?
                            <div class="acao">
                              <a href="../partida/listar_rodadas.php"><button type="button" class="btn cancelar">NÃO</button></a>
                              <a href="../jogador/zerar_cartoes_vermelhos.php"><button type="button" class="btn continuar">SIM</button>
                            </div>                                                             
                        </div><!-- /.termo-->                            
                    </div><!-- /.col-md-12-->
                </div> <!-- /#termo_excluir_clube-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->
    
</body>
</html>
    
    



