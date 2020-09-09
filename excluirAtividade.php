<?php
  session_start();
  include "conexao.php";
  $id = $_GET['idati'];
  $sql = "delete from atividade where ID_atividade = '$id'";
  $query= mysqli_query($conectar, $sql);
  header('location:crono.php');
  mysqli_close($conectar);
?>
