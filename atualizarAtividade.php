<?php
    include "conexao.php";

    $id = $_POST['id'];
    $tit = $_POST['titulo'];
    $desc = $_POST['desc'];
    $hi = $_POST['hi'];
    $hf = $_POST['hf'];

    $sql = "update atividade set Titulo = '$tit', Descricao = '$desc', Hora_final = '$hf', Hora_inicial = '$hi' where ID_atividade = '$id'";
    $query = mysqli_query($conectar, $sql);

    header('location: crono.php');
    mysqli_close($conectar);
?>
