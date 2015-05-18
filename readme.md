# Projeto upload receita bruta

##Ferramentas Utilizadas
Framework Laravel 5, Banco de dados Mysql

##Estrutura do Projeto
A pasta _files contém 2 arquivos, o exemplo para upload e a estrutura do banco de dados.
O upload dos arquivos irá para a pasta storage/upload.

## Instruções para abrir o projeto
1. Primeiro devemos criar o banco de dados pode ser feito através do arquivo 'database_laravel_upload.sql' que está na pasta _files, ou pode-se criar um banco novo e rodar os comandos php artisan migrate:install e php artisan migrate:refresh.
1. Alterar as configurações do banco de dados no laravel, pode ser feita no arquivo .env, coloque o nome do banco criado e as configurações locais, ou se tiver restaurado através do script _/files/database_laravel_upload.sql o nome do banco será "laravelupload".
1. Atualizar as bibliotecas com php composer-update, pois foi utilizada a biblioteca "illuminate/html" para criação dos forms e a pasta vendor foi colocada no gitignore para facilitar o download.
1. Iniciar o php artisan serve para que o projeto funcione sem erros.