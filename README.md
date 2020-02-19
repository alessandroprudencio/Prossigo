# Teste Prossigo

Página com formulário para entrar em contato e listagem de contatos realizados.

## Começando

Essas instruções fornecerão uma cópia do projeto em execução na sua máquina local para fins de desenvolvimento e teste. Caso venha ocorrer erros na implantação estarei a disposição para auxiliar.

### Requisitos

```
php": ^7.2
laravel: ^6.2
composer: ^1.9.3
```

### Instalação Automatizada

Dentro do projeto existe um arquivo .sh, abra a raiz execute o comando :
```
\.sh
```
Ao ser executado ira  verificar o php, laravel e composer instalado e sua maquina, em seguida solicitar para configurar o projeto para ser executado ** cuidado com os caracteres especiais ** pois esse arquivo sera usado para que tudo funcione corretamente, mas claro ocorra algum problema voce mesmo poder editar seu arquivo .env .Se tudo ocorrer bem, sera criado um arquivo ** .env **  no diretorio do projeto...Agora o script ira executar a criação das tabelas no banco de dados...Logo em seguida vem os testes, caso ocorra falha o serviço é interrompido, se não houver ele continuara e será iniciado o servidor para uso...  **


### Instalação


Clonar o repositório
```
https://github.com/alessandroprudencio/Teste-Prossigo.git
```


Para instalar as dependências , execute o comando na raiz do projeto : 

```
composer install
```

Copie o arquivo env de exemplo e faça as alterações necessárias na configuração no arquivo .env

```
cp .env.example .env
```

Gere uma nova chave de aplicativo :

```
php artisan key:generate
```


Execute as migrações do banco de dados **( defina a conexão com o banco de dados em .env antes de migrar )** :

```
php artisan migrate
``` 

Iniciando  servidor :

```
php artisan serve ou php artisan serve --port=8080
```

Agora você pode acessar o servidor em http://localhost:8000


## Executando os testes

Para executar os testes basta abrir a raiz do projeto e executar o comando :
```
vendor/bin/phpunit
```

## Semear banco de dados

Execute o comando para semear o banco de dados :

```
php artisan db:seed
```


## Contato

* **Alessandro Prudencio** 
* **alessandroconectado@gmail.com** 
* **(67) 99269-6705** 

