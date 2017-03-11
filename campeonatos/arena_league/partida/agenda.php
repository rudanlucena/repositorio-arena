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
                    <div class="col-md-12">

                        <?php
                                        include("../conexao.php");  
                                        $rodada = $_POST['rodada'];
                                        $clube_mandante = $_POST['mandante'];                                     
                                        $clube_visitante = $_POST['visitante'];                                    
                                        $data = $_POST['data_partida'];
                                        $hora = $_POST['hora'];

                                        if($clube_mandante == $clube_visitante){?>
                                            <div class="alert alert-danger">
                                              <strong>Error!</strong> Clubes iguais.
                                              <a href="listar_partidas.php?rodada=<?=$rodada?>"><button type="button" class="btn btn-danger">OK</button>
                                            </div><?php
                                        }
                                        else{

                                              $partidas = $db->query("SELECT rodada, mandante, visitante from partida");
                                              if($partidas){
                                                  $cont = 0;
                                                  while ($partida = $partidas->fetch_assoc()){
                                                       if( (($partida['rodada'] == $rodada) && ($partida['mandante'] == $clube_mandante)) or (($partida['rodada'] == $rodada) && ($partida['visitante'] == $clube_visitante)) ){
                                                          $cont++;
                                                       }   
                                                  }
                                                $partidas->free();
                                              }

                                              if($cont > 0){?>
                                                    <div class="alert alert-danger">
                                                                    <strong>Error!</strong> Um clube não pode jogar duas vezes em uma mesma rodada.
                                                                    <a href="listar_partidas.php?rodada=<?=$rodada?>"><button type="button" class="btn btn-danger">ok</button>
                                                    </div><?php
                                              }
                                              else{  
                                                    $sql ="INSERT INTO partida (data_hora_jogo, hora, rodada, mandante,  visitante,   situacao) 
                                                           values ('$data', '$hora', '$rodada', '$clube_mandante',  '$clube_visitante', 'agendada')";
                                                                                 
                                                                $result = mysqli_query( $db, $sql);
                                                                 if(!$result){ ?>
                                                                       <div class="alert alert-danger">
                                                                            <strong>Error!</strong> Não foi possivel agendar a partida.
                                                                            <a href="listar_partidas.php?rodada=<?=$rodada?>"><button type="button" class="btn btn-danger">ok</button>
                                                                       </div><?php
                                                                  }

                                                                  else {?>                                                                                       
                                                                     <div class="alert alert-success">
                                                                             <strong>Success!</strong> partida cadastrada com sucesso.
                                                                             <a href="listar_partidas.php?rodada=<?=$rodada?>">
                                                                                <button type="button" class="btn btn-primary">ok</button>
                                                                             </a>   
                                                                      </div><?php
                                                                  } 
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











                       
