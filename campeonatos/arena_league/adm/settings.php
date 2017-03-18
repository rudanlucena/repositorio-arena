<!DOCTYPE html>
<html >
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
          include("../conexao.php")
      ?>

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="UTF-8">
      <title>Configurações</title>
      <link href="../../../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
      <link href="../../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
      <link href="../../../css/templatemo_style.css" rel="stylesheet" media="screen">
      <link rel="stylesheet" href="../../../adm/css/style.css"> 

      <style>
        select{
          margin-top: 0px;
        }
        .login-form h1{
          font-size: 20px;
          border-bottom: 2px solid;
          color: yellow;
        }
      </style>
  </head>

  <body>
        <div id="loader"></div>
    <?php
         include("../menu_adm.php");
    ?>

    <div class="bg-image"></div>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <?php
                        $settings = $db->query("SELECT * from settings");
                        if($settings){
                           while ($config = $settings->fetch_assoc()){
                    ?>  

                            <form action="save_settings.php" method="post" name="settings" onSubmit="return enviardados();">
                                <div class="login-form">
                                      <h1>Configurações</h1>

                                      <div class="form-group log-status">
                                         <label>Nome campeonato:</label>
                                         <input type="text" class="form-control" name="nome_campeonato" value='<?=$config['nome_campeonato']?>' required>
                                      </div>

                                      <div class="form-group log-status">
                                         <label>nº grupos:</label>
                                         <input type="number" min="0" class="form-control" name="quant_grupos" value='<?=$config['grupos']?>' required>
                                      </div>

                                      <h1>Critérios Desempate:</h1>

                                      <div id="criteriosInvalidos" class="alert alert-danger">
                                        <strong>Erro!</strong> Critérios Repetidos.
                                      </div>

                                      <div class="form-group log-status">
                                         <label>1º</label>
                                         <select class="form-control" name="criterioDesempate1">
                                            <option value='<?=$config['criterio_desempate1']?>' selected><?php echo $config['criterio_desempate1']; ?></option>
                                            <option value='<?=$config['criterio_desempate2']?>' ><?php echo $config['criterio_desempate2']; ?></option>
                                            <option value='<?=$config['criterio_desempate3']?>' ><?php echo $config['criterio_desempate3']; ?></option>
                                            <option value='<?=$config['criterio_desempate4']?>' ><?php echo $config['criterio_desempate4']; ?></option>
                                         </select>
                                      </div>

                                      <div class="form-group log-status">
                                         <label>2º</label>
                                         <select class="form-control" name="criterioDesempate2">
                                            <option value='<?=$config['criterio_desempate1']?>' ><?php echo $config['criterio_desempate1']; ?></option>
                                            <option value='<?=$config['criterio_desempate2']?>' selected><?php echo $config['criterio_desempate2']; ?></option>
                                            <option value='<?=$config['criterio_desempate3']?>' ><?php echo $config['criterio_desempate3']; ?></option>
                                            <option value='<?=$config['criterio_desempate4']?>' ><?php echo $config['criterio_desempate4']; ?></option>
                                         </select>
                                      </div>

                                      <div class="form-group log-status">
                                         <label>3º</label>
                                         <select class="form-control" name="criterioDesempate3">
                                            <option value='<?=$config['criterio_desempate1']?>' ><?php echo $config['criterio_desempate1']; ?></option>
                                            <option value='<?=$config['criterio_desempate2']?>' ><?php echo $config['criterio_desempate2']; ?></option>
                                            <option value='<?=$config['criterio_desempate3']?>' selected><?php echo $config['criterio_desempate3']; ?></option>
                                            <option value='<?=$config['criterio_desempate4']?>' ><?php echo $config['criterio_desempate4']; ?></option>
                                         </select>
                                      </div>

                                      <div class="form-group log-status">
                                        <label>4º</label>
                                         <select class="form-control" name="criterioDesempate4">
                                            <option value='<?=$config['criterio_desempate1']?>' ><?php echo $config['criterio_desempate1']; ?></option>
                                            <option value='<?=$config['criterio_desempate2']?>' ><?php echo $config['criterio_desempate2']; ?></option>
                                            <option value='<?=$config['criterio_desempate3']?>' ><?php echo $config['criterio_desempate3']; ?></option>
                                            <option value='<?=$config['criterio_desempate4']?>' selected><?php echo $config['criterio_desempate4']; ?></option>
                                         </select>
                                      </div>

                                      <h1>Limite Cartões:</h1>
                                      <div class="form-group log-status">
                                         <label><img src="../../../images/cartao_amarelo.png"></label>
                                         <input type="Number" min="0" class="form-control" name="limiteCartaoAmarelo" value='<?=$config['limite_cartao_amarelo']?>' required>
                                      </div>

                                      <div class="form-group log-status">
                                         <label><img src="../../../images/cartao_vermelho.png"></label>
                                         <input type="Number" min="0" class="form-control" name="limiteCartaoVermelho" value='<?=$config['limite_cartao_vermelho']?>' required>
                                      </div>

                                      <h1>Pontos:</h1>
                                      <div class="form-group log-status">
                                         <label>Vitoria<span class="glyphicon glyphicon-arrow-up"></span></label>
                                         <input type="Number" min="0" class="form-control" name="pontosVitoria" value='<?=$config['pontos_vitoria']?>' required>
                                      </div>

                                      <div class="form-group log-status">
                                         <label>Empate<span class="glyphicon glyphicon-arrow-right"></span></label>
                                         <input type="Number" min="0" class="form-control" name="pontosEmpate" value='<?=$config['pontos_empate']?>' required>
                                      </div>

                                      <div class="form-group log-status">
                                         <label>Derrota<span class="glyphicon glyphicon-arrow-down"></span></label>
                                         <input type="Number" min="0" class="form-control" name="pontosDerrota" value='<?=$config['pontos_derrota']?>' required>
                                      </div>

                                      <button type="submit" class="log-btn" ><span class="glyphicon glyphicon-floppy-disk"></span>SALVAR</button>
                                      
                                </div><!--/.login-form-->
                            </form>

                    <?php         
                          }
                        $settings->free(); 
                      }
                    ?>      
                        

                    <?php
                        include("../rodape.html");
                    ?>

               </div><!--/.col-md-12-->
            </div><!--/.row-->
         </div> <!--/.container-->
      </div><!--/.main-content-->
      
      <script src="../../../js/jquery-1.10.2.min.js"></script>
      <script src="../../../bootstrap-3.7/js/bootstrap.min.js"></script>

      <script>
         $(window).load(function(){
            $("#loader").fadeOut("slow");
         });
      </script>

      <script language="JavaScript" >
          function enviardados(){     
            if((document.settings.criterioDesempate1.value == document.settings.criterioDesempate2.value) || (document.settings.criterioDesempate1.value==document.settings.criterioDesempate3.value) || (document.settings.criterioDesempate1.value==document.settings.criterioDesempate4.value))
            {
              return criteriosInvalidos();
            }
            else if((document.settings.criterioDesempate2.value == document.settings.criterioDesempate3.value) || (document.settings.criterioDesempate2.value==document.settings.criterioDesempate4.value))
            {
              return criteriosInvalidos();
            }
            else if(document.settings.criterioDesempate3.value == document.settings.criterioDesempate4.value)
            {
              return criteriosInvalidos();
            }
            return true;
          } 

          function criteriosInvalidos(){
            document.getElementById('criteriosInvalidos').style.display = "block";
            window.location.href = "#criteriosInvalidos";
            return false;
          } 
      </script>
    
</body>
</html>
