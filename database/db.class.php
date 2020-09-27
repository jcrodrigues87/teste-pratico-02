<?php

class db
{
  //host
  private $host = 'localhost';

  //usuario
  private $usuario = 'root';

  //senha
  private $senha = '';

  //banco de dados
  private $database = 'testecanex';

  public function conecta_mysql()
  {

    //criar conexão
    $conexao = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

    // ajustar o charset, comunicação entre o php e mysql utilizando UTF8
    mysqli_set_charset($conexao, 'utf8');

    //verificar se houve algum erro de conexao
    if (mysqli_connect_errno()) {
      echo "Erro ao tentar se conectar com BD MySQL:" . mysqli_connect_error();
    }
    return $conexao;
  }
}
