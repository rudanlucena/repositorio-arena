<meta charset="UTF-8">

<?php              
    include("../conexao.php");
		$result = mysqli_query($db, "SELECT * FROM login ");

		                if(mysqli_affected_rows($db) == 0){

		                    $sql ="INSERT INTO login (usuario, senha) values ('arena', 'minhasligas')";
		                     $result = mysqli_query( $db, $sql);

		                         if(!$result)
		                                die("Falha na criação da senha: " . mysqli_error());
		                }
	mysqli_close($db);                                   
?>