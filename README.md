# Teste Prossigo

Página com formulário para entrar em contato e listagem de contatos realizados.

## Começando

Essas instruções fornecerão uma cópia do projeto em execução na sua máquina local para fins de desenvolvimento e teste. Caso venha ocorrer erros na implantação estarei a disposição para auxiliar.

### Requisitos

```
php": ^7.2
laravel/framework: ^6.2
composer: ^1.9.3
```

### Instalação


Clonar o repositório
```
https://github.com/alessandroprudencio/Teste-Prossigo.git
```


Para instalar as dependências , execute o comando na raiz do projeto

```
composer install
```

Copie o arquivo env de exemplo e faça as alterações necessárias na configuração no arquivo .env

```
cp .env.example .env
```

Gere uma nova chave de aplicativo

```
php artisan key:generate
```


Execute as migrações do banco de dados **( defina a conexão com o banco de dados em .env antes de migrar )**

```
php artisan migrate
``` 

Iniciando  servidor

```
php artisan serve ou php artisan serve --port=8080
```

Agora você pode acessar o servidor em http://localhost:8000


## Executando os testes

Para executar os testes basta abrir a raiz do projeto e executar o comando
```
vendor/bin/phpunit
```

## Seeders

Execute o comando para semear o banco de dados

```
php artisan db:seed
```


## Contato

* **Alessandro Prudencio** 
* **alessandroconectado@gmail.com** 
* **(67) 99269-6705** 

