<?php
//Importando conexão com o banco
require_once('busca_habilidades.php');
//Pegando lista de habilidades no banco
$resultado = busca_habilidades();
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
    <!-- Inicio formulário -->
    <div class="col-md-12">
      <form method="post" action="registra_candidato.php">

        <div class="row">
          <div class="col-md-6">
          </div>
          <div class="col-md-6">
          </div>
        </div>

        <div class="row">
          <!-- Formulario ViaCEP -->
          <div class="col-md-6">
            <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome completo" required>
            <input name="cep" type="text" class="form-control" id="cep" value="" size="10" maxlength="9" placeholder="CEP" required />
            <input name="rua" type="text" class="form-control" id="rua" size="50" placeholder="Logradouro" required />
            <input name="complemento" type="text" class="form-control" id="complemento" size="20" placeholder="Complemento" />
            <input name="email" type="email" class="form-control" id="email" placeholder="Email" required>
          </div>

          <div class="col-md-6">
            <input name="data_nasc" type="text" class="form-control" id="data_nasc" placeholder="Data de Nascimento" required>
            <input name="bairro" type="text" class="form-control" id="bairro" size="30" placeholder="Bairro" required />
            <input name="cidade" type="text" class="form-control" id="cidade" size="40" placeholder="Cidade" required />
            <input name="uf" type="text" id="uf" class="form-control" size="2" placeholder="UF" required />
            <input name="telefone" type="tel" class="form-control" id="telefone" placeholder="Telefone" size="20" required>

          </div>

        </div>

        <!-- Formações-->
        <div class="habilidades">
          <h6>Suas formações:</h6>
          <div class="row">
            <div class="col-md-6 dados">
              <label>Curso: </label>
              <input name="nome_curso" type="text" class="form-control" id="nome_curso" />
            </div>

            <div class="col-md-6 dados">
              <label>Instituição: </label>
              <input name="nome_instituicao" type="text" class="form-control" id="nome_instituicao" />
            </div>

            <div class="col-md-4 dados">
              <label>Conclusão: </label>
              <input name="data_conclusao" type="date" class="form-control" id="data_conclusao" />
            </div>
          </div>
          <!-- Botao add formação-->
          <button type="button" class="btn btn-outline-success"><b>Clique aqui para adicionar uma nova formação</b></button>
        </div>

        <!-- Escrevendo a lista de habilidades-->
        <div class="habilidades">
          <h6>Selecione suas habilidades:</h6>
          <?php
          if ($resultado) {
            echo "<div class='container lista'>";
            echo "<div class='row'>";
            while ($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
          ?>
              <div class="col-md-2">
                <input type="checkbox" class="form-check-input" value=<?= $registro['nome'] ?>>
                <label class="form-check-label" for="materialUnchecked"><?= $registro['nome'] ?></label>
              </div>
          <?php
            }
            echo "</div>";
            echo "</div>";
          } else {
            echo 'Erro ao consultar candidatos';
          }
          ?>
        </div>

        <!-- Botões inferiores-->
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <button type="submit" class="btn btn-outline-success form-control"><b>Cadastar</b></button>
          </div>

          <div class="col-md-3">
            <a href="listar_candidatos.php">
              <button type="button" class="btn btn-outline-info form-control"><b>Listar Candidatos</b></button>
            </a>
          </div>
          <div class="col-md-3"></div>
          <div class="clearfix lista"><br></div>
        </div>
      </form>
    </div><!-- Fim form-->


  </div>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">
</body>

</html>