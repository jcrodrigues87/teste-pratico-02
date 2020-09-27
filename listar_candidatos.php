<?php

require_once('database/db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = "SELECT * FROM `candidatos`";

$resultado = mysqli_query($link, $sql);

$dados_candidatos = array();

if ($resultado) {

  while ($linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
    $dados_candidatos[] = $linha;
  }
} else {
  echo 'Erro ao consultar candidatos';
}

?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">

  <title>Teste Prático Canex</title>

  <!-- Adicionando JQuery -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- JQuery ViaCEP-->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <!-- bootstrap - link cdn -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Adicionando Javascript ViaCEP -->
  <script type="text/javascript" src="js/viacep.js"></script>

  <link href="css/style.css" rel="stylesheet">

</head>

<body>
  <!-- Header -->
  <?php include 'header.php'; ?>



  <div class="container">

    <h2 data-toggle="modal" data-target="#exampleModal">Abrir modal</h2>

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
        <!-- Fazer leitura do array do banco -->
        <?php foreach ($dados_candidatos as $candidato) {
          echo "<tr>";
          echo "<th scope='row'>" . $candidato['codigo'] . "</th>";
          echo "<td>" . $candidato['nome'] . "</td>";
          echo "<td>" . $candidato['email'] . "</td>";
          echo "<td>" . $candidato['telefone'] . "</td>";
          echo "<td>" . $candidato['habilidades'] . "
          <a href='' data-toggle='modal' data-target='#exampleModal'>Ver mais</a></td>";
        }
        echo "</tr>";
        ?>
        <!-- Fim leitura array -->
      </tbody>
    </table>

    <div class="col-md-12 center">
      <a href="index.php">
        <button type="button" class="btn btn-outline-info"><b>Voltar<b></button>
      </a>
    </div>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastro completo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>texto</p>
        </div>
      </div>
    </div>
  </div>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">
</body>

</html>