<?php
if (isset($_POST['submit_formacoes'])) {

  $curso = $_POST['curso'];
  $instituicao = $_POST['instituicao'];
  $conclusao = $_POST['conclusao'];
  for ($i = 0; $i < count($curso); $i++) {
    if ($curso[$i] != "" && $instituicao[$i] != "" && $conclusao[$i] != "") {
      echo "'$curso[$i]','$instituicao[$i]','$conclusao[$i]'";
    }
  }
}
