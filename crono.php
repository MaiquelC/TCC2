<?php
    session_start();
    include "conexao.php";
?>
<head>
  <style>
    .atividade {
      margin: 0;
      width: auto;
      height: auto;
    }

    .th {
      height: 50px !important;
    }

    .atividade1 {
      margin: 0;
      width: 150px;
      height: auto;
    }

    .tit {
      font-weight: bold;
      font-size: 15px;
    }
    .desc {
      font-size: 12px;
      font-style: italic;
    }

    .sub {
      margin-top: 18px;
      float:inline-end;
    }

    .txtt {
      margin-top: 5px;
      margin-bottom: 5px;
    }

    .scroll1 {
      overflow: auto;
      border-color:black ;
      border-style:solid ;
      border-width:1px ;
      width: 1150px;
      height: 500px;
    }

    .scroll2 {
      overflow: auto;
      border-color:black ;
      border-style:solid ;
      border-width:1px ;
      width: 800px;
      height: 200px;
    }

    .clicavel {
      cursor: pointer;
    }
  </style>
  <title>Cronograma</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1/dist/css/bootstrap.min.css"/>
  <link rel='stylesheet' href="./css/menu.css">
  <link rel='stylesheet' href="./css/crono.css">
  <link rel="stylesheet" type="text/css" href="/bootstrap-4.3.1/dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="/font/css/all.css"/>
</head>
<body>
  <?php
      include_once("menu.php");
  ?>
  <?php
  echo "";
      $id = $_SESSION["usuario"];
      $sql = "select * from semana where ID_user = $id order by ID_semana DESC limit 1";
      $result = mysqli_query($conectar, $sql);
      $row = mysqli_num_rows($result);
      $semana = mysqli_fetch_array($result);
      $num = 1;
      if($row != 0) {
        ?><h2>Semana <?php echo $semana['NumSemana']?></h2>
        <div class="scroll1">
        <table class="tg">
          <thead>
            <tr class="algo">
              <th class="tg-0pky">HR</th>
              <?php
                $datahj = date('D');
                switch ($datahj) {
                  case 'Mon':?>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal0">SEG <?php echo '('.gmdate("d").')'; ?></th></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal1">TER <?php echo '('.gmdate("d", time()+(3600*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal2">QUA <?php echo '('.gmdate("d", time()+(7200*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal3">QUI <?php echo '('.gmdate("d", time()+(10800*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal4">SEX <?php echo '('.gmdate("d", time()+(14400*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal5">SÁB <?php echo '('.gmdate("d", time()+(18000*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal6">DOM <?php echo '('.gmdate("d", time()+(20600*24)).')'; ?></th><?php
                    break;
                  case 'Tue': ?>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal0">SEG <?php echo '('.gmdate("d", time()-(3600*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal1">TER <?php echo '('.gmdate("d").')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal2">QUA <?php echo '('.gmdate("d", time()+(3600*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal3">QUI <?php echo '('.gmdate("d", time()+(7200*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal4">SEX <?php echo '('.gmdate("d", time()+(10800*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal5">SÁB <?php echo '('.gmdate("d", time()+(14400*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal6">DOM <?php echo '('.gmdate("d", time()+(18000*24)).')'; ?></th><?php
                    break;
                  case 'Wed':?>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal0">SEG <?php echo '('.gmdate("d", time()-(7200*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal1">TER <?php echo '('.gmdate("d", time()-(3600*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal2">QUA <?php echo '('.gmdate("d").')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal3">QUI <?php echo '('.gmdate("d", time()+(3600*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal4">SEX <?php echo '('.gmdate("d", time()+(7200*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal5">SÁB <?php echo '('.gmdate("d", time()+(10800*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal6">DOM <?php echo '('.gmdate("d", time()+(14400*24)).')'; ?></th><?php
                    break;
                  case 'Thu':?>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal0">SEG <?php echo '('.gmdate("d", time()-(10800*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal1">TER <?php echo '('.gmdate("d", time()-(7200*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal2">QUA <?php echo '('.gmdate("d", time()-(3600*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal3">QUI <?php echo '('.gmdate("d").')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal4">SEX <?php echo '('.gmdate("d", time()+(3600*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal5">SÁB <?php echo '('.gmdate("d", time()+(7200*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal6">DOM <?php echo '('.gmdate("d", time()+(10800*24)).')'; ?></th><?php
                    break;
                  case 'Fri':?>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal0">SEG <?php echo '('.gmdate("d", time()-(14400*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal1">TER <?php echo '('.gmdate("d", time()-(10800*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal2">QUA <?php echo '('.gmdate("d", time()-(7200*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal3">QUI <?php echo '('.gmdate("d", time()-(3600*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal4">SEX <?php echo '('.gmdate("d").')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal5">SÁB <?php echo '('.gmdate("d", time()+(3600*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal6">DOM <?php echo '('.gmdate("d", time()+(7200*24)).')'; ?></th><?php
                    break;
                  case 'Sat':?>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal0">SEG <?php echo '('.gmdate("d", time()-(1800*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal1">TER <?php echo '('.gmdate("d", time()-(14400*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal2">QUA <?php echo '('.gmdate("d", time()-(10800*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal3">QUI <?php echo '('.gmdate("d", time()-(7200*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal4">SEX <?php echo '('.gmdate("d", time()-(3600*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal5">SÁB <?php echo '('.gmdate("d").')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal6">DOM <?php echo '('.gmdate("d", time()+(3600*24)).')'; ?></th><?php
                    break;
                  case 'Sun':?>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal0">SEG <?php echo '('.gmdate("d", time()-(20000*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal1">TER <?php echo '('.gmdate("d", time()-(18000*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal2">QUA <?php echo '('.gmdate("d", time()-(14400*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal3">QUI <?php echo '('.gmdate("d", time()-(10800*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal4">SEX <?php echo '('.gmdate("d", time()-(7200*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal5">SÁB <?php echo '('.gmdate("d", time()-(3600*24)).')'; ?></th>
                    <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal6">DOM <?php echo '('.gmdate("d").')'; ?></th><?php
                    break;
                  default: break;
                }
              ?>
            </tr>
            <?php for($j = 0; $j < 24; $j++) {?>
            <tr>
              <?php for($i = 0; $i < 8; $i++) {?>
                <th <?php if($j > 7 && $j < 22){echo "class='th'";}?>>
                  <?php
                    if ($i == 0) {
                      switch ($j) {
                        case 0: echo "00:00"; break;
                        case 1: echo "01:00"; break;
                        case 2: echo "02:00"; break;
                        case 3: echo "03:00"; break;
                        case 4: echo "04:00"; break;
                        case 5: echo "05:00"; break;
                        case 6: echo "06:00"; break;
                        case 7: echo "07:00"; break;
                        case 8: echo "08:00"; break;
                        case 9: echo "09:00"; break;
                        case 10: echo "10:00"; break;
                        case 11: echo "11:00"; break;
                        case 12: echo "12:00"; break;
                        case 13: echo "13:00"; break;
                        case 14: echo "14:00"; break;
                        case 15: echo "15:00"; break;
                        case 16: echo "16:00"; break;
                        case 17: echo "17:00"; break;
                        case 18: echo "18:00"; break;
                        case 19: echo "19:00"; break;
                        case 20: echo "20:00"; break;
                        case 21: echo "21:00"; break;
                        case 22: echo "22:00"; break;
                        case 23: echo "23:00"; break;
                        case 24: echo "24:00"; break;
                        default:break;
                      }
                    }else {
                      $dias = ($i-1);
                      $sql2 = "select * from atividade where ID_semana = $semana[ID_semana] and Dia = $dias";
                      $result2 = mysqli_query($conectar, $sql2);
                      if(mysqli_num_rows($result2) > 0) {
                        while($row = mysqli_fetch_assoc($result2)){
                          $abc = $row['Hora_inicial'];
                          if($j == substr("$abc", -5, 2)) {
                            echo "<div class='atividade'><a data-toggle='modal' data-target='#exampleModalEditar' data-whateverid=".$row['ID_atividade']." data-whatevertitulo=".$row['Titulo']." data-desc=".$row['Descricao']."
                              data-whateverhf=".$row['Hora_final']." data-whateverhi=".$row['Hora_inicial']." data-whateverhf=".$row['Dia']."><i class='fas fa-edit'></i></a>&nbsp";
                            echo "<a class='clicavel' href='excluirAtividade.php?idati=".$row['ID_atividade']."'><i class='fas fa-times'></i></a><br><div class='tit'>";
                            echo "<div class='clicavel' data-toggle='modal' data-target='#exampleModalVer' data-whateverid1=".$row['ID_atividade']." data-whatevertitulo1=".$row['Titulo']." data-whateverdesc1=".$row['Descricao']."
                              data-whateverhf1=".$row['Hora_final']." data-whateverhi1=".$row['Hora_inicial']." data-whateverhf1=".$row['Dia'].">";
                            echo $row['Titulo'];?><br><div class="desc"><?php
                            echo mb_strimwidth($row['Descricao'], 0, 16, "...")."</div></div>";?></div></div><?php
                          }
                        }
                      }
                    }
                  ?>
                </th>
              <?php } ?>
            </tr>
            <?php } ?>
          </thead>
        </table>
        </div>
          <input type="button" class="tg-0pky" data-toggle="modal" data-target="#exampleModalCriar" value="Tarefa Pré-criada">
            <div class="scroll2">
              <table class="tg2">
                <?php
                  $sql4 = "select * from atividade where Pre_criada = 1 and Fixa = 0";
                  $result4 = mysqli_query($conectar, $sql4);
                  $cont = 0;
                  if(mysqli_num_rows($result4) > 0) {
                    while($row = mysqli_fetch_assoc($result4)){
                      $cont++;
                    }
                  }
                  if ($cont > 5) {
                    if ($cont % 5 != 0) {
                      $cont = ($cont / 5) - 1;
                      $sql3 = "select * from atividade where Pre_criada = 1 and Fixa = 0";
                      $result3 = mysqli_query($conectar, $sql3);
                      $cont2 = 1;
                      for($j = 0; $j < $cont; $j++) { echo "<tr>" ;
                      if(mysqli_num_rows($result3) > 0) {
                        while($row = mysqli_fetch_assoc($result3)){
                            echo "<th>";
                            echo "<div class='atividade1'><a data-toggle='modal' data-target='#exampleModalEditar' data-whateverid=".$row['ID_atividade']." data-whatevertitulo=".$row['Titulo']." data-desc=".$row['Descricao']."
                                  data-whateverhf=".$row['Hora_final']." data-whateverhi=".$row['Hora_inicial']." data-whateverhf=".$row['Dia']."><i class='fas fa-edit'></i></a>&nbsp";
                            echo "<a href='excluirAtividade.php?idati=".$row['ID_atividade']."'><i class='fas fa-times'></i></a><br><div class='tit'>";
                            echo "<div data-toggle='modal' data-target='#exampleModalVer' data-whateverid1=".$row['ID_atividade']." data-whatevertitulo1=".$row['Titulo']." data-whateverdesc1=".$row['Descricao']."
                                  data-whateverhf1=".$row['Hora_final']." data-whateverhi1=".$row['Hora_inicial']." data-whateverhf1=".$row['Dia'].">";
                            echo $row['Titulo'];?><br><div class="desc"><?php
                            echo mb_strimwidth($row['Descricao'], 0, 16, "...")."</div></div>";?></div></div><?php
                            echo "</th>";
                            if ($cont2 % 5 == 0 && $cont2 != 6) {
                              echo "</tr>";
                            }
                            $cont2++;
                        }
                      }
                    }
                    }else if ($cont % 5 == 0){
                      $cont = $cont / 5;
                      $sql3 = "select * from atividade where Pre_criada = 1 and Fixa = 0";
                      $result3 = mysqli_query($conectar, $sql3);
                      $cont2 = 1;
                      for($j = 0; $j < $cont; $j++) { echo "<tr>" ;
                      if(mysqli_num_rows($result3) > 0) {
                        while($row = mysqli_fetch_assoc($result3)){
                            echo "<th>";
                            echo "<div class='atividade1'><a data-toggle='modal' data-target='#exampleModalEditar' data-whateverid=".$row['ID_atividade']." data-whatevertitulo=".$row['Titulo']." data-desc=".$row['Descricao']."
                                  data-whateverhf=".$row['Hora_final']." data-whateverhi=".$row['Hora_inicial']." data-whateverhf=".$row['Dia']."><i class='fas fa-edit'></i></a>&nbsp";
                            echo "<a href='excluirAtividade.php?idati=".$row['ID_atividade']."'><i class='fas fa-times'></i></a><br><div class='tit'>";
                            echo "<div data-toggle='modal' data-target='#exampleModalVer' data-whateverid1=".$row['ID_atividade']." data-whatevertitulo1=".$row['Titulo']." data-whateverdesc1=".$row['Descricao']."
                                  data-whateverhf1=".$row['Hora_final']." data-whateverhi1=".$row['Hora_inicial']." data-whateverhf1=".$row['Dia'].">";
                            echo $row['Titulo'];?><br><div class="desc"><?php
                            echo mb_strimwidth($row['Descricao'], 0, 16, "...")."</div></div>";?></div></div><?php
                            echo "</th>";
                            if ($cont2 % 5 == 0 && $cont2 != 6) {
                              echo "</tr>";
                            }
                            $cont2++;
                        }
                      }
                    }
                    }
                  }else {
                            $sql3 = "select * from atividade where Pre_criada = 1 and Fixa = 0";
                            $result3 = mysqli_query($conectar, $sql3);
                            echo "<tr>";
                            if(mysqli_num_rows($result3) > 0) {
                              while($row = mysqli_fetch_assoc($result3)){
                                echo "<th>";
                                echo "<div class='atividade1'><a data-toggle='modal' data-target='#exampleModalEditar' data-whateverid=".$row['ID_atividade']." data-whatevertitulo=".$row['Titulo']." data-desc=".$row['Descricao']."
                                      data-whateverhf=".$row['Hora_final']." data-whateverhi=".$row['Hora_inicial']." data-whateverhf=".$row['Dia']."><i class='fas fa-edit'></i></a>&nbsp";
                                echo "<a href='excluirAtividade.php?idati=".$row['ID_atividade']."'><i class='fas fa-times'></i></a><br><div class='tit'>";
                                echo "<div data-toggle='modal' data-target='#exampleModalVer' data-whateverid1=".$row['ID_atividade']." data-whatevertitulo1=".$row['Titulo']." data-whateverdesc1=".$row['Descricao']."
                                      data-whateverhf1=".$row['Hora_final']." data-whateverhi1=".$row['Hora_inicial']." data-whateverhf1=".$row['Dia'].">";
                                echo $row['Titulo'];?><br><div class="desc"><?php
                                echo mb_strimwidth($row['Descricao'], 0, 16, "...")."</div></div>";?></div></div><?php
                                echo "</th>";
                              }
                            }

                  }
?>
            </table>
          </div>
        <form method="POST" action="finalizar.php" enctype="multipart/form-data">
          <input type="hidden" name="idusu" value="<?php echo $id = $_SESSION["usuario"];?>">
          <input type="hidden" name="idse" value="<?php echo $semana['ID_semana']?>">
          <button type="submit" class="btn btn-primary">Finalizar Semana</button>
        </form>
        <div class="modal fade" id="exampleModalCriar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelCriar" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelCriar">Criar Atividade Pré-definida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="criarAtividadePre.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Título:</label>
                    <input type="text" class="form-control tit" name="titulo" maxlength="20" required>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Descrição:</label>
                    <textarea class="form-control" name="desc" maxlength="50" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="algoooo" class="col-form-label">Hora Inicial:</label>
                    <input type="time" class="form-control" name="hri" required>
                  </div>
                  <div class="form-group">
                    <label for="algooo" class="col-form-label">Hora Final:</label>
                    <input type="time" class="form-control" name="hrf" required>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Criar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="exampleModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelEditar" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelEditar">Editar Atividade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="atualizarAtividade.php" enctype="multipart/form-data">
                  <input type="hidden" name="id" id="idati">
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Título:</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" maxlength="20" required>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Descrição:</label>
                    <textarea class="form-control" name="desc" id="desc" maxlength="50" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="algoooo" class="col-form-label">Hora Inicial:</label>
                    <input type="time" class="form-control" name="hi" id="hi" required>
                  </div>
                  <div class="form-group">
                    <label for="algooo" class="col-form-label">Hora Final:</label>
                    <input type="time" class="form-control" name="hf" id="hf" required>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php for($i = 0; $i < 7; $i++) {?>
          <div class="modal fade" id="exampleModal<?php echo "$i"?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Criar Atividade</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="criarAtividade.php" enctype="multipart/form-data">
                    <input type="hidden" name="idse" value="<?php echo $semana['ID_semana']?>">
                    <input type="hidden" name="iddia" value="<?php echo $i?>">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Título:</label>
                      <input type="text" class="form-control tit" name="titulo" maxlength="20">
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Descrição (breve):</label>
                      <textarea class="form-control" name="desc" maxlength="50"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="algoooo" class="col-form-label">Hora Inicial:</label>
                      <input type="time" class="form-control" name="hri">
                    </div>
                    <div class="form-group">
                      <label for="algooo" class="col-form-label">Hora Final:</label>
                      <input type="time" class="form-control" name="hrf">
                    </div>
                    <div class="form-group">
                      <label for="algoo" class="col-form-label">Pré-criada:</label>
                      <select class="form-control" name="pc">
               			 	<option></option>
               			 	<?php
               			 		$sql6 = "select titulo from atividade where Pre_criada = 1 and Fixa = 0";
               			 		$result6 = mysqli_query($conectar, $sql6);
               			 		$totAtividade = array();
               			 		while($array1 = mysqli_fetch_array($result6)) { $totAtividade[] = $array1['titulo'];}
               			 		for ($j=0; $j < count($totAtividade); $j++) {
               			 			echo "<option>" . $totAtividade[$j] . "</option>";
               			 		}
               			 	?>
               			 </select>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Criar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="modal fade" id="exampleModalVer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelVer" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelVer">Atividade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="concluida.php" enctype="multipart/form-data">
                  <input type="hidden" name="id" id="idati1"> <!-- AQUI TÁ O ID DA ATIVIDADE, PRECISO DELE ALI EM BAIXO PRA PODER SABER SE A ATIVIDADE FOI CONCLUIDA E O MOTIVO -->
                  <div class="form-group">
                    <div class="txtt" value=" " id="titulo1">
                  </div>
                  <div class="form-group">
                    <div class="txtt" value=" " id="desc1">
                  </div>
                  <div class="form-group">
                    <div class="txtt" value=" " id="hi1">
                  </div>
                  <div class="form-group">
                    <div class="txtt" value=" " id="hf1">
                  </div>
                  <div class="form-group">
                    <label for="algoooo" class="col-form-label">Tarefa concluida:</label>
                    <input type="radio" name="conc" id="conc1" <?php  /* Preciso do ID da ATIVIDADE aqui. Aqui em baixo foi uma das soluções q pensei, mas n funcionou

                    '                                                   '$id0 = "<div class='txtt' value='' id='idati1'>";
                                                                        $sql0 = "select * from atividade where ID_atividade = $id0";
                                                                        $result0 = mysqli_query($conectar, $sql0);
                                                                        $conc0 = mysqli_fetch_array($result0);
                                                                        if ($conc0["Concluida"] == 1) { // se for 1, ela ta completa, então marca o radio button
                                                                          echo "checked";
                                                                        }*/
                                                                  ?> >
                    <select name="mot1" id="mot"> <!-- tem como eu definir uma opção pra ficar selecionada, mas daí preciso dos valores do banco e pra isso preciso do ID também, se solucionar esse de cima, soluciona esse aqui também -->
                      <option></option> <!-- coloquei uma opção sem valor, agr salva do jeito q era pra salvar, mas daí o usuário tem q sempre selecionar um, mas acho q tá bom assim já -->
                      <option>por ter sido concluida</option>
                      <option>mas com dificuldades</option>
                      <option>mas levou mais tempo que o esperado</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="algoooo" class="col-form-label">Tarefa incompleta:</label>
                    <input type="radio" name="conc" id="conc2"   <?php  /* $id0 = "<div class='txtt' value='' id='idati1'>";
                                                                        $sql0 = "select * from atividade where ID_atividade = $id0";
                                                                        $result0 = mysqli_query($conectar, $sql0);
                                                                        $conc0 = mysqli_fetch_array($result0);
                                                                        if ($conc0["Concluida"] == 0) { // se for 0, ela ta completa, então marca o radio button
                                                                          echo "checked";
                                                                        } */
                                                                  ?> >
                    Por:<select name="mot2" id="mot">
                      <option></option>
                      <option>não ter sido concluida</option>
                      <option>alguma emergência</option>
                      <option>causa de outra atividade</option>
                      <option>procrastinação</option>
                      <option>falta de tempo</option>
                      <option>ter se esquecido</option>
                    </select>
                  </div>
                  <input type="hidden" name="idse" value="<?php echo $semana['ID_semana']?>">
                  <input type="hidden" name="iddia" value="<?php echo $i?>">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script type="text/javascript" href="/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
      <script type="text/javascript" href="/font/js/all.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="../bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
      <script type="text/javascript">
        $('#exampleModalEditar').on('show.bs.modal', function(event){
          var button = $(event.relatedTarget)
          var id = button.data('whateverid')
          var titulo = button.data('whatevertitulo')
          var descricao = button.data('desc')
          var hf = button.data('whateverhf')
          var hi = button.data('whateverhi')
          var modal = $(this)
          modal.find('.modal-title').text('Editar Atividade')
          modal.find('#idati').val(id)
          modal.find('#titulo').val(titulo)
          modal.find('#desc').val(descricao)
          modal.find('#hf').val(hf)
          modal.find('#hi').val(hi)
        })
        $('#exampleModalVer').on('show.bs.modal', function(event){
          var button = $(event.relatedTarget)
          var id1 = button.data('whateverid1')
          var titulo1 = button.data('whatevertitulo1')
          var descricao1 = button.data('whateverdesc1')
          var hf1 = button.data('whateverhf1')
          var hi1 = button.data('whateverhi1')
          var modal = $(this)
          modal.find('#idati1').val(id1)
          document.getElementById("idati1").innerHTML = id1
          document.getElementById("titulo1").innerHTML = ("Título: " + titulo1 + "<br>")
          document.getElementById("desc1").innerHTML = ("Descrição: " + descricao1 + "<br>")
          document.getElementById("hi1").innerHTML = ("Horário Inicial: " + hi1 + "<br>")
          document.getElementById("hf1").innerHTML = ("Horário Final: " + hf1 + "<br>")
        })
      </script> <?php
      }else{
        ?><form action="criarSemana.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $id?>">
          <input type="submit" value="Iniciar" />
        </form><?php
      }
  ?>
</body>
