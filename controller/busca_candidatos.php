<?php

require_once('database/db.class.php');

function busca_candidatos()
{

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $sql = "SELECT * FROM `candidatos`";

  $resultado = mysqli_query($link, $sql);

  $dados_candidatos = array();

  if ($resultado) {

    while ($linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
      $dados_candidatos[] = $linha;
    }
    return $dados_candidatos;
  } else {
    echo 'Erro ao consultar candidatos';
  }
}
