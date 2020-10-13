<?php

require_once('database/db.class.php');

//Pegando o codigo do candidato selecionado
$codigo_candidato = $_POST['id'];

$objDb = new db();
$link = $objDb->conecta_mysql();

//Buscando candidato e suas formações
$sql = "SELECT c.codigo, c.nome, c.data_nascimento, c.email, c.telefone, c.logradouro, \n"
  . "c.cep, c.habilidades\n"
  . "FROM candidatos as c WHERE c.codigo = '$codigo_candidato'";

$sql2 = "SELECT * FROM formacoes as f WHERE f.cod_candidato='$codigo_candidato'";


$resultado_cand = mysqli_query($link, $sql);
$resultado_form = mysqli_query($link, $sql2);

if ($resultado_cand) {
  echo '<div class=row>';
  $registro_cad = mysqli_fetch_array($resultado_cand, MYSQLI_ASSOC);

  echo '<div class="col-md-12 center"><h4> Dados pessoais: </h4> </div>';

  echo '<div class="col-md-4">';
  echo '<span> <strong>Nome: </strong>' . $registro_cad["nome"] . '</span> <br>';
  echo '<span> <strong>Data de Nascimento: </strong> ' .
    date('d/m/Y', strtotime($registro_cad["data_nascimento"])) . '</span>';
  echo '</div>';

  echo '<div class="col-md-4">';
  echo '<span> <strong>E-mail:</strong> ' . $registro_cad["email"] . '</span> <br>';
  echo '<span> <strong>Telefone:</strong> ' . $registro_cad["telefone"] . '</span>';
  echo '</div>';

  echo '<div class="col-md-4">';
  echo '<span> <strong>Logradouro: </strong> ' . $registro_cad["logradouro"] . '</span><br>';
  echo '<span> <strong>CEP: </strong>' . $registro_cad["cep"] . '</span><br><br>';
  echo '</div>';

  echo '<div class="col-md-12 center"><h4> Habilidades: </h4> </div>';
  echo '<div class="col-md-12 center">';
  echo '<span>' . $registro_cad["habilidades"] . '</span>';
  echo '</div>';

  echo '<div class="col-md-12 center"><h4> Formações: </h4> </div>';
  //Escrevendo todas as formações do candidato
  while ($registro_form = mysqli_fetch_array($resultado_form, MYSQLI_ASSOC)) {
    echo '<div class="col-md-12 center">';
    echo '<div class="col-md-4"> <strong>Curso: </strong>' . $registro_form["nome_do_curso"] . '</div>';
    echo '<div class="col-md-4"> <strong>Instituição do curso: </strong>' . $registro_form["nome_da_instituicao"] . '</div>';
    echo '<div class="col-md-4"> <strong>Conclusão: </strong>' .
      date('d/m/Y', strtotime($registro_form["data_conclusao"])) . '</div>';
    echo '</div>';
  }
  echo '</div>';
} else {
  echo 'Erro ao buscar detalhes do candidato no banco';
}
