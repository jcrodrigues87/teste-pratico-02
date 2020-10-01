<?php

require_once('database/db.class.php');

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

  <script>
    $(document).ready(function() {
      //Requisição Ajax para a página busca_candidatos 
      //se obtiver sucesso insere os dados na div candidatos
      $("#btn_buscar_candidato").click(function() {
        if ($("#nome_candidato").val().length > 0) {
          //console.log("dentro do if tamanho")
          $.ajax({
            url: 'get_candidatos.php',
            method: 'post',
            data: $('#form_busca_candidato').serialize(),
            success: function(data) {
              $('#candidatos').html(data)
              //console.log(data)
            }
          })
        }
      })
      // Funçao exibir mais detalhes
      $("#candidatos").delegate("button", "click", function(event) {
        //console.log(event.target.value);
        var id = {
          id: event.target.value
        };
        $.ajax({
          url: 'get_detalhes_cand.php',
          method: 'post',
          data: id,
          success: function(data) {
            $('#candidatos').html(data)
            //console.log(data)
          }
        })
      })
    })
  </script>
</head>

<body>
  <!-- Header -->
  <?php include 'header.php'; ?>

  <div class="container">

    <div class="buscar">
      <form id="form_busca_candidato" class="input-group">
        <input type="text" id="nome_candidato" name="nome_candidato" class="form-control" placeholder="Digite o nome ou habidades do candidato" />
        <button class="btn btn-outline-success btn-buscar" id="btn_buscar_candidato" type="button"> Buscar </button>
      </form>
    </div>

    <div id="candidatos">
      Os candidatos seram listados aqui...
    </div>

    <div class="col-md-12 center">
      <a href="index.php">
        <button type="button" class="btn btn-outline-info"><b>Voltar<b></button>
      </a>
    </div>
  </div>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">
</body>

</html>