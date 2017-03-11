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
            $id = $_GET['id'];
      ?>

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                          
                            <p>AO EXCLUIR UM CLUBE TODOS OS SEUS DADOS SERAM DELETADOS, INCLUINDO TODAS AS PARTIDAS QUE FORAM DISPUTADAS POR ELE,
                            OUTROS CLUBES QUE JOGARAM COM ESSA EQUIPE PERDERAM OS PONTOS. CASO ESSE CLUBE JA TENHA DISPUTADO ALGUMA PARTIDA
                            RECOMENDAMOS QUE NÃO O DELETE, APENAS O RENOMEI SEU NOME COMO DESISTENTE. EXEMPLO: TIME (WO).</p>

                            <div class="acao">
                              <a href="listar_clube.php"><button type="button" class="btn cancelar">CANCELAR</button></a>
                              <a href="excluir.php?id=<?=$id?>"><button type="button" class="btn continuar">CONTINUAR</button>
                            </div> 

                        </div><!-- /.termo-->                            
                    </div><!-- /.col-md-12-->
                </div> <!-- /#termo_excluir_clube-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>
    
    



