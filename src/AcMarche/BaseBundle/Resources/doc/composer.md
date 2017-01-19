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
bin/composer
```

Toutes les fonctions de gestion s'offre à vous (recherche, installation, mise à jour...)

### Astuce

Composer peut vous servir dans d'autres projets php, 
pour que cette commande soit disponible de n'importe où dans votre shell,
déplacer celui-ci dans votre dossier des éxécutables 

Par exemple sous linux dans : /usr/bin/
 
### Remarques

**L'option --filename=composer**

a permis de renommer le fichier qui à l'origine s'appele composer.phar en composer

**Et l'option --install-dir=bin**

a placé l'exécutable dans le dossier bin/composer

