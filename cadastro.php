<head>
    <title>Cadastro</title>
    <meta charset="UTF-8">
    <link rel='stylesheet' href="./css/menu.css">
</head>
<body>
    <?php
        include_once("menu.php");
    ?>
    <form method="POST" action="cadastrar.php">
        <h3>Cadastre-se</h3>
        <input type="text" name="nome" placeholder="Nome" minlength="3" required><br>
        <input type="text" name="email" placeholder="E-mail" autocomplete="username" required><br>
        <input type="password" name="senha" placeholder="Senha" minlength="8" maxlength="14" size="8" autocomplete="current-password" required><br>
        <button type='submit'>Cadastrar</button>
    </form>
    Já tem cadastro? <a href="login.php">Clique aqui</a>
</body>
