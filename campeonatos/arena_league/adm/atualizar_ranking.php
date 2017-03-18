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
          include("../conexao.php");
    ?>
    
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
  <link href="../../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
  <link href="../../../css/templatemo_style.css" rel="stylesheet" media="screen">  
</head>
<body>
	<div id="loader"></div>  
    <div class="bg-image"></div>
    <div class="main-content">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">

					    <?php
			                include("ranking.php");
			                $result = ranking();
			                
        							if($result == false){ ?>
                            <div class="alert alert-danger">
                              <strong>Error!</strong> o ranking não foi executado corretamente.
                                  <a href="../partida/listar_rodadas.php"><button type="button" class="btn btn-danger">ok</button>
                            </div><?php 
                      }
        								
        							else{ ?>
                            <div class="alert alert-success">
                              <strong>Success!</strong> ranking finalizado.
                                  <a href="../partida/listar_rodadas.php"><button type="button" class="btn btn-primary">ok</button>
                            </div><?php 	
                      }
                                                              
        						    mysqli_close($db);				          
					    ?>
                    </div><!-- /.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

    <script src="../../../js/jquery-1.10.2.min.js"></script>

    <script>
		 $(window).load(function(){
		    $("#loader").fadeOut("slow");
		 });
	 </script> 

</body>
</html>
