#!/bin/bash

PHPVersion=$(php -r 'echo PHP_MAJOR_VERSION;')
InstalledComposer=$(composer --version | grep --only-matching --perl-regexp "()\d+\.\\d+\.\\d+")
InstalledLaravel=$(laravel -v | grep --only-matching --perl-regexp "()\d+\.\\d+\.\\d+")

RecommendedComposer='1.9.3'
RecommendedLaravel='3.0.1'

RED="\033[1;31m"
GREEN="\033[1;32m"
NOCOLOR="\033[0m"

if [ "$PHPVersion" -le "6" ]; then
    echo -e "${RED} Por favor atualize seu php e tente novamente!"
    exit
fi

if [ ! which -a "composer" ]; then
    echo -e " ${RED} Por favor instale o composer e tente novamente !"
    exit
fi

if [ "yes" = "$(echo | awk "($InstalledComposer < $RecommendedComposer) { print \"yes\"; }")" ]; then
    echo -e "${RED} Por favor atualize seu composer e tente novamente!"
    exit
fi

if [ ! which -a "laravel" ]; then
    echo -e "${RED} Por favor instale o laravel e tente novamente !"
    exit
fi

if [ "yes" = "$(echo | awk "($InstalledLaravel < $RecommendedLaravel) { print \"yes\"; }")" ]; then
    echo -e "${RED} Por favor atualize seu Laravel e tente novamente !"
    exit
fi

echo Ola, vamos configurar esta aplicação, vamos começar pelo banco de dados...

echo 'DB_DATABASE ( nome do banco )' ?
read DbDatabase

echo DB_USERNAME '( usuário adm do banco )' ?
read DbUsername

echo DB_PASSWORD '( senha adm do banco )' ?
read DbPassword

echo MAIL_DRIVER '( ex: smtp )' ?
read MailDriver

echo MAIL_HOST '( ex: smtp.gmail.com )' ?
read MailHost

echo MAIL_PORT '( ex: 587 )' ?
read MailPort

echo MAIL_USERNAME '( ex: teste@gmail.com )' ?
read MailUsername

echo MAIL_ENCRYPTION '( gmail use tls )' ?
read MailEncryption

echo MAIL_PASSWORD '( ex: seua_senha@2 )' ?
read MailPassword

echo MAIL_RECEIVES_MESSAGE '(  Após do prenchimento do formulário para qual email sera enviados os dados submetidos ? )'
read MailReceivesMessage

echo "APP_NAME='Alessadro - Teste Prossigo'
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=$DbDatabase
DB_USERNAME=$DbUsername
DB_PASSWORD=$DbPassword

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_DRIVER=$MailDriver
MAIL_HOST=$MailHost
MAIL_PORT=$MailPort
MAIL_USERNAME=$MailUsername
MAIL_PASSWORD=$MailPassword
MAIL_ENCRYPTION=$MailEncryption
MAIL_RECEIVES_MESSAGE=$MailReceivesMessage
MAIL_FROM_NAME='Alessadro - Teste Prossigo'
" > test.env

php artisan migrate:refresh

php artisan key:generate

php artisan storage:link

echo iniciando testes...

test= vendor/bin/phpunit

i=$(echo $?)
if [[ $i != 0 ]]; then
    echo -e " ${RED} Erro, os testes falharam."
    exit
fi

php artisan serve
