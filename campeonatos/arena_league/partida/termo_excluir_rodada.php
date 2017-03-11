<html>
<head>

    <?php  
          //esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.
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
                            AO EXCLUIR UMA RODADA SERAM DELETADOS TODAS AS PARTIDAS PERTENCENTES A MESMA. OS RESULTADOS DAS PARTIDAS AFETAM NA CLASSIFICAÇÃO DO CAMPEONATO (CASO HAJA FASE DE GRUPOS). SOMENTE DELETE RODADAS QUE FORAM CRIADAS POR ENGANO.
                            <div class="acao">
                              <a href="listar_rodadas.php"><button type="button" class="btn cancelar">cancelar</button></a>
                              <a href="excluir_rodada.php?id=<?=$id?>"><button type="button" class="btn continuar">continuar</button></a>
                            </div>                                                             
                        </div><!-- /.termo-->                            
                    </div><!-- /.col-md-12-->
                </div> <!-- /#termo_excluir_clube-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>
    
    



