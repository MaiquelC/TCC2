<?php
    include "conexao.php";
    $nome =  ($_POST['nome']);// esse 'nome' é o NAME la do input
    $senha = md5($_POST['senha']);// esse 'senha' é o NAME la do input
    $email = $_POST['email'];// esse 'nome' é o NAME la do input
    $img = "user.ico";
    $sql = "select * from usuario where Email = '$email'";
    $result = mysqli_query($conectar, $sql);
    $row = mysqli_num_rows($result);
    if ($row == 0) {
        $sql = "insert into Usuario (Nome, Email, Senha, Imagem) values ('$nome', '$email', '$senha', '$img')";
        $query = mysqli_query($conectar, $sql);
        if($query) {
            header('location: login.php');
        }else {
            echo "Erro ao inserir registro.".mysqli_error($conectar);
        }
    }else{
        $_SESSION['usuario_existe'] = true;
        echo "Desculpe, esse usuario já existe";
        exit;
    }
    mysqli_close($conectar);
?>
