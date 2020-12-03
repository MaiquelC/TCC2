
opções pré criadas

<?php
  $sql6 = "select * from atividade where Pre_criada = 1 and Fixa = 0";
  $result6 = mysqli_query($conectar, $sql6);
  $totAtividade = array();
  while($array1 = mysqli_fetch_array($result6)) { $totAtividade[] = $array1['titulo']; }
  $idAtividade = array();
  while($array2 = mysqli_fetch_array($result6)) { $idAtividade[] = $array2['ID_atividade']; }
  for ($j=0; $j < count($totAtividade); $j++) {
    echo "<option>" . $totAtividade[$j] . "<input type='hidden' name='idativ' value=".$idAtividade[$j]."></option>";
  }
?>
