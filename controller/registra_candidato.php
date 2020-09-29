<?php

require_once('../database/db.class.php');

//Super global post e get são como arrays associativos
$nome = $_POST['nome'];
$email = $_POST['email'];

//Variáveis de controle
$email_existe = false;

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
  $retorno_get .= "erro_email=1&";
  header('Location: index.php?' . $retorno_get);
  die(); //interrompe a execução do script
}

//Se não existir faz o cadastro no banco
$sql = "insert into usuarios (nome, email, cep) values ('$nome', '$email', '$cep') ";

//executar a query, funcão usa como parametro o link de conexão e a query
//a funçao mysqli_query retorna false se houver algun erro
if (mysqli_query($link, $sql)) {
  echo "Cadastro efetuado com sucesso!";
} else {
  echo "Erro ao registrar usuário!";
}
