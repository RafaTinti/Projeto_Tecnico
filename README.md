## TO DO

- pesquisa transacoes ex. so as de debito ect..
- mascaras de telefone, cpf e cnpj no input
- dashbord com saldo e mensagem de boas vindas
- concertar show views usuario que criou e atualizou por ultimo

## instrucoes

    Eu fiz usando o xampp no windows
- download xampp 
- download composer e node.js
- no painel de controle do xampp liga o servidor Apache e o MySQL
- vai na pasta xampp/htdocs
- clona o projeto do repositorio no github
- dentro da past do projeto renomeia example.env para .env
    eu usei as portas padrao 80 e 3306 e o MySQL
- abra o console na pasta do projeto
- rode os comandos
    composer install
    php artisan key:generate
    php artisan migrate - para criar as tabelas no DB
    php artisan db:seed - para rodar o seeder e preencher as tabelas com dados para teste
    npm run dev
- e eu rezo pra que funcione

seeder cria um usuario padrao admin@admin.com senha: password
50 pessoas, 20 categorias e 50 transacoes

node.js and composer

php artisan migrate to make the tables

php artisan db:seed to run the seeders

php artisan migrate --seed to migrate and seed 
