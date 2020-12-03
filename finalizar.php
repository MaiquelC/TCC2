<?php
  session_start();
  include "conexao.php";

  $idse = $_POST['idse'];
  $idusu = $_POST['idusu'];
  $fixa = 1;
  $completa = 0;
  $motivo = "";

  $sql1 = "select * from semana where ID_user = $idusu";
  $result1 = mysqli_query($conectar, $sql1);
  $num = array();
  while($array1 = mysqli_fetch_array($result1)) { $num[] = $array1['ID_semana'];}
  $numSem = count($num) + 1;

  $sql2 = "insert into semana (NumSemana, ID_user) values ($numSem, $idusu)";
  $result2 = mysqli_query($conectar, $sql2);

  $sql3 = "select * from semana where ID_user = $idusu order by ID_semana DESC limit 1";
  $result3 = mysqli_query($conectar, $sql3);
  $semana = mysqli_fetch_array($result3);

  $sql4 = "select * from atividade where ID_semana = $idse and Fixa = $fixa";
  $result4 = mysqli_query($conectar, $sql4);
  if(mysqli_num_rows($result4) > 0) {
    while($row = mysqli_fetch_assoc($result4)){
      $sql5 = "insert into atividade (Titulo, Descricao, Hora_final, Hora_inicial, Dia, ID_semana, Fixa, Pre_criada, Completa, Motivo) values ('$row[Titulo]', '$row[Descricao]', '$row[Hora_final]', '$row[Hora_inicial]', $row[Dia], $semana[ID_semana], $fixa, $row[Pre_criada], $completa, '$motivo')";
      $query = mysqli_query($conectar, $sql5);
    }
  }
  if($query) {
    header('location: crono.php');
  }else {
    echo "Erro ao inserir registro.".mysqli_error($conectar);
  }
?>
