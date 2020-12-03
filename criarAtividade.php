<?php
    session_start();
    include "conexao.php";

    $tit = $_POST['titulo'];
    $desc = $_POST['desc'];
    $hri = $_POST['hri'];
    $hrf = $_POST['hrf'];
    $dia = $_POST['iddia'];
    $idse = $_POST['idse'];
    $pc2 = $_POST['pc'];
    $fixa1 = 0;
    $fixa2 = 1;
    $pc = 1;
    $completa = 0;
    $motivo = "não ter sido concluida";

    $sql = "select * from atividade where Pre_criada = 1 and Fixa = 0 and Titulo = '$pc2'";
    $result = mysqli_query($conectar, $sql);
      if ($pc2 != "" && $pc2 != " "){
        $atividade = mysqli_fetch_array($result);
        $sql = "insert into atividade (Titulo, Descricao, Hora_final, Hora_inicial, Dia, ID_semana, Fixa, Pre_criada, Completa, Motivo) values ('$atividade[Titulo]', '$atividade[Descricao]', '$atividade[Hora_final]', '$atividade[Hora_inicial]', $dia, $idse, $fixa2, $pc, $completa, '$motivo')";
        $query = mysqli_query($conectar, $sql);
      }else {
        $sql = "insert into atividade (Titulo, Descricao, Hora_final, Hora_inicial, Dia, ID_semana, Fixa, Pre_criada, Completa, Motivo) values ('$tit', '$desc', '$hrf', '$hri', $dia, $idse, $fixa1, $pc, $completa, '$motivo')";
        $query = mysqli_query($conectar, $sql);
      }
    if($result) {
      header('location: crono.php');
    }else {
      echo "Erro ao inserir registro.".mysqli_error($conectar);
    }
    mysqli_close($conectar);
?>
