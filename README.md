### Requisitos para rodar a Aplicação Web PHP:

Instalar o pacote XAMPP Control v3.2.4 com as configurações padrão.
Excluir os arquivos contidos na pasta htdocs do Apache, localizada em C:\xampp\htdocs.
Iniciar os dois servidores Apache e MySQL.

### Instruções para criar e popular o banco de dados MySQL:

Acessar: http://localhost/phpmyadmin/
Criar o bando: `CREATE DATABASE testecanex;`
Entrar no banco e importar o arquivo testecanex.sql

### Instruções para adicionar o projeto no servidor Apache:

Necessário apenas copiar o conteúdo do projeto testes-pratico-02 para a pasta htdocs.
O usuário e senha do banco de dados podem ser alterados na classe `db.class.php`.
Com Apache já iniciado basta acessar http://localhost/
