<html>
<head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="UTF-8">

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
          $id = $_GET['id'];
          $rodada = $_GET['rodada'];
    ?>

     <title>editar partida</title>
     <link href="../../../bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
     <link href="../../../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
     <link href="../../../css/adm_style.css" rel="stylesheet" media="screen">
     <link href="../../../css/templatemo_style.css" rel="stylesheet" media="screen">
     <link rel="stylesheet" href="../../../adm/css/style.css">

     <style>
        .resultadoJogo{
          display: inline-block;
        }
        .login-form h3{
          text-align: center;
          color: yellow;
          font-style: oblique;
          font-family: cursive;
        }
        .login-form p{
          text-align: justify;
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

                         <form action="atualiza.php" method="post" name="partida">
                              <div class="login-form">

                                 <?php
                                      $partidas = $db->query("SELECT * from partida where id='$id'");
                                       if($partidas){
                                              while ($partida = $partidas->fetch_assoc()){
                                  ?>

                                                    <div class="invisivel">
                                                       <input type="text"  name="id" value=<?=$partida['id']?> readonly>
                                                    </div>

                                                    <div class="invisivel">
                                                       <input type="text"  name="rodada" value=<?=$partida['rodada']?> readonly>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>data:</label>
                                                        <input type="date" class="form-control" name="data_partida" value=<?=$partida['data_hora_jogo']?> required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>hora:</label>
                                                        <input type="time" class="form-control" name="hora" value=<?=$partida['hora']?> required>
                                                    </div>

                                                    <h3>resultado</h3>
                                                    <div class="row">
                                                      <div class="col-xs-6">
                                                        <div class="form-group log-status resultadoJogo">
                                                            <input type="text" name="mandante" class="form-control" value='<?=$partida['mandante']?>' readonly required>
                                                            <input type="Number" class="form-control" min="0" name="placar_mandante" value=<?=$partida['placar_mandante']?> >
                                                        </div>
                                                      </div>

                                                      <div class="col-xs-6">
                                                        <div class="form-group log-status">
                                                              <input type="text" name="visitante" class="form-control" value='<?=$partida['visitante']?>' readonly required>
                                                              <input type="Number" class="form-control" min="0" name="placar_visitante" value=<?=$partida['placar_visitante']?>>
                                                          </div>
                                                      </div>
                                                    </div>

                                                    <h3>resultado pênaltis</h3>
                                                    <p>caso a partida tenha sido disputada nos pênaltis informe o resultado. caso contrario deixe os campos em branco.
                                                    <div class="row">
                                                      <div class="col-xs-6">
                                                          <div class="form-group log-status resultadoJogo">
                                                              <input type="text" name="mandante" class="form-control" value='<?=$partida['mandante']?>' readonly required>
                                                              <input type="text" class="form-control placarPenalty" min="0" name="placar_mandante_penalty" value=<?=$partida['placar_mandante_penalty']?> >
                                                          </div>
                                                      </div>

                                                      <div class="col-xs-6">
                                                          <div class="form-group log-status">
                                                                <input type="text" name="visitante" class="form-control" value='<?=$partida['visitante']?>' readonly required>
                                                                <input type="text" class="form-control" min="0" name="placar_visitante_penalty" value=<?=$partida['placar_visitante_penalty']?> >
                                                          </div>
                                                      </div>
                                                    </div>
                                                    

                                                    <div class="form-group log-status">
                                                          <select class="form-control" name="situacao" required>
                                                                      <option value="" selected>situação:</option>
                                                                      <option class="option_agendada" value="agendada" >agendada</option>
                                                                      <option value="andamento">andamento</option>
                                                                      <option value="encerrada">encerrada</option>
                                                          </select>
                                                    </div>

                                                    <div class="button_form">
                                                        <a href="listar_partidas.php?rodada=<?=$rodada?>"><input type="button" class="btn btn-danger" value="Sair"></a>
                                                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span>Atualizar</button>
                                                    </div>

                                <?php
                                   }
                                    $partidas->free();
                                  }
                                ?>

                            </div><!--/.login-form-->
                        </form>

                        <?php
                           include("../rodape.html");
                        ?>

                      </div><!--/.col-md-12-->
                </div><!--/.row-->
            </div><!--/.container-->
        </div><!--/.main-content-->

        <script src="../../../js/jquery-1.10.2.min.js"></script>
        <script src="../../../bootstrap-3.7/js/bootstrap.min.js"></script>

        <script>
           $(window).load(function(){
              $("#loader").fadeOut("slow");
           });
         </script>


</body>
     <?mysqli_close($db);?>
</html>
