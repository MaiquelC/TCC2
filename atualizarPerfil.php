<?php
    session_start();
    include "conexao.php";
    if(!$_SESSION['usuario']){
        header("location:login.php");
    }
    $nome = $_POST['nome'];
    $id = $_POST['id'];
    $senha = $_POST['senha'];
    $newsenha = $_POST['newSenha'];

    if(isset($_FILES['arquivo'])) {
        $extensao = strtolower(substr($_FILES['arquivo']['name'], -3));
        $novo_nome = md5(time()). "." .$extensao;
        $diretorio = "arquivo/";
        $img = $diretorio.$novo_nome;
        move_uploaded_file($_FILES['arquivo']['tmp_name'], $img);

        $sql = "select * from Usuario where ID_user = $id";
        $result = mysqli_query($conectar, $sql);
        $user = mysqli_fetch_assoc($result);

        if ($user['Senha'] == md5($senha)) {
          if($newsenha != " ") {
              $sql = "update Usuario set Nome = '$nome', Imagem = '$novo_nome', Senha = md5('$newsenha') where ID_user = $id";
              $result = mysqli_query($conectar, $sql);
              header("location:editarPerfil.php");
          }else {
              $sql = "update Usuario set Nome = '$nome', Imagem = '$novo_nome', where ID_user = $id";
              $result = mysqli_query($conectar, $sql);
              header("location:editarPerfil.php");
          }
        }
    }else {
      if ($user['Senha'] == md5($senha)) {
        if($newsenha != " ") {
            $sql = "update Usuario set Nome = '$nome', Senha = md5('$newsenha') where ID_user = $id";
            $result = mysqli_query($conectar, $sql);
            header("location:editarPerfil.php");
        }else {
            $sql = "update Usuario set Nome = '$nome' where ID_user = $id";
            $result = mysqli_query($conectar, $sql);
            header("location:editarPerfil.php");
        }
    }
  }
    mysqli_close($conectar);
?>
