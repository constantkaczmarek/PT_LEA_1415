LEA : Livret Electronique de suivi pédagogique de stages et d'alternances 2014-2015
========================

Bienvenue sur notre projet technique de frameworkisation du livret électronique de suivi pédagogique de stage et d'alternance.

Ce document contient des informations sur la marche à suivre pour installer Symfony2 et commencer à utiliser notre projet. Pour une explication plus détaillée, veuillez vous référer au chapitre [Installation][1] de la documentation Symfony.

Ce document contient des informations sur la façon de télécharger, installer et continuer notre projet sur Symfony.

1) Installer le projet
----------------------------------

Pour installer le projet, la solution que nous préconisons est d'utiliser composer.

### Utiliser Composer (*recommandé*)

Comme Symfony utilise [Composer][2] pour gérer ses dépendances, il est vivement recommandé de l'utiliser pour installer le projet.

Si vous n'avez pas encore composer, utilisez les commandes suivantes pour l'installer sur votre machine Linux ou OSX:

    curl -s http://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer

Une fois que Composer est installé, rendez vous à la racine du projet, et exécutez la commande :

    composer install
    
Suite à cette commande, l'installation de Symfony et des dépendances requises démarrera.

A la fin de l'installation, il vous sera demandé de configurer votre accès à la base de données. Les configurations de base qui vous sont proposées entre parenthèses sont celles que nous avons utilisé. Si les autres sont identiques, vous n'avez qu'à appuyer sur la touche entrée, sinon vous pouvez les adapter à votre propre machine.

2) Tester le projet
-------------------------------------

Pour lancer, et donc tester le projet, vous pouvez vous rendre sur la page suivante :

    http://localhost:8888/PT_LEA_1415_master/app_dev

Vous serez redirigé automatiquement vers la page d'accueil selon le rôle attribué. Le rôle par défaut est celui de responsable, lié à l'utilisateur "bilasco". Vous pouvez modifier l'utilisateur courant (et donc le rôle) dans le bundle RoleBundle, en vous rendant dans le contrôleur RedirectionController, de la ligne 16 à la ligne 19, 4 types de compte sont disponibles, tel que: 

    $session->set('CK_USER','bilasco');

Vous pouvez décommenter celui que vous désirez tester:

    -m1infofi1AE16 : compte étudiant
    -marvie: compte professeur
    -marquet: compte responsable
    -bilasco: compte "dieu"

Pour plus d'informations ou en cas de problèmes, veuillez nous contacter à 

    alan.flament@gmail.com
    constantkaczmarek@gmail.com

Enjoy!

[1]:  http://symfony.com/doc/2.5/book/installation.html
[2]:  http://getcomposer.org/
