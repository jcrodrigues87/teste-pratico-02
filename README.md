# Teste Prático

O objetivo deste teste é conhecer suas habilidades em:

* Desenvolvimento Web (Tecnologias, Linguagens de programação, Frameworks, Banco de Dados, HTML, CSS e JavaScript);
* Entendimento e análise dos requisitos;
* Modelagem de banco de dados;
* Integração com WebServices;

Você deve desenvolver uma pequena aplicação WEB utilizando a linguagem de programação, framework(s) e banco de dados relacional de sua preferência.

## Problema

### Portal de Talentos

* Uma empresa deseja implementar um banco de talentos de programadores, para isso ela deseja desenvolver um portal para que candidatos possam fazer seu cadastro;
* O cadastro deve conter os seguintes dados do candidato: Código, Nome, Data de Nascimento, E-mail, Telefone, Endereço, CEP, Formações (Nome da Formação, Nome da Instituição, Data de Conclusão) e Habilidades
* Campo Endereço do candidato deve ser preenchido automaticamente ao informar o CEP;
* Um candidato pode ter nenhuma ou várias Formações;
* O preenchimento do campo habilidades deve ser feito selecionando itens uma lista pré-definida que contém os seguintes itens: Java, Node.js, C++, PHP, Python, Go, ADVPL, Angular, Electron, React, React Native, MongoDB, MySQL, SQLServer, Postgres, Backend, Front-End
* Deve ser possível visualizar uma lista com os candidatos (Código, Nome, E-mail, Telefone, Lista de Habilidades);
* Selecionando um item da listagem de candidatos deve ser possível visualizar o cadastro completo do candidato;
* Na listagem de candidatos deve ser possível: buscar candidatos pelo nome e habilidades;

* Exemplo da página de Registro de Candidatos:

```
|         Nome | Pedro Paulo de Faria
| Data da Nasc. | 19/01/1964
|          CEP | 37925-000
|     Endereço | logradouro, complemento, bairro, localidade, uf
|       E-mail | ppf@dominio.com
|     Telefone | (37)3371-1367

|----------------------------------------------|
|                   Formações                  |
|----------------------------------------------|
|        Nome | COBOL Básico                   |
|----------------------------------------------|
| Instituição | Instituto Universal Brasileiro |
|----------------------------------------------|
|   Conclusão | 20/04/1976                     |
|----------------------------------------------|
|        Nome | Ciências da computação         |
|----------------------------------------------|
| Instituição | UFMG                           |
|----------------------------------------------|
|   Conclusão | 20/04/1982                     |
|----------------------------------------------|

|----------------------------------------------|
|                  Habilidades                 |
|----------------------------------------------|
| [x] Java         [ ] React                   |
| [ ] Node.js      [ ] React Native            |
| [x] C++          [ ] MongoDB                 |
| [ ] PHP          [ ] MySQL                   |
| [ ] Python       [ ] SQLServer               |
| [ ] Go           [ ] Postgres                |
| [ ] ADVPL        [x] Backend                 |
| [ ] Angular      [x] Front-End               |
| [x] Electron                                 |
|----------------------------------------------|
```

* Exemplo da página com Listagem dos Talentos:

```
| Relação de Talentos |

| campo para pesquisa |

|--------|----------------------|------------------|---------------|-----------------------------------------|
| Código | Nome                 | E-mail           | Telefone      | Habilidades                             | 
|--------|----------------------|------------------|---------------|-----------------------------------------|
| 000001 | Pedro Paulo de Faria | ppf@dominio.com  | (37)3371-1367 | Java, C++, Electron, Backend, Front-End |
| 000002 | Manoel Ferreira      | mf@dominio.com   | (37)3371-3677 | Go, C++ , Backend                       |
| 000003 | Gustavo Oliveira     | go@dominio.com   | (37)3371-4680 | React Native, Front-End                 |
|--------|----------------------|------------------|---------------|-----------------------------------------|
```

## Orientações

* Nesta aplicação é necessário desenvolver apenas duas páginas, uma para listar os candidatos e outra para realizar o cadastro do candidato;
* Não é necessário implementar login ou outra forma de autenticação
* O banco de dados não pode permitir 2 candidatos com o mesmo e-mail;
* O campo Código do Candidato deve ser sequencial e gerado automaticamente;
* Deve usar o webservice da ViaCEP (https://viacep.com.br/) para preencher o endereço após preencher o campo CEP;
* Faça fork desse projeto 

## Entrega

* Para iniciar o teste, faça um fork deste repositório, crie uma branch com o seu nome completo e depois envie-nos o pull request. Se você apenas clonar o repositório não vai conseguir fazer push e depois vai ser mais complicado fazer o pull request.
* edite este README explicando como executar e testar a aplicação;
* Todos os arquivos necessários para rodar o projeto devem estar no repositório do github;


## Diferenciais

* Qualidade do código escrito;
* Testes unitários;
* Comentários claros no código;
* Commits com mensagens claras;
