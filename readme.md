## Times teste

 A aplicação foi desenvolvida usando laravel 6.4 o que permite o uso de PHP 7.2>=

 Ferramentas de terceiros usadas:
 guzzlehttp/guzzle - para permitir o envio de email.
 jeroennoten/laravel-adminlte - para os layouts web.


## Instalar a aplicação

* Clone o [GitHub repository](https://github.com/imrgrgs/times/) : *git clone https://github.com/imrgrgs/times.git*
* Ou download o [zip file](https://github.com/imrgrgs/times/archive/master.zip)

* Copie o arquivo .env.example para .env .
* Crie o database
* No arquivo .env altere as diretivas


```
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_password
```

* Para usar o envio de email para recuperação de senhas ou envio de email para erros do sistema,
altere no arquivo .env as diretivas

```
MAIL_DRIVER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=${APP_NAME}

```


Então instale, migrate, seed, todo o conjunto:

1. `composer install`
2. `php artisan migrate`
3. `php artisan db:seed` - irá carregar a lista de estados e cidades
4. `php artisan serve`
5. `de acesso 775 para os diretórios`
6. `mude o dono e o grupo dos diretórios para que o apache possa executar`


A aplicação irá executar em `localhost:8000`.

Após o seed, existirá apenas a lista de estados e cidades.

Ao abrir a aplicação mostra uma tela de entrada, nessa tela pode-se escolher Login ou Registrar, canto superior direito.
Você deve registrar um usuário para poder iniciar.
Em Registrar é possível cadastrar novos usuários.

Ao logar-se, apresentará atela com as opções Gerenciar Times, Gerenciar Jogadores, a partir dessas opções
pode-se criar e manter times e jogadores, editar e/ou excluir.




