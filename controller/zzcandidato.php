<?php
class Candidato
{
  private $nome;
  private $data_nascimento;
  private $cep;
  private $logradouro;
  private $complemento;
  private $bairro;
  private $localidade;
  private $uf;
  private $email;
  private $telefone;


  public function __construct(
    $nome,
    $data_nascimento,
    $cep,
    $logradouro,
    $complemento,
    $bairro,
    $localidade,
    $uf,
    $email,
    $telefone
  ) {
    $this->nome = $nome;
    $this->data_nascimento = $data_nascimento;
    $this->$cep = $cep;
    $this->$logradouro = $logradouro;
    $this->$complemento = $complemento;
    $this->$bairro = $bairro;
    $this->$localidade = $localidade;
    $this->$uf = $uf;
    $this->$email = $email;
    $this->$telefone = $telefone;
  }

  public function getNome()
  {
    return $this->nome;
  }
  public function getData_nascimento()
  {
    return $this->data_nascimento;
  }
  public function getCep()
  {
    return $this->cep;
  }

  public function getLogradouro()
  {
    return $this->logradouro;
  }

  public function getComplemento()
  {
    return $this->complemento;
  }

  public function getBairro()
  {
    return $this->bairro;
  }

  public function getLocalidade()
  {
    return $this->localidade;
  }

  public function getUf()
  {
    return $this->uf;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getTelefone()
  {
    return $this->telefone;
  }
}
