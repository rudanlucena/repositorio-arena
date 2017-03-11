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

                        <form action="atualizar_liga.php" method="post" name="liga">
                          <?php
                              $ligas = $db->query("SELECT * FROM liga where id='$id'");
                              if($ligas){
                                $liga = $ligas->fetch_assoc();
                          ?>
                                <div class="login-form">
                          
                                    <div class="templatemo_logo">        
                                       <img  src="../images/menus/generic.png">
                                    </div> <!-- /.logo -->

                                    <div class="form-group">
                                        <label>tipo:</label>
                                        <select class="form-control"  name="tipo" value='<?=$liga['tipo']?>' required>
                                            <option value="torneio">TORNEIO</option>
                                            <option value="campeonato">CAMPEONATO</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>nome da liga:</label>
                                        <input type="text" class="form-control" name="nome" value='<?=$liga['nome']?>' required>
                                    </div> 

                                    <div class="form-group">
                                        <label>nome da liga:</label>
                                        <input type="text" class="form-control" name="link" value='<?=$liga['link']?>' required>
                                    </div> 

                                    <div class="form-group">
                                        <label>data:</label>
                                        <input type="date" class="form-control" name="data" value='<?=$liga['data']?>' required>
                                    </div> 

                                    <div class="form-group">
                                        <label>hora:</label>
                                        <input type="time" class="form-control" name="hora" value='<?=$liga['hora']?>'>
                                    </div>                                    

                                    <div class="form-group">
                                        <label>local:</label>
                                        <input type="text" class="form-control" maxlength="150" name="local" value='<?=$liga['local']?>' required>
                                    </div>

                                    <div class="form-group">
                                        <label>quantidade clubes:</label>
                                        <input type="Number" min="0" class="form-control" name="clubes" value='<?=$liga['clubes']?>'>
                                    </div>                                

                                    <div class="form-group">
                                        <label>organizador:</label>
                                        <input type="text" class="form-control" maxlength="150" name="organizador" value='<?=$liga['organizador']?>' required>
                                    </div>

                                    <div class="form-group">
                                        <label>facebook:</label>
                                        <input type="text" maxlength="250"  class="form-control" name="facebook" value='<?=$liga['facebook']?>'>
                                    </div>

                                    <div class="form-group">
                                        <label>fone:</label>
                                        <input type="tel" class="form-control" name="fone" value='<?=$liga['fone']?>'>
                                    </div>                                                                

                                    <div class="form-group">
                                        <label> valor inscricão:</label>
                                        <input type="Number" min="0" class="form-control" name="inscricao" value='<?=$liga['inscricao']?>' required>
                                    </div>

                                    <div class="form-group">
                                        <label>1° lugar</label>
                                        <input type="text" class="form-control" maxlength="100" name="primeiro_lugar" value='<?=$liga['primeiro_lugar']?>'>
                                    </div>                                                                                                                                                                                                  

                                    <div class="form-group">
                                        <label>2° lugar</label>
                                        <input type="text" class="form-control" maxlength="100" name="segundo_lugar" value='<?=$liga['segundo_lugar']?>'>
                                    </div>

                                    <div class="form-group">
                                        <label>3° lugar</label>
                                        <input type="text" class="form-control" maxlength="100" name="terceiro_lugar" value='<?=$liga['terceiro_lugar']?>'>
                                    </div>

                                    <div class="form-group">
                                        <label>4° lugar</label>
                                        <input type="text" class="form-control" maxlength="100" name="quarto_lugar" value='<?=$liga['quarto_lugar']?>'>
                                    </div>

                                    <div class="form-group">
                                        <label>5° lugar</label>
                                        <input type="text" class="form-control" maxlength="100" name="quinto_lugar" value='<?=$liga['quinto_lugar']?>'>
                                    </div>

                                    <div class="form-group">
                                        <label>data upload</label>
                                        <input type="date" class="form-control" name="data_upload" value='<?=$liga['data_upload']?>' required>
                                    </div>

                                    <div class="form-group">
                                        <label>vencimento</label>
                                        <input type="date" class="form-control" name="vencimento" value='<?=$liga['vencimento']?>' required>
                                    </div>                                                                                                                               

                                    <div class="button_form">                              
                                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>Atualizar</button>
                                    </div>
                                    
                               </div><!--/.login-form-->
                          <?php
                             }
                             $ligas->free();
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