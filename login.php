<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <link rel='stylesheet' href="./css/menu.css">
</head>
<body>
    <?php
        include_once("menu.php");
    ?>
    <form action="logar.php" method="POST">
        <h2>Login</h2>
        <input type="text" name="email" placeholder="E-mail" autocomplete="username" required><br>
        <input type="password" name="senha" placeholder="Senha" autocomplete="current-password" required><br>
        <button>Enviar</button><br>
        Não tem cadastro? <a href="cadastro.php">Clique aqui</a>
      </form>
</body>
