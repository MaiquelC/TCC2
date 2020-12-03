<?php
    session_start();
    include "conexao.php";

    $id = $_POST['id'];

    $sql = "insert into semana (NumSemana, ID_user) values (1, '$id')";
    $query = mysqli_query($conectar, $sql);

    if($query) {
        header('location: crono.php');
    }else {
        echo "Erro ao inserir registro.".mysqli_error($conectar);
    }

    mysqli_close($conectar);
?>
