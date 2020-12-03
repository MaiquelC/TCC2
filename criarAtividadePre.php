<?php
    session_start();
    include "conexao.php";

    $tit = $_POST['titulo'];
    $desc = $_POST['desc'];
    $hri = $_POST['hri'];
    $hrf = $_POST['hrf'];
    $dia = '9';
    $idse = '1';
    $fixa = '0';
    $pc = '1';

    $sql = "select * from atividade where titulo = '$tit' and Pre_criada = $pc";
    $result = mysqli_query($conectar, $sql);
    $row = mysqli_num_rows($result);
    if($row > 1) {
      echo "Arrumar css e retornar erro dizendo q já existe uma atividade pré criada com esse nome"; // atividades pré criadas n podem ter nomes repetidos
    }else {
      $sql = "insert into atividade (Titulo, Descricao, Hora_final, Hora_inicial, Dia, ID_semana, Fixa, Pre_criada) values ('$tit', '$desc', '$hrf', '$hri', $dia, $idse, $fixa, $pc)";
      $query = mysqli_query($conectar, $sql);
    }
    if($query) {
        header('location: crono.php');
    }else {
        echo "Erro ao inserir registro.".mysqli_error($conectar);
    }

    mysqli_close($conectar);
?>
