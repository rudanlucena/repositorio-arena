<html>
<head>
    <meta charset="UTF-8">

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
          include("../conexao.php");
          $id = $_GET['id'];
    ?>   

    <title>editar liga liga</title>
    <link href="../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/templatemo_style.css" rel="stylesheet" media="screen"> 
    <link rel="stylesheet" href="../adm/css/style.css">
     <style>
    .button_form{
       text-align: center;
       margin-top: 20px;
     }
     </style>
</head>

<body> 
 
      <?php
        include("menu_ligas.php");
      ?>

      <div class="bg-image"></div>
      <div class="main-content">
          <div class="container">

                        <form action="atualizar_campeonato.php" method="post" name="liga">
                          <?php
                              $campeonatos = $db->query("SELECT * FROM campeonatos where id='$id'");
                              if($campeonatos){
                                $campeonato = $campeonatos->fetch_assoc();
                          ?>
                                <div class="login-form">
                          
                                    <div class="templatemo_logo">        
                                       <img  src="../images/menus/generic.png">
                                    </div> <!-- /.logo -->

                                    <div class="form-group">
                                        <label>nome:</label>
                                        <input type="text" class="form-control"  name="nome" value='<?=$campeonato['nome']?>' required>
                                    </div>

                                    <div class="form-group">
                                        <label>pasta:</label>
                                        <input type="text" class="form-control" name="link" value='<?=$campeonato['link']?>' required>
                                    </div> 

                                    <div class="form-group">
                                        <label>cliente:</label>
                                        <input type="text" class="form-control" name="cliente" value='<?=$campeonato['cliente']?>' required>
                                    </div> 

                                    <div class="form-group">
                                        <label>telefone:</label>
                                        <input type="tel" class="form-control" name="telefone1" value='<?=$campeonato['telefone1']?>' required>
                                    </div>                                    

                                    <div class="form-group">
                                        <label>telefone:</label>
                                        <input type="tel" class="form-control" name="telefone2" value='<?=$campeonato['telefone2']?>' >
                                    </div>

                                    <div class="form-group">
                                        <label>email:</label>
                                        <input type="email" maxlength class="form-control" name="email" value='<?=$campeonato['email']?>'>
                                    </div> 

                                    <div class="button_form">                              
                                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>Atualizar</button>
                                    </div>                               

                               </div><!--/.login-form-->
                          <?php
                             }
                          ?>
                         </form>

              <?php
                  include("../rodape.html");
              ?>

         </div><!-- /.container--> 
       </div><!-- /.main-content--> 

       <script src="../js/jquery-1.10.2.min.js"></script>
       <script src="../bootstrap-3.7/js/bootstrap.min.js"></script>


</body>  
    <?php
        mysqli_close($db);
    ?>
</html>