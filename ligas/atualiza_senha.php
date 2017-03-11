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
                    <div class="col-md-12">

						<?php
						    include("../conexao.php"); 

						                $user_atual = $_POST['user_atual'];
						                $senha_atual = $_POST['senha_atual'];
						                $novo_user = $_POST['novo_user'];
						                $nova_senha = $_POST['nova_senha'];
						                $confirmacao = $_POST['confirmacao'];

						                if($nova_senha != $confirmacao){
						                	echo '<div class="alert alert-danger">
	                                                    <strong>Error!</strong> falha na atualização da senha, (os campos "nova senha" devem ser iguais).
	                                                    <a href="listar_ligas.php"><button type="button" class="btn btn-danger">ok</button>
                                                  </div>';
						                }else{

						                	$result = mysqli_query($db, "SELECT * FROM Login where usuario='$user_atual' and senha='$senha_atual'");

						                    if(mysqli_affected_rows($db) == 1){

								                	$sql ="UPDATE login set usuario ='$novo_user', senha='$nova_senha'";
											         $result = mysqli_query( $db, $sql);

														if(!$result)
															echo '<div class="alert alert-danger">
	                                                                	<strong>Error!</strong> falha na atualização da senha.
	                                                                	<a href="listar_ligas.php"><button type="button" class="btn btn-danger">ok</button>
                                                        		  </div>';
														 else{
																 echo '<div class="alert alert-success">
											                                <strong>Success!</strong> senha atualizada com sucesso.
											                                <a href="listar_ligas.php"><button type="button" class="btn btn-primary">ok</button>
											                           </div>';
														 }
						                    }

						                    else{
						                    	 echo '<div class="alert alert-danger">
											                <strong>Error!</strong> Não foi possivel atualizar a senha.
											                <a href="editar_senha.php"><button type="button" class="btn btn-danger">ok</button>
											           </div>';
						                    }
						                }
						                    
							mysqli_close($db);
						?>                          
                    </div><!-- /.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.main-content-->

</body>
</html>








