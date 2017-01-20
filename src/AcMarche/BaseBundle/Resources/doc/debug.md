Résoudre les problèmes d'installation
=========

Si vous rencontrez des soucis lors de l'installation, voici différentes manières pour trouver le problème

## Vérifier que vous avez les prérequis serveur nécessaires

### Via le navigateur web

Vous pouvez les visualiser à l'adresse config.php

Exemple : http://www.monsite.be/config.php

Attention, cette page n'est évidemment pas accessible tout de suite car elle est protégée par défaut

Il faut commenter les deux lignes (header et exit)

```php
//web/config.php
if (!in_array(@$_SERVER['REMOTE_ADDR'], array(
    '127.0.0.1',
    '::1',
))) {
  //  header('HTTP/1.0 403 Forbidden');
  //  exit('This script is only accessible from localhost.');
}
```

**N'oubliez surtout pas de les décommenter quand vous passerez en production !**

### Via le mode console

Placer vous dans votre répertoire d'installation et exécuter la commande

```
php bin/symfony_requirements
```

## Parcourir l'application en mode débug

Ce mode va afficher tous les messages d'erreurs éventuels 

Vous devez accéder à votre installation via cette url http://www.monsite.be/app_dev.php

Cette page est aussi protégée, commentez les deux lignes header et exit

```php
//web/app_dev.php
if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !(in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']) || php_sapi_name() === 'cli-server')
) {
 //   header('HTTP/1.0 403 Forbidden');
 //   exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}
```

**A décommenter en production !**

