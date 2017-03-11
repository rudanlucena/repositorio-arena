<meta charset="UTF-8">

<?php              
    include("../conexao.php");
		$result = mysqli_query($db, "SELECT * FROM login ");

		                if(mysqli_affected_rows($db) == 0){

		                    $sql ="INSERT INTO login (usuario, senha) values ('arena', 'newera')";
		                     $result = mysqli_query( $db, $sql);

		                         if(!$result)
		                                die("Falha na criação da senha: " . mysqli_error());
		                }

		$result = mysqli_query($db, "SELECT * FROM settings ");

		                if(mysqli_affected_rows($db) == 0){

		                    $sql ="INSERT INTO settings (nome_campeonato, grupos) values ('ARENA M1L G4AU','0')";
		                     $result = mysqli_query( $db, $sql);

		                         if(!$result)
		                                die("Falha na criação do padrao arena " . mysqli_error());
	mysqli_close($db);                    }                
?>