## TO DO

- pesquisa transacoes ex. so as de debito ect..
- concertar show views usuario que criou e atualizou por ultimo
- mascaras de telefone, cpf e cnpj no input
- dashbord com saldo e mensagem de boas vindas
- otimizar mobile

## Instrucoes

    Eu fiz usando o xampp no windows
- download xampp 
- download composer e node.js
- no painel de controle do xampp liga o servidor Apache e o MySQL
- vai na pasta xampp/htdocs
- clona o projeto do repositorio no github
- dentro da past do projeto renomeie example.env para .env\
    eu usei as portas padrao 80 e 3306 e o MySQL
- abra o console na pasta do projeto
- rode os comandos\
    composer install\
    php artisan key:generate\
    php artisan migrate - para criar as tabelas no DB\
    php artisan db:seed - para rodar o seeder e preencher as tabelas com dados para teste\
    npm run dev
- e eu rezo pra que funcione

seeder cria um usuario padrao admin@admin.com senha: password
50 pessoas, 20 categorias e 50 transacoes

## notas

- modelo er na pasta docs do projeto

- usei tailwind para estilos, breeze para autenticacao de usuarios, node.js e composer


