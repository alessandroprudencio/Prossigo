# Teste Prossigo

Página com formulário para entrar em contato e  listagem de contatos realizados..

## Começando

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

```
php": "^7.2"
 "laravel/framework": "^6.2"
 Composer 
```

### Installing


Primeiro passo

Para instalar as dependências , execute o comando na raiz do projeto

```
composer install
```

Criar as tabelas no banco de dados 

```
php artisan migrate
```


Estartando nosso servidor

```
php artisan serve ou php artisan serve --port=8080
```


## Executando os testes

Para executar os teste basta abrir a raiz do projeto e executar 
```
vendor/bin/phpunit
```


## Authors

* **Alessandro Prudencio** 

