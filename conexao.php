<?php
	$server = "localhost: 3306";
	$user = "root";
	$senha = "";
	$banco = "kronostudy";
	$conectar = mysqli_connect($server, $user, $senha, $banco);
	if(!$conectar){
		echo "Nao foi possível conectar ao MySQL.".PHP_EOL;
		echo "Debugging erro: ".mysqli_connect_error().PHP_EOL;
		exit;
	}
 ?>
