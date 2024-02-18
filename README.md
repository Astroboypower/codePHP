# Nom du Projet

## Description

Ce projet est une base simple pour ceux qui souhaitent démarrer avec un projet PHP. Il offre une architecture pour organiser le code et le maintenir simplement.

## Structure du Projet

Le projet a la structure suivante :

- `add/`: Contient des fichiers PHP pour différentes fonctionnalités comme la gestion de la base de données (`bdd.php`), la gestion des dates (`dates.php`), etc.
- `includes/`: Contient des fichiers PHP pour l'entête (`entete.php`), le pied de page (`footer.php`), et le menu (`menu.php`).
- `public/`: Contient les ressources publiques comme les fichiers CSS, les polices, les images, et les scripts JS.
- `src/`: Contient le fichier `App.php`.

## Comment démarrer

1. Clonez ce dépôt.
2. Naviguez vers le dossier du projet.
3. Lancez votre serveur PHP local.
4. Ouvrez votre navigateur et naviguez vers `localhost`.

## Licence

Ce code est sous Copyright © 2024 JMC. Il est libre d'utilisation et de modification. Aucune garantie n'est fournie avec ce code.


Voici l'architecture du projet

|   favicon.ico
|   index.php
----add
|       bdd.php
|       contact.php
|       dates.php
|       erreur.php
|       failles.php
|       home.php
|       infoServer.php
|       superGlobales.php
|       tableaux.php
|       
----includes
|       entete.php
|       footer.php
|       menu.php
|       
|---public
|   |---css
|   |       font-awesome.css
|   |       font-awesome.min.css
|   |       footer.css
|   |       icones.css
|   |       menu.css
|   |       style.css
|   |       
|   |---fonts
|   |       fontawesome-webfont.eot
|   |       fontawesome-webfont.svg
|   |       fontawesome-webfont.ttf
|   |       fontawesome-webfont.woff
|   |       fontawesome-webfont.woff2
|   |       FontAwesome.otf
|   |       icomoon.eot
|   |       icomoon.svg
|   |       icomoon.ttf
|   |       icomoon.woff
|   |       
|   |---images
|   |       entete.png
|   |       
|   |---js
|           menu.js
|           
|---src
        App.php
        
Le point d'entrée de l'application est le fichier `index.php`. Ce fichier fait appel à trois autres fichiers qui se trouvent dans le répertoire `includes` :
1.	`entete.php` : Ce fichier contient l'en-tête de votre site web, y compris le menu.
2.	`menu.php` : Ce fichier définit le menu de votre site web. Il est inclus dans `entete.php`.
3.	`footer.php` : Ce fichier contient le pied de page de votre site web.

Chaque fichier dans le dossier `add` représente une page spécifique de votre site web. Ces fichiers utilisent un système de templating simple : ils incluent l'en-tête et le pied de page au début et à la fin de chaque fichier, respectivement. Cela signifie que chaque page de votre site web aura le même en-tête (y compris le menu) et le même pied de page.


- Le fichier `index.php` est le point d'entrée de l'application. Voici ce que fait chaque partie :
1.	`require_once __DIR__.'/includes/entete.php';` : Cette ligne inclut le fichier `entete.php` qui contient probablement des éléments d'en-tête de votre site.
2.	`spl_autoload_register(function ($name) { require_once 'src/' . $name . '.php'; });` : Cette ligne utilise la fonction `spl_autoload_register` pour charger automatiquement les classes à partir du dossier `src`.
3.	`$app = new App('/index');` : Cette ligne crée une nouvelle instance de la classe `App` avec '/index' comme argument.
4.	`var_dump($app->render());` : Cette ligne appelle la méthode `render` de l'objet `$app` et affiche le résultat.
5.	`require_once __DIR__.'/includes/footer.php';` : Cette ligne inclut le fichier `footer.php` qui contient probablement le pied de page de votre site.

- Le fichier `index.php` est le point d'entrée de l'application. Voici ce que fait chaque partie :
1.	`require_once __DIR__.'/includes/entete.php';` : Cette ligne inclut le fichier `entete.php` qui contient probablement des éléments d'en-tête de votre site.
2.	`$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);` : Cette ligne récupère l'URI de la requête actuelle.
3.	`$page = $_GET['page'] ?? 'home';` : Cette ligne récupère la page demandée à partir de la requête GET, ou définit 'home' comme page par défaut.
4.	`if($uri == "/"){...}` : Cette condition vérifie si l'URI est "/", auquel cas aucune action n'est entreprise.
5.	`elseif (!array_key_exists($page, $pagesMenu)) {...}` : Cette condition vérifie si la page demandée n'existe pas dans le tableau de routage, auquel cas la page d'erreur 404 est chargée.
6.	`else {...}` : Si aucune des conditions précédentes n'est remplie, la page demandée est chargée.
7.	`spl_autoload_register(function ($name) { require_once 'src/' . $name . '.php'; });` : Cette ligne utilise la fonction `spl_autoload_register` pour charger automatiquement les classes à partir du dossier `src`.
8.	`$app = new App('/index');` : Cette ligne crée une nouvelle instance de la classe `App` avec '/index' comme argument.
9.	`var_dump($app->render());` : Cette ligne appelle la méthode `render` de l'objet `$app` et affiche le résultat.
10.	`require_once __DIR__.'/includes/footer.php';` : Cette ligne inclut le fichier `footer.php` qui contient probablement le pied de page de votre site.

- Fichier footer.php
Le fichier `footer.php` contient le pied de page de votre site web. Voici ce que fait chaque partie :
1.	`<a href="https://www.linkedin.com/" class="fa faFoot fa-linkedin tooltip" target="_blank"><span class="tooltiptext">LinkedIn</span></a>` : Cette ligne crée un lien vers votre profil LinkedIn.
2.	`<a href="https://twitter.com/" class="fa faFoot fa-twitter tooltip"><span class="tooltiptext" target="_blank">Twitter</span></a>` : Cette ligne crée un lien vers votre profil Twitter.
3.	`Copyright © 2018 JMC | Ce code est libre d'utilisation et de modification` : Cette ligne affiche les droits d'auteur.
4.	`<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-WCVlhqqhFtKgsxTmUZm8Tz0WZQhX-7o&callback=initMap" async defer></script>` : Cette ligne inclut le script JavaScript de Google Maps.
5.	`<script src="<?php echo $jsMenu;?>" type="text/javascript"></script>` : Cette ligne inclut un script JavaScript pour le menu.
6.	`<script src="<?php echo $jsMaps;?>" type="text/javascript"></script>` : Cette ligne inclut un script JavaScript pour les cartes.

- Fichier menu.php
Le fichier `menu.php` contient le menu de votre site web. Voici ce que fait chaque partie :
1.	`$pagesMenu = array(...);` : Cette ligne définit un tableau associatif pour les pages du menu.
2.	`foreach ($pagesMenu as $titre => $page){...}` : Cette boucle crée un lien pour chaque page dans le menu.
3.	`<div class="dropdownMenu floatRight">...</div>` : Ce bloc de code crée un menu déroulant pour les appareils mobiles. Il contient un bouton pour afficher le menu déroulant et une boucle pour créer un lien pour chaque page dans le menu déroulant.

Le routage est un mécanisme qui permet de diriger les requêtes HTTP vers le bon code de votre application. Dans cette application, on utilise un système de routage simple basé sur un tableau associatif en PHP.
Voici comment cela fonctionne :

1.	Définition des routes : Dans votre fichier config/routing.php, on définis un tableau associatif $pagesMenu. Chaque clé du tableau représente le nom d’une page tel qu’il apparaît dans le menu, et chaque valeur correspond à l’URL de cette page.
$pagesMenu = array(
    'info PHP' => 'infoServer.php',
    'Dates' => 'dates.php',
    'Les tableaux' => 'tableaux.php',
    'La Base de données' => 'bdd.php',
    'Les Super Globales' => 'superGlobales.php',
    'Failles' => 'failles.php',
    'Contact' => 'contact.php'
);

2.	Récupération de la page demandée : Dans le fichier index.php, on récupére la page demandée à partir de la requête GET.
$page = $_GET['page'] ?? 'home';

3.	Chargement de la page demandée : Toujours dans index.php, on vérifie si la page demandée existe dans le tableau $pagesMenu. Si c’est le cas, on charge la page correspondante. Sinon, on charge la page d’erreur 404.
if ($page == 'home') {
    var_dump($page);
} elseif (array_key_exists($page, $pagesMenu)) {
    require $filesDirecrory . $pagesMenu[$page];
} else {
    require 'add/erreur404.php';
    exit;
}

1.	$today = date("l d/m/Y"); : récupère la date actuelle au format “jour mois/année”.
2.	$heure = date("H:i:s"); : récupère l’heure actuelle au format “heures:minutes:secondes”.
3.	$todayDay = (int) date ("d"); : récupère le jour actuel sous forme d’entier.
4.	$thisYear = (int) date ("Y"); : récupère l’année actuelle sous forme d’entier.
5.	$thisMonth = (int) date("m"); : récupère le mois actuel sous forme d’entier.
6.	$lastMonthMonth = (int) date("m")+1; : calcule le mois suivant en ajoutant 1 au mois actuel.
7.	$nowHour = date("H"); : récupère l’heure actuelle.
8.	$d=mktime(11, 14, 54, 8, 12, 2014); : crée une date Unix pour le 12 août 2014 à 11:14:54.
9.	$tomorrow = mktime(0, 0, 0, $thisMonth , $todayDay+1, $thisYear); : crée une date Unix pour le jour suivant.
10.	$lastmonth = mktime(0, 0, 0, $lastMonthMonth , $todayDay+1, $thisYear); : crée une date Unix pour le même jour du mois prochain.
11.	$nextyear = mktime(0, 0, 0, $thisMonth , $todayDay, $thisYear+1); : crée une date Unix pour le même jour de l’année prochaine.
12.	$birth = new DateTime('1979-07-19'); : crée un objet DateTime pour la date de naissance.
13.	$interval = $birth->diff($today); : calcule la différence entre la date de naissance et la date actuelle.
14.	$years = $interval->format('%y'); : extrait le nombre d’années de l’intervalle.
15.	$months = $interval->format('%m'); : extrait le nombre de mois de l’intervalle.
16.	$days = $interval->format('%d'); : extrait le nombre de jours de l’intervalle.
