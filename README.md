## API de gerenciamento de projetos

## Configuração

Antes de começar, verifique se seu sistema atende aos requisitos mínimos do Laravel 11:

* PHP >= 8.3
* Composer
* Algumas extensões do PHP serão necessárias como PDO, OpenSSL, Mbstring, JSON, BCMath, Ctype, Fileinfo, Tokenizer, Mysql etc

### Passo 1: Clone o projeto no github e acesse a pasta raiz.
### Passo 2: Execute o comando _composer install_
### Passo 3: Faça uma cópia do .env.exemple para preencher os parâmetros necessários para a aplicação, use o comando _cp .env.example .env_
### Passo 4: Gere a chave do aplicativo com o comando _php artisan key:generate_
### Passo 5: Configure as credenciais do banco de dados no .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

### Passo 6: Faça a migração das tabelas com o comando _php artisan migrate_
OBS: Para executar as seeders e gerar dados fake use o comando _php artisan db:seed_ que vai gerar 1000 linhas no banco de dados

### Passo 7: Execute o servidor com o comando _php artisan serve_
