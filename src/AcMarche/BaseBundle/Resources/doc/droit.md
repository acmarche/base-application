Permission d'écritures des dossiers
=========

Le serveur web doit avoir accès en écriture aux dossiers

```shell  
var/cache
var/log
```

Voici un exemple sous linux

```shell  
sudo setfacl -R -m u:"www-data":rwX -m u:`whoami`:rwX var
sudo setfacl -dR -m u:"www-data":rwX -m u:`whoami`:rwX var
```

[Pour plus d'informations et la méthode pour MAC](http://symfony.com/doc/current/setup/file_permissions.html)
