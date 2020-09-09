<?php
    session_start();
    include "conexao.php";

    $tit = $_POST['titulo'];
    $desc = $_POST['desc'];
    $hri = $_POST['hri'];
    $hrf = $_POST['hrf'];
    $dia = $_POST['iddia'];
    $idse = $_POST['idse'];

    $sql = "insert into atividade (Titulo, Descricao, Hora_final, Hora_inicial, Dia, ID_semana) values ('$tit', '$desc', '$hrf', '$hri', $dia, $idse)";
    $query = mysqli_query($conectar, $sql);

    if($query) {
        header('location: crono.php');
    }else {
        echo "Erro ao inserir registro.".mysqli_error($conectar);
    }

    mysqli_close($conectar);
?>
