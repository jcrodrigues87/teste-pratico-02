<?php

require_once('database/db.class.php');

//Pegando o codigo do candidato selecionado
$codigo_candidato = $_POST['id'];

$objDb = new db();
$link = $objDb->conecta_mysql();

//Buscando candidato e suas formações
$sql = "SELECT DISTINCT codigo, nome, data_nascimento, email, telefone, logradouro, 
cep, habilidades, nome_do_curso, nome_da_instituicao, data_conclusao 
FROM candidatos INNER JOIN formacoes ON candidatos.codigo = formacoes.cod_candidato 
WHERE candidatos.codigo = '$codigo_candidato'";


$resultado = mysqli_query($link, $sql);

if ($resultado) {
  echo '
  <table class="table table-striped">
  <thead>
  <tr>
  <th scope="col">Nome</th>
  <th scope="col">Data Nascimento</th>
  <th scope="col">E-mail</th>
  <th scope="col">Telefone</th>
  <th scope="col">Logradouro</th>
  <th scope="col">Cep</th>
  <th scope="col">Habilidades</th>
  <th scope="col">Nome do Curso</th>
  <th scope="col">Nome da Instituição</th>
  <th scope="col">Data de Conclusão</th>
  </tr>
  </thead>
  <tbody>
';
  while ($registro_cad = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
    echo '<tr>';
    echo '<td> ' . $registro_cad["nome"] . '</td>';
    echo '<td>' . $registro_cad["data_nascimento"] . '</td>';
    echo '<td>' . $registro_cad["email"] . '</td>';
    echo '<td>' . $registro_cad["telefone"] . '</td>';
    echo '<td> ' . $registro_cad["logradouro"] . '</td>';
    echo '<td>' . $registro_cad["cep"] . '</td>';
    echo '<td>' . $registro_cad["habilidades"] . '</td>';
    echo '<td>' . $registro_cad["nome_do_curso"] . '</td>';
    echo '<td> ' . $registro_cad["nome_da_instituicao"] . '</td>';
    echo '<td>' . $registro_cad["data_conclusao"] . '</td>';
    echo '</tr>';
  }
  echo '</tbody> </table>';
} else {
  echo 'Erro ao buscar detalhes do candidato no banco';
}
