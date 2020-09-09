<?php
    session_start();
    include "conexao.php";
?>
<head>
  <style>
    .atividade {
      border-color:black;
      border-style: solid;
      border-width: 1px;
      border: fixed;
      margin: 0;
      padding: 2px;
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
  </style>
  <title>Cronograma</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1/dist/css/bootstrap.min.css"/>
  <link rel='stylesheet' href="./css/menu.css">
  <link rel='stylesheet' href="./css/crono.css">
</head>
<body>
  <?php
      include_once("menu.php");
  ?>
  <?php
      $id = $_SESSION["usuario"];
      $sql = "select * from semana where ID_user = $id";
      $result = mysqli_query($conectar, $sql);
      $row = mysqli_num_rows($result);
      $semana = mysqli_fetch_array($result);
      $num = 1;
      if($row != 0) {
        ?><h2>Semana <?php echo $semana['NumSemana']?></h2>
        <table class="tg">
          <thead>
            <tr class="algo">
              <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal0">SEG</th>
              <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal1">TER</th>
              <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal2">QUA</th>
              <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal3">QUI</th>
              <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal4">SEX</th>
              <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal5">SÁB</th>
              <th class="tg-0pky" data-toggle="modal" data-target="#exampleModal6">DOM</th>
            </tr>
            <tr>
              <?php for($i = 0; $i < 7; $i++) {?>
                <th>
                  <?php
                    $sql2 = "select * from atividade where ID_semana = $semana[ID_semana] and Dia = $i";
                    $result2 = mysqli_query($conectar, $sql2);
                    if(mysqli_num_rows($result2) > 0) {
                      while($row = mysqli_fetch_assoc($result2)){
                        echo "<div class='atividade' data-toggle='modal' data-target='#exampleModalVer' data-whateverid1=".$row['ID_atividade']." data-whatevertitulo1=".$row['Titulo']." data-whateverdesc1=".$row['Descricao']."
                              data-whateverhf1=".$row['Hora_final']." data-whateverhi1=".$row['Hora_inicial']." data-whateverhf1=".$row['Dia'].">";
                        echo "<a data-toggle='modal' data-target='#exampleModalEditar' data-whateverid=".$row['ID_atividade']." data-whatevertitulo=".$row['Titulo']." data-whateverdesc=".$row['Descricao']."
                              data-whateverhf=".$row['Hora_final']." data-whateverhi=".$row['Hora_inicial']." data-whateverhf=".$row['Dia']."> Editar </a>";
                        echo "<a href='excluirAtividade.php?idati=".$row['ID_atividade']."'> Excluir</a><br><div class='tit'>";
                        echo $row['Titulo'];?><br></div><div class="desc"><?php
                        echo mb_strimwidth($row['Descricao'], 0, 16, "...");?></div></div><br><?php
                      }
                    }
                  ?>
                </th>
              <?php } ?>
            </tr>
          </thead>
        </table>
        <input type="button" class="tg-0pky" data-toggle="modal" data-target="#exampleModalCriar" value="Criar">
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
                      <input type="text" class="form-control tit" name="titulo" maxlength="20" required>
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Descrição (breve):</label>
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
                    <div class="form-group">
                      <label for="algoo" class="col-form-label">Pré-criada:</label>
                      <select class="form-control" id="algoo">
                        <option>q</option>
                        <option>dd</option>
                        <option>d</option>
                        <option>d</option>
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
                <form method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" id="idati1">
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
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="../bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
      <script type="text/javascript">
        $('#exampleModalEditar').on('show.bs.modal', function(event){
          var button = $(event.relatedTarget)
          var id = button.data('whateverid')
          var titulo = button.data('whatevertitulo')
          var descricao = button.data('whateverdesc')
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
          document.getElementById("idati1").innerHTML = id1
          document.getElementById("titulo1").innerHTML = ("Título: " + titulo1 + "<br>")
          document.getElementById("desc1").innerHTML = ("Descrição: " + descricao1 + "<br>")
          document.getElementById("hi1").innerHTML = ("Horário Inicial: " + hi1 + "<br>")
          document.getElementById("hf1").innerHTML = ("Horário Final: " + hf1 + "<br>")
        })
      </script> <?php
      }else {
        ?><form action="criarSemana.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $id?>">
          <input type="submit" value="Iniciar" />
        </form><?php
      }
  ?>

</body>
