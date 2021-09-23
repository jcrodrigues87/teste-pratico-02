Usar php e mysql.

Copie o todos os fontes  para pasta servidor apache com mysql
acesse a pasta model->DataAcess
Abra o arquivo BancoTaletos.Model.Database.php com notepa++
Edit os dados da configuracao do Host,  user,senha e database. Atencao Edite apenas conteudo esta dentro da aspas duplas. 
Salve arquivo.

Dados estao a conexao com o banco de dados da aplicacao agora
host = 'localhost'
user = 'root'
senha = ''
database = bancodetalentos

Abra navegador
acesse endereco localhost ou o ip da maquina esta servidor xamp,
acesso o phpmyadmin e crie uma nova database com nome que foi configurado no o arquivo do database
Depois
Link: localhost/install.php. o script ja vai criar as tabelas do banco de dados.
Apareca a mensagem e clique aqui para voltar pagina inicial

Pagina de Visualizacao

Pesquisa: 
Digite parte nome da pessoa ou selecione a habilidade desejada e clique em buscar.
O fonte trara registros com as caracteristicas desejadas

Cadastro.clique em novo registro
Insira os dados
clique em salvar.

Para adicionar novas habilidade, acessar banco de dados a tabela cad_habilidades e adicionar manualmente nova funcao.