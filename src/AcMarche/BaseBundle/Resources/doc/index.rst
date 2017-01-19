Gestion patrimoniale des cimetières
=========

Installation

### [Installation](https://github.com/acmarche/baseappli/src/AcMarche/BaseBundle/Resources/doc/Resources/doc/index.rst)

### Téléchargement de la structure de base

Placez vous à la racine de votre serveur web.
Si vous avez git, exécuter la commande :

```shell
git clone https://github.com/acmarche/baseappli.git
```

cela va vous créer un répertoire nommer baseappli

ou télécharger directement le zip

https://github.com/acmarche/baseappli/archive/master.zip

Et décompressez le sur votre serveur

Vous pouvez renommer le dossier en ce que vous voulez, pour l'exemple renommons le en "sepulture"

### Installation des dépendances

L'appli utilise différents modules, on va les installer grâce à l'outile "composer"

Composer est un gestionnaire de packages [https://getcomposer.org/](https://getcomposer.org/)

Si vous n'avez pas composer sur votre serveur, pas de panique, il s'agit d'un simple exécutable à télécharger et à copier sur votre serveur.

[Voici comment installer composer](https://github.com/acmarche/baseappli/wiki/Composer)

Maintenant que vous avec "composer", il vous suffit de vous placer dans le répertoire de votre installation et d'exécuter la commande

```shell
cd sepulture
composer update
```

A la fin du téléchargement des modules, vous pourrez donner les informations nécessaires pour à la connection de votre serveur de base de données


### Module d'authentification et de sécurité



```shell
composer require friendsofsymfony/user-bundle "~2.0@dev"
composer require acmarche/acsecurity:dev-master
```shell