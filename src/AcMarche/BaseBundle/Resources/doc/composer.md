Installation de composer
=========

Composer est un gestionnaire de dépendances en PHP

Une fois cet outil sur votre serveur vous pourrez télécharger et installer un grand nombre d'applications.

C'est un simple exécutable, l'installation prend 2 minutes

### Téléchargement et installation

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
