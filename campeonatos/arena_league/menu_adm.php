<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">ARENA MILGRAU</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">JOGOS
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li ><a href="../partida/listar_rodadas.php"><span class="glyphicon glyphicon-list"></span>rodadas</a></li>
                <li ><a href="../partida/selecionar_data.php"><span class="glyphicon glyphicon-refresh"></span>Em Tempo Real</a></li>
                <li ><a href="../partida/agenda_rodada.php"><span class="glyphicon glyphicon-calendar"></span>Nova Rodada</a></li>
            </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav">
        <li class="dropdown ">
            <a class="dropdown-toggle" data-toggle="dropdown" >clubes
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu ">
                <li ><a href="../clube/listar_clube.php"><span class="glyphicon glyphicon-list"></span>Listar</a></li>
                <li ><a href="../clube/cadastrar_clube.php"><span class="glyphicon glyphicon-plus"></span>Novo</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" >Jogadores
               <span class="caret"></span>
            </a>
            <ul class="dropdown-menu ">
                <li ><a href="../jogador/selecionar_clube.php"><span class="glyphicon glyphicon-list"></span>Listar</a></li>
                <li ><a href="../jogador/selecionar_clube.php"><span class="glyphicon glyphicon-plus"></span>Novo</a></li> 
                <li ><a href="../jogador/jogadores_com_cartao.php"><span class="glyphicon"><img src="../../../images/cartao_amarelo_vermelho.png"></span>Com Cartão</a></li> 
            </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav">
       <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" >Cartoes
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu ">
                <li ><a href="../jogador/termo_zerar_cartoes_amarelos.php"><span class="glyphicon"><img src="../../../images/cartao_amarelo.png"></span></span>zerar amarelos</a></li>
                <li ><a href="../jogador/termo_zerar_cartoes_vermelhos.php"><span class="glyphicon"><img src="../../../images/cartao_vermelho.png"></span></span>zerar vermelhos</a></li>
            </ul>
        </li>
      </ul>


      <ul class="nav navbar-nav">
       <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" >classificação
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu ">
              <li ><a href="../adm/atualizar_ranking.php"><span class="glyphicon glyphicon-refresh"></span></span>Atualizar</a></li>  
            </ul>
        </li>
      </ul>


      <ul class="nav navbar-nav">
       <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" >Configurações
            <span class="caret"></span></a>
            <ul class="dropdown-menu ">
              <li ><a href="../adm/settings.php"><span class="glyphicon glyphicon-pencil"></span></span>Configuracoes do campeonato</a></li>
            </ul>
        </li>
      </ul>

       <ul class="nav navbar-nav">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" >Conta
            <span class="caret"></span></a>
            <ul class="dropdown-menu ">
                <li ><a href="../adm/editar_senha.php"><span class="glyphicon glyphicon-pencil"></span></span>Editar Senha</a></li>
                <li><a href="../adm/finaliza_sessao.php"><span class=" glyphicon glyphicon-log-out"></span>Sair</a></li>
            </ul>
        </li>
      </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>