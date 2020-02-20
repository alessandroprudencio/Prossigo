#  Prossigo

Página com formulário para entrar em contato e listagem de contatos realizados, utilizando o framework Vuejs para a construção de interfaces de usuário e Laravel no backend

## Começando

Essas instruções fornecerão uma cópia do projeto em execução na sua máquina local para fins de desenvolvimento e teste. Caso venha ocorrer erros na implantação estarei a disposição para auxiliar.

### Requisitos

```
php": ^7.2
laravel: ^6.2
composer: ^1.9.3
```


### Instalação


Clonar o repositório
```
https://github.com/alessandroprudencio/Teste-Prossigo.git
```


Certifique-se que sua  serviço do MySQL  esteja iniciado e a conexão local com o banco de dados esteja funcionando.

Crie o seu banco de dados com o nome que desejar e lembre se das crendenciais, pois serão solicitadas...


** Instalação Automatizada **

Dentro do projeto existe um arquivo .sh, abra o projeto em algum Bash e na raiz execute o comando :
```
\.sh
```
Ao ser executado ira  verificar o php, laravel e composer instalados em sua maquina, em seguida sera preciso configurar o projeto para ser executado, mas fique tranquilo! os campos irão aparecer na tela, ** cuidado com os caracteres especiais ** pois esse arquivo sera usado para que tudo funcione corretamente, mas caso ocorra algum problema voce mesmo podera ver e editar um arquivo co nome de ** .env ** .Se tudo ocorrer bem, script ira executar a criação das tabelas no banco de dados...Logo em seguida vem os testes, caso ocorra algum teste não passe  o serviço é interrompido, se todos os testes retornarem valídos a aplicaçaõ será iniciada e pronto para uso...



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

Para criar o link simbólico, você pode usar o comando :

```
php artisan storage:link
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

