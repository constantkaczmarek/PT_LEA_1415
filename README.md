LEA : Livret Electronique de suivi pédagogique de stages et d'alternances 2014-2015
========================

Bienvenue sur notre projet technique de frameworkisation du livret electronique de suivi de stage et d'alternance.

Ce document contient des informations sur comment installer symfony et commencer à utiliser notre projet. Pour une explication plus détaillée, veuillez vous référer au chapitre [Installation][1] de la documentation Symfony.

Ce document contient des informations sur comment télécharger, installer et continuer notre projet sur symfony.

1) Installer le projet
----------------------------------

Pour installer le projet, la solution que nous préconisons est d'utiliser composer.

### Utiliser Composer (*recommandé*)

Comme Symfony utilise [Composer][2] pour gérer ses dépendances, il est vivement recommandé de l'utiliser pour installer le projet.

Si vous n'avez pas encore composer, utilisez les commandes suivantes pour l'installer sur votre machine Linux ou mac:

    curl -s http://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer

Composer va installer Symfony et toutes ses dépendances dans le dossier `path/to/install`, en utilisant à la racine du projet, la commande :

    composer install
    
A la fin de l'installation, il vous sera demandé de configurer votre accès à la base de donnée. Les configurations de base qui vous sont proposées entre parenthèses sont les notres. Si les autres sont identiques, vous n'avez qu'à appuyer sur la touche entrée, sinon vous pouvez les adapter à votre propre machine.

2) Tester le projet
-------------------------------------

Pour lancer, et donc tester le projet, vous pouvez vous rendre sur la page suivante :

    http://localhost:8888/PT_LEA_1415_master/app_dev

Vous serez redirigé automatiquement vers la page d'accueil selon le rôle attribué. Le rôle par défaut est "bilasco". Vous pouvez modifié le rôle dans le bundle RoleBundle, dans le RedirectionController à la ligne : 

    $session->set('CK_USER','bilasco');

Quelques exemples de rôle sont disponibles au dessus de celle-ci.

Pour plus d'informations ou en cas de problèmes, veuillez nous contacter à alan.flament@gmail.com/constantkaczmarek@gmail.com

Enjoy!

[1]:  http://symfony.com/doc/2.5/book/installation.html
[2]:  http://getcomposer.org/
