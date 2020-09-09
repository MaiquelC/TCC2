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
    ?>
    <form method="POST" action="atualizarPerfil.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id;?>" >
        <h3>Editar</h3>
        Nome:
        <input type="text" name="nome" value="<?php echo $user['Nome']?>" required><br>
        (não é obrigatório)
        <input type="file" name="arquivo"><br>
        <img class="tam" src="/TCC/arquivo/<?php echo $user['Imagem']?>">
        Senha atual:
        <input type="text" name="senha" required><br>
        Senha nova (não é obrigatório):
        <input type="text" name="newSenha" value=" "><br>
        <button type='submit'>Salvar</button>
    </form>
</body>
