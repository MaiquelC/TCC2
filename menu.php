<?php
    include "conexao.php";
?>
<ul>
  <?php
      if(!isset($_SESSION['usuario'])){
        echo "<li><a href='login.php'>Login</a></li>";
      } else {
        $id = $_SESSION['usuario'];
        $sql = "select * from Usuario where ID_user = $id";
        $result = mysqli_query($conectar, $sql);
        $user = mysqli_fetch_assoc($result);
        echo "<li class='dro'>
              <img class='tam2 drobtn' src='/TCC/arquivo/".$user['Imagem']."'>
                <div class='dro-content'>
                  <a href='perfil.php'>Perfil</a>
                  <a href='logout.php'>Sair</a>
                </div>
            </li>";
      }
  ?>
    <li><a href="crono.php">Cronograma</a></li>
    <li><a href="index.php">Home</a></li>
</ul>
