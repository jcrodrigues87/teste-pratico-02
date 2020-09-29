<?php

require_once('../database/db.class.php');

/* Recebendo os dados atraves da super global post*/
$nome = $_POST['nome'];
$cep = $_POST['cep'];
$email = $_POST['email'];
$logradouro = $_POST['logradouro'];
$complemento = $_POST['complemento'];
$data_nasc = $_POST['data_nasc'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$telefone = $_POST['telefone'];
$curso = $_POST['curso']; //Array de cursos
$instituicao = $_POST['instituicao']; //Array de institituiçao
$conclusao = $_POST['conclusao']; //Array de conclusão
$habilidades = implode(", ", $_POST['habilidades']); //Array de habilidades


/* Variável de controle */
$email_existe = false;
$codido_candidato[] = null;

$objDb = new db();
$link = $objDb->conecta_mysql();

//Verificar se o e-mail ja existe
$sql = "select * from candidatos where email = '$email'";
$resultado_id = mysqli_query($link, $sql);
if ($resultado_id) {
  $dados_usuario = mysqli_fetch_array($resultado_id);
  if (isset($dados_usuario['email'])) {
    $email_existe = true;
  }
} else {
  echo "Erro ao tentar localizar registro de E-mail";
}

//Se o E-mail existir
if ($email_existe) {
  echo "Este e-mail já se encontra cadastrado";
}
/** Inserindo o candidato no banco */
$sql = "INSERT INTO candidatos (nome, data_nascimento, email, telefone, logradouro, cep, habilidades, complemento) 
VALUES ('$nome', '$data_nasc', '$email', '$telefone', '$logradouro', '$cep', '$habilidades', '$complemento')";


//Executando a query e testando se não houve erro
if (mysqli_query($link, $sql)) {
  echo "Candidato cadastrato com sucesso! <br>";

  //Buscar o codigo do candidato no banco atraves do email
  $sql = "SELECT codigo, email FROM candidatos WHERE email = '$email'";
  $resultado2 = mysqli_query($link, $sql);

  if ($resultado2) {
    $linha = mysqli_fetch_array($resultado2, MYSQLI_ASSOC);
    $codido_candidato = $linha['codigo'];
  } else {
    echo 'Erro ao consultar candidato <br>';
  }
  //Inserindo suas respectivas fomaçoes
  for ($i = 0; $i < count($curso); $i++) {
    if ($curso[$i] != "" && $instituicao[$i] != "" && $conclusao[$i] != "") {
      $sql = "INSERT INTO formacoes(nome_do_curso, nome_da_instituicao, data_conclusao, cod_candidato) 
      VALUES ('$curso[$i]','$instituicao[$i]','$conclusao[$i]','$codido_candidato')";
      if (mysqli_query($link, $sql)) {
        echo "Formação do candidato cadastrada com sucesso!";
      } else {
        echo "Erro ao registrar Formação do usuário!";
      }
    }
  }


  $codido_candidato = 5; //apenas para teste por enquanto
} else {
  echo "Erro ao registrar usuário!";
}
