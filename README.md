### Requisitos para rodar a Aplicação Web PHP na máquina local:

1 - Pacote XAMPP Control na última versão e com as configurações padrão.<br>
2 - Excluir os arquivos padrão do Apache da pasta htdocs, localizada em C:\xampp\htdocs. <br>
3 - Iniciar os dois serviços Apache e MySQL no XAMPP Control.

### Instruções para criar e popular o banco de dados MySQL:

4 - Acessar: http://localhost/phpmyadmin/ <br>
5 - Criar o bando: `CREATE DATABASE testecanex;` <br>
6 - Entrar no banco e importar o arquivo `testecanex.sql`

### Adicionando o projeto no servidor Apache local:

Apenas copiar o conteúdo do projeto testes-pratico-02 para a pasta htdocs.
O usuário e senha do banco de dados podem ser alterados na classe `db.class.php`.
Com Apache já iniciado basta acessar http://localhost/
