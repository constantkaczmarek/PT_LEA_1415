PT_LEA_1415
========================

Welcome to the Symfony Standard Edition - a fully-functional Symfony2
application that you can use as the skeleton for your new applications.

Bienvenue sur notre projet technique de frameworkisation du livret electronique de suivi de stage et d'alternance.

Ce document contient des informations sur comment installer symfony et commencer à utiliser notre projet. Pour une explication plus détaillée, veuillez vous référer au chapitre [Installation][1] de la documentation Symfony.

Ce document contient des informations sur comment télécharger, installer et continuer notre projet sur symfony.

1) Installer le projet
----------------------------------

Pour installer le projet, la solution que nous préconisons est d'utiliser composer.

### Utiliser Composer (*recommended*)

Comme Symfony utilise [Composer][2] pour gérer ses dépendances, il est vivement recommandé de l'utiliser pour installer le projet.

Si vous n'avez pas encore composer, utilisez les commandes suivantes pour l'installer sur votre machine Linux ou mac:

    curl -s http://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer

Composer va installer Symfony et toutes ses dépendances dans le dossier `path/to/install`.


2) Checking your System Configuration
-------------------------------------

Before starting coding, make sure that your local system is properly
configured for Symfony.

Execute the `check.php` script from the command line:

    php app/check.php

The script returns a status code of `0` if all mandatory requirements are met,
`1` otherwise.

Access the `config.php` script from a browser:

    http://localhost/path-to-project/web/config.php

If you get any warnings or recommendations, fix them before moving on.

3) Browsing the Demo Application
--------------------------------

Congratulations! You're now ready to use Symfony.

From the `config.php` page, click the "Bypass configuration and go to the
Welcome page" link to load up your first Symfony page.

You can also use a web-based configurator by clicking on the "Configure your
Symfony Application online" link of the `config.php` page.

To see a real-live Symfony page in action, access the following page:

    web/app_dev.php/demo/hello/Fabien

4) Getting started with Symfony
-------------------------------

This distribution is meant to be the starting point for your Symfony
applications, but it also contains some sample code that you can learn from
and play with.

A great way to start learning Symfony is via the [Quick Tour][4], which will
take you through all the basic features of Symfony2.

Once you're feeling good, you can move onto reading the official
[Symfony2 book][5].

A default bundle, `AcmeDemoBundle`, shows you Symfony2 in action. After
playing with it, you can remove it by following these steps:

  * delete the `src/Acme` directory;

  * remove the routing entry referencing AcmeDemoBundle in `app/config/routing_dev.yml`;

  * remove the AcmeDemoBundle from the registered bundles in `app/AppKernel.php`;

  * remove the `web/bundles/acmedemo` directory;

  * empty the `security.yml` file or tweak the security configuration to fit
    your needs.

What's inside?
---------------

The Symfony Standard Edition is configured with the following defaults:

  * Twig is the only configured template engine;

  * Doctrine ORM/DBAL is configured;

  * Swiftmailer is configured;

  * Annotations for everything are enabled.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * [**AsseticBundle**][12] - Adds support for Assetic, an asset processing
    library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

  * **AcmeDemoBundle** (in dev/test env) - A demo bundle with some example
    code

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

[1]:  http://symfony.com/doc/2.5/book/installation.html
[2]:  http://getcomposer.org/
[3]:  http://symfony.com/download
[4]:  http://symfony.com/doc/2.5/quick_tour/the_big_picture.html
[5]:  http://symfony.com/doc/2.5/index.html
[6]:  http://symfony.com/doc/2.5/bundles/SensioFrameworkExtraBundle/index.html
[7]:  http://symfony.com/doc/2.5/book/doctrine.html
[8]:  http://symfony.com/doc/2.5/book/templating.html
[9]:  http://symfony.com/doc/2.5/book/security.html
[10]: http://symfony.com/doc/2.5/cookbook/email.html
[11]: http://symfony.com/doc/2.5/cookbook/logging/monolog.html
[12]: http://symfony.com/doc/2.5/cookbook/assetic/asset_management.html
[13]: http://symfony.com/doc/2.5/bundles/SensioGeneratorBundle/index.html
