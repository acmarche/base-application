Configuration de la base de données
=========

Si vous voulez changer les paramètres vous pouvez le faire en éditant le fichier

```yaml
# app/config/parameters.yml
parameters:
    database_driver: pdo_mysql
    database_host: 127.0.0.1
    database_port: null
    database_name: travaux
    database_user: root
    database_password: mdp
    mailer_transport: smtp
    mailer_host: 127.0.0.1
    mailer_user: null
    mailer_password: null
    secret: changeit
```
Vous pouvez choisir d'autres bases de données comme SQLite, Postgresql,...

Voici des exemples pour des bases de données autre que mysql

### Exemple SQLite

 ```yaml
# app/config/parameters.yml
parameters:
    database_driver: pdo_sqlite
    path: '%kernel.root_dir%/sqlite.db'
```

### Exemple Postgresql

 ```yaml
# app/config/parameters.yml
parameters:
    database_driver: pdo_pgsql
```