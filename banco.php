<?php

	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    // obtém a conexão com o banco MySQL
	
    $conexao = mysqli_connect("localhost", "id335738_ligas", "hvlk1998") or print (mysql_error());  
  
  	  $sql = "use ligas";
   
    	// Executa o comando SQL
    	$result = mysqli_query($conexao, $sql);
  
    	// Verifica se o comando foi executado com sucesso
    	if(!$result)
       		die("Falha na criacao do banco: " . mysqli_error());
    	else{
        		mysqli_select_db($conexao, "ligas") or print(mysqli_error()); 

        		
        		$sql = "CREATE TABLE if not exists liga(
                    id int auto_increment primary key,
                    tipo varchar(12),
                    nome varchar(150) unique,
                    link varchar(100),
                    data varchar(15) not null,
                    hora varchar(6),
                    local varchar(150) not null,
                    organizador varchar(150) not null,
                    inscricao int not null,
                    fone varchar(17),
                    facebook varchar(250),
                    clubes int,
                    primeiro_lugar varchar(100),
                    segundo_lugar varchar(100),
                    terceiro_lugar varchar(100),
                    quarto_lugar varchar(100),
                    quinto_lugar varchar(100),
                    data_upload varchar(15) not null,
                    vencimento varchar(15) not null	
                )";
      
        		// Executa o comando SQL
        		$result = mysqli_query( $conexao,$sql);
      
        		// Verifica se o comando foi executado com sucesso
        		if(!$result)
            		die("Falha na tabela liga: " . mysqli_error());
            //====================================================

                $sql ="CREATE TABLE if not exists campeonatos(
                        id int auto_increment primary key,
                        nome varchar(150) not null unique,
                        link varchar(100) not null unique,
                        cliente varchar(150) not null,
                        telefone1 varchar(17),
                        telefone2 varchar(17),
                        email varchar(150)
                    )";

                $result = mysqli_query($conexao, $sql);
                if(!$result)
                    die("falha na tabela campeonatos ".mysqli_error());

                $sql ="CREATE TABLE if not exists login(
                        id int auto_increment primary key,
                        usuario varchar(25) not null,
                        senha varchar(25) not null
                    )";

                $result = mysqli_query($conexao, $sql);
                if(!$result)
                    die("falaha na tabela login ".mysqli_error());
        		   
    }
  // fecha a conexão
  mysqli_close($conexao); 
?>



