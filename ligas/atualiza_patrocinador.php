<html>
<head>

    <?php  
          //esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.
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

                        $nome = $_POST['nome'];
                        $email = $_POST['email'];
                        $cnpj = $_POST['cnpj'];
                        $telefone = $_POST['telefone'];
                        $valor = $_POST['valor'];
                        $logo = $_FILES['logo']['name'];
                        $id = $_POST['id'];

                        if($logo != ""){

                          $ext = pathinfo($logo, PATHINFO_EXTENSION);

                          $logo = $cnpj.".".$ext;
                          echo "<br> logo".$logo;
                        
                          //diretorio relativo para chegar no arquivo
                                                                      
                          //destino de copia
                          $destino = '../images/patrocinadores/'.$logo;
                          echo "<br>".$destino; 
                          $arquivo_tmp = $_FILES['logo']['tmp_name'];
                           
                          move_uploaded_file( $arquivo_tmp, $destino  );                                         
                         
                          $sql ="UPDATE patrocinador SET nome='$nome', email='$email', cnpj='$cnpj', telefone='$telefone', valor='$valor', logo='$logo' where id='$id' ";

                              $result = mysqli_query( $db, $sql);
                               if(!$result)
                                    echo '<div class="alert alert-danger">
                                            <strong>Error!</strong> não foi possivel atualizar o patrocinador.
                                            <a href="listar_patrocinador.php"><button type="button" class="btn btn-danger">ok</button>
                                        </div>';
                               else
                                  {                              
                                      echo '<div class="alert alert-success">
                                                  <strong>Success!</strong> Patrocinador atualizado com sucesso.
                                                      <a href="listar_patrocinador.php"><button type="button" class="btn btn-primary">ok</button>
                                             </div>';
                                                                      
                                  }

                        }else{
                          $sql ="UPDATE patrocinador SET nome='$nome', email='$email', cnpj='$cnpj', telefone='$telefone', valor='$valor' where id='$id'";

                          $result = mysqli_query( $db, $sql);
                         if(!$result)
                              echo '<div class="alert alert-danger">
                                      <strong>Error!</strong> não foi possivel atualizar o patrocinador.
                                      <a href="listar_patrocinador.php"><button type="button" class="btn btn-danger">ok</button>
                                  </div>';
                         else{                              
                                echo '<div class="alert alert-success">
                                            <strong>Success!</strong> Patrocinador atualizado com sucesso.
                                                <a href="listar_patrocinador.php"><button type="button" class="btn btn-primary">ok</button>
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

                       
