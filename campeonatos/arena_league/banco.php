<?php
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    // obtém a conexão com o banco MySQL	
    $conexao = mysqli_connect("localhost", "root", "") or print (mysql_error());  
  
  	  $sql = "CREATE DATABASE if not exists amg";
    	// Executa o comando SQL
    	$result = mysqli_query($conexao, $sql);
  
    	// Verifica se o comando foi executado com sucesso
    	if(!$result)
       		die("Falha na criacao do banco: " . mysqli_error());
    	else{
        		mysqli_select_db($conexao, "amg") or print(mysqli_error()); 
     		
        		$sql = "CREATE TABLE if not exists clube(
                    id int primary key auto_increment,
                	nome varchar(100) not null unique,
                    abreviacao varchar(3) not null unique,
                    pontos int not null default 0, 
    	         	jogos int not null default 0,
    	         	vitorias int not null default 0,
    	         	empates int not null default 0,
    	         	derrotas int not null default 0,
    	         	gm int not null default 0,
    	         	gs int not null default 0,
    	         	sg int not null default 0,
                    grupo int not null,
                    tecnico varchar(150),
                    email varchar(150),
                    fone varchar(17)
                )";
      
        		// Executa o comando SQL
        		$result = mysqli_query( $conexao,$sql);
      
        		// Verifica se o comando foi executado com sucesso
        		if(!$result)
            		die("Falha na tabela clube: " . mysqli_error());
            //====================================================
                

        		$sql = "CREATE TABLE if not exists jogadores(
                	id int auto_increment primary key, 
    	         	nome varchar(100) not null,
    	         	num_camisa varchar(3),
    	         	clube varchar(100) not null,
    	         	posicao varchar(30),
    	         	gols int not null default 0,
                    cartao_amarelo int not null default 0,
                    cartao_vermelho int not null default 0,
                    status varchar(8),
                    FOREIGN KEY (clube) REFERENCES clube(abreviacao)
                    ON DELETE CASCADE ON UPDATE CASCADE
                )";
      
        		// Executa o comando SQL
        		$result = mysqli_query($conexao,$sql);
      
        		// Verifica se o comando foi executado com sucesso
        		if(!$result)
            		die("Falha na tabela jogadores: " . mysqli_error());

            //====================================================

                $sql = "CREATE TABLE if not exists rodadas(
                      id int auto_increment  primary key,
                      rodada int not null unique,
                      fase varchar(30) not null
                    )"; 

                $result = mysqli_query($conexao, $sql);

                if(!$result)
                    die("Falha na tabela rodadas". mysqli_error());

                //==============================================       
             		
 
        		$sql = "CREATE TABLE if not exists partida(
                    id int auto_increment primary key,
                	data_hora_jogo varchar(10),
                    hora varchar(6),
    	            mandante varchar(3) not null,
    	         	visitante varchar(3) not null,
    	         	placar_mandante int,
                    placar_mandante_penalty varchar(4),
    	         	placar_visitante int,
                    placar_visitante_penalty varchar(4),
    	         	rodada int not null,    	         
                    situacao varchar(9) not null,
                    tempo int,
                    FOREIGN KEY (rodada) REFERENCES rodadas(rodada) ON DELETE CASCADE ON UPDATE CASCADE,
                    FOREIGN KEY (mandante) REFERENCES clube(abreviacao)
                    ON DELETE CASCADE ON UPDATE CASCADE,
                    fOREIGN KEY (visitante) REFERENCES clube(abreviacao)
                    ON DELETE CASCADE ON UPDATE CASCADE
                )";
      
        		// Executa o comando SQL
        		$result = mysqli_query($conexao,$sql);
      
        		// Verifica se o comando foi executado com sucesso
        		if(!$result)
                    die("Falha na tabela partida: " . mysqli_error());
              //====================================================

 
            $sql = "CREATE TABLE if not exists login(
                      id int auto_increment primary key,
                      usuario varchar(25) not null,
                      senha varchar(25) not null
            )";
      
            // Executa o comando SQL
            $result = mysqli_query($conexao,$sql);
      
            // Verifica se o comando foi executado com sucesso
            if(!$result)
                die("Falha na tabela login: " . mysqli_error());
            //======================================================

            //release1 
            $sql = "CREATE TABLE if not exists settings(
                nome_campeonato varchar(150) not null default 'LIGA M1L G4AU',
                grupos int not null default 0,
                limite_cartao_amarelo int not null default 2,
                limite_cartao_vermelho int not null default 1,
                pontos_vitoria int not null default 3,
                pontos_empate int not null default 1,
                pontos_derrota int not null default 0,
                criterio_desempate1 varchar(8) not null default 'vitorias',
                criterio_desempate2 varchar(8) not null default 'sg',
                criterio_desempate3 varchar(8) not null default 'gm',
                criterio_desempate4 varchar(8) not null default 'gs'
            )"; 

            // Executa o comando SQL
            $result = mysqli_query($conexao,$sql);
      
            // Verifica se o comando foi executado com sucesso
            if(!$result)
                die("Falha na tabela settings: " . mysqli_error());

            //release2 
            $sql = "CREATE TABLE if not exists aux_jogos_andamentos(
                id int primary key,
                placar_mandante int not null,
                placar_visitante int not null,
                placar_mandante_penalty varchar(4),
                placar_visitante_penalty varchar(4),
                fOREIGN key(id) REFERENCES partida(id) ON DELETE CASCADE
            )"; 

            // Executa o comando SQL
            $result = mysqli_query($conexao,$sql);
      
            // Verifica se o comando foi executado com sucesso
            if(!$result)
                die("Falha na tabela aux_jogos_andamentos: " . mysqli_error());   

            

    }
  // fecha a conexão
  mysqli_close($conexao); 
?>



