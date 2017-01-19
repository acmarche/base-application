Composer un outil de gestionnaire de packages php, un peu comme un google play, app store, apt...

Une fois cet outil sur votre serveur vous pourrez télécharger et installer un grand nombre d'applications.

Vous allez voir c'est très simple cette étape prend 2 minutes

### On télécharge le binaire

```shell
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php --install-dir=bin --filename=composer
```

Voila c'est fait, maintenant vous pouvez exécuter la commande

```shell
composer
```

Toutes les fonctions de gestion s'offre à vous (recherche, installation, mise à jour...)

### Remarques

**L'option --filename=composer**

a permis de renommer le fichier qui à l'origine s'appele composer.phar en composer

**Et l'option --install-dir=bin**

a permis que cette commande vous soit disponible de n'importe où dans votre shell
