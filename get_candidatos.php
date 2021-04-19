<?php

require_once('database/db.class.php');

//Pegando o nome informando no input buscar
$nome_candidato = $_POST['nome_candidato'];

$objDb = new db();
$link = $objDb->conecta_mysql();

//Buscando candidato por nome ou habilidades
$sql = "SELECT * FROM candidatos
  WHERE nome LIKE '%$nome_candidato%' 
  OR habilidades LIKE '%$nome_candidato%'";


$resultado = mysqli_query($link, $sql);

if ($resultado) {
  echo '
        <table class="table table-striped">
        <thead>
        <tr>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Telefone</th>
        <th scope="col">Habilidades</th>
        </tr>
        </thead>
        <tbody>
    ';
  while ($registro_cad = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
    echo '<tr>';
    echo '<th scope="row">' . $registro_cad["codigo"] . ' </th>';
    echo '<td> ' . $registro_cad["nome"] . '</td>';
    echo '<td>' . $registro_cad["email"] . '</td>';
    echo '<td>' . $registro_cad["telefone"] . '</td>';
    echo '<td>' . $registro_cad["habilidades"];
    //Btn ver mais
    echo '<button class="btn btn-link" value=' . $registro_cad["codigo"] .
      ' type="button"> Ver mais</button></td>';
    echo '</tr>';
  }
  echo '</tbody> </table>';
} else {
  echo 'Erro na consulta de candidatos no banco de dados';
}
