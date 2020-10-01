# Requisitos para rodar a Aplicação

1 - Python 3.8.2 ou maior
2 - pip3

## Como iniciar os servidores

* Dê o git clone do projeto.

* Abra um terminal na pasta backend

* Ative o ambiente virtual com o comando 'source bin/activate'

* Instale o pacote setuptools primeiramente com 'pip3 install -U setuptools'

* Intale os requisitos com o comando 'pip3 install -r requirements.txt'

* Entre na pasta src 'cd src'

* Crie o banco de dados com os comandos:
- python3 manage.py makemigrations
- python3 manage.py migrate

* Execute o servidor 'python3 manage.py runserver'

* Abra um segundo terminal na pasta front-end

* Instale o NPM (Node Package Manager) para executar o cliente com 'apt install npm'

* Instale os módulos necessário com 'npm install modules'

* Execute o servidor com 'npm run serve'

### Testes 

Abrir a página: http://localhost:8080/

Para cadastrar um programador todos os campos devem estar preenchidos

Na tela de listagem é possível de fazer a filtragem dos programadores por nome ou habilidades