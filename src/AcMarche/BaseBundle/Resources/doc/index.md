Installation de la structure de base
=========

### Téléchargement de la structure de base

* Soit avec Git

Placez vous à la racine de votre serveur web, exécuter la commande :

```shell
git clone https://github.com/acmarche/baseappli.git
```

cela va vous créer un répertoire nommer baseappli.

* Soit en téléchargeant directement le zip

https://github.com/acmarche/baseappli/archive/master.zip

Et décompressez le sur votre serveur.

Vous pouvez renommer le dossier en ce que vous voulez, pour l'exemple renommons le en "moninstall"

### Installation des dépendances

L'appli utilise différents modules, on va les installer grâce à l'outil "composer"

Composer est un gestionnaire de packages [https://getcomposer.org/](https://getcomposer.org/)

Si vous n'avez pas composer sur votre serveur, pas de panique, il s'agit d'un simple exécutable à télécharger et à copier sur votre serveur.

[Voici comment installer composer](https://github.com/acmarche/baseappli/blob/master/src/AcMarche/BaseBundle/Resources/doc/composer.md)

Maintenant que vous disposez de "composer", il vous suffit de vous placer dans le répertoire de votre installation et d'exécuter la commande :

```shell
cd moninstall
composer update
```

A la fin du téléchargement des modules, vous pourrez donner les informations nécessaires à la connection de votre serveur de base de données.

Si vous désirez changer plus tard les paramètres de la base de données, [voici la méthode](https://github.com/acmarche/baseappli/blob/master/src/AcMarche/BaseBundle/Resources/doc/database.md)

### Module d'authentification et de sécurité

Ce module sert à gérer les droits des utilisateurs

```shell
composer require friendsofsymfony/user-bundle "~2.0@dev"
composer require acmarche/acsecurity:dev-master
```

Activer ces deux modules :

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new FOS\UserBundle\FOSUserBundle(),
        new AcMarche\AcSecurityBundle\AcSecurityBundle()        
    );
}
```

### Initialisation de la base de données

**Avant créer les tables n'oubliez pas de créer votre base de données en UTF8**

La commande suivante va créer les tables nécessaires.

```shell
php bin/console doctrine:schema:update --force
```

La commande suivante va créer le groupe admin et le compte admin.

```shell
php bin/console acsecurity:initdata
```

### Configuration de l'hôte sur votre serveur web

[Voici un exemple pour apache et ngingx](https://github.com/acmarche/baseappli/blob/master/src/AcMarche/BaseBundle/Resources/doc/apache.md)

### Test de votre installation

Accéder à votre application http://appli.domain.be

Vous pouvez commencer à créer des comptes utilisateurs

### En cas de soucis

[Voici comment faire si l'installation ne fonctionne pas](https://github.com/acmarche/baseappli/blob/master/src/AcMarche/BaseBundle/Resources/doc/apache.md)