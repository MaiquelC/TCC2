<?php
    session_start();
    include "conexao.php";

    $idativ = $_POST['id'];
    $conc = $_POST['conc'];
    $mot1 = $_POST['mot1'];
    $mot2 = $_POST['mot2'];
    $completa = 1;
    $incompleta = 0;
    echo $idativ;
    echo $mot2;
    if ($conc != NULL) {
      if ($mot1 == "por ter sido concluida" || $mot1 == "mas com dificuldades" || $mot1 == "mas levou mais tempo que o esperado") {
        $sql = "update atividade set Completa = $completa, Motivo = '$mot1' where ID_atividade = $idativ";
        $query = mysqli_query($conectar, $sql);
      }else if ($mot2 == "não ter sido concluida" || $mot2 == "alguma emergência" || $mot2 == "causa de outra atividade" || $mot2 == "procrastinação" || $mot2 == "falta de tempo" || $mot2 == "ter se esquecido") {
        $sql = "update atividade set Completa = $incompleta, Motivo = '$mot2' where ID_atividade = $idativ";
        $query = mysqli_query($conectar, $sql);
      }
    }

    if($query) {
      header('location: crono.php');
    }else {
      echo "Erro ao inserir registro.".mysqli_error($conectar);
    }

    mysqli_close($conectar);
?>
