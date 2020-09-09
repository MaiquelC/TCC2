<?php
    session_start();
    include "conexao.php";
    if(!$_SESSION['usuario']){
        header("location:login.php");
        mysqli_close($conectar);
    }
    $id = $_SESSION['usuario'];
    $sql = "select * from Usuario where ID_user = $id";
    $result = mysqli_query($conectar, $sql);
    $user = mysqli_fetch_assoc($result);
    mysqli_close($conectar);
?>
<head>
    <title>Seu Perfil</title>
    <meta charset="UTF-8">
    <link rel='stylesheet' href="./css/menu.css">
</head>
<body>
    <?php
        include_once("menu.php");
    ?><br>
    <center><img class="tam" src="/TCC/arquivo/<?php echo $user['Imagem']?>"><br>
    <?php echo $user['Nome']?><br>
    <a href="editarPerfil.php">Editar</a></center>
</body>
