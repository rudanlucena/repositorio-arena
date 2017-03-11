<html>
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
            $id = $_GET['id'];
      ?>

      <meta charset="UTF-8">
      <link href="../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
      <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
      <link href="../css/templatemo_style.css" rel="stylesheet" media="screen">
</head>

<body> 
    <div class="bg-image"></div>
    <div class="main-content">
        <div class="container">
            <div class="row">
               <div id="termo_excluir_clube">
                    <div class="col-md-12">
                        <div class="termo"> 
                          
                            <p>você realmente deseja o <smal>campeonato<smal> com todos os dados?</p>

                            <div class="acao">
                              <a href="listar_campeonatos.php"><button type="button" class="btn cancelar">não</button></a>
                              <a href="excluir_campeonato.php?id=<?=$id?>"><button type="button" class="btn continuar">sim</button>
                            </div> 

                        </div><!-- /.termo-->                            
                    </div><!-- /.col-md-12-->
                </div> <!-- /#termo_excluir_clube-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>
    
    



