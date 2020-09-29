<?php
//Importando conexão com o banco
require_once('database/db.class.php');
function busca_habilidades()
{
  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $sql = "SELECT * FROM `lista_habilidades`";

  $resultado = mysqli_query($link, $sql);

  return $resultado;
}
