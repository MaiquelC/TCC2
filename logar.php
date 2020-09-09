<?php
include "conexao.php";
session_start();
$email = $_POST["email"];
$senha = $_POST["senha"];
if(empty($email) or empty($senha)) {
	$_SESSION['erros'] = "Os campos não podem ser nulos!";
	header('location:login.php');
	exit;
}else{
	$email = mysqli_real_escape_string($conectar, $email);
	$senha = md5(mysqli_real_escape_string($conectar, $senha));
	$pesquisa = "select * from usuario where Email ='$email' and Senha ='$senha'";
	$resultado = mysqli_query($conectar,$pesquisa);
	$user = mysqli_fetch_array($resultado);
	$row = mysqli_num_rows($resultado);
	if($row == 1) {
		$_SESSION['usuario'] = $user['ID_user'];
		unset($_SESSION['erros']);
    header('location:index.php');
	}else{
		$_SESSION['erros'] = "Usuário e senha incorretos!";
		header('location:login.php');
	}
}
mysqli_close($conectar);
?>
