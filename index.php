<?php
// Inclusion du fichier entete.php qui contient probablement des éléments d'en-tête de votre site (comme le doctype, l'ouverture de la balise html, head, etc.)
require_once __DIR__ . '/includes/entete.php';

// Inclusion du fichier routing.php qui contient la configuration de routage de votre application
require 'config/routing.php';

// Récupération de l'URI de la requête actuelle
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Récupération de la page demandée à partir de la requête GET, ou définition de 'home' comme page par défaut
$page = $_GET['page'] ?? 'home';

// Si l'URI est "/", alors aucune action n'est entreprise
if($uri == "/"){
}
// Si la page demandée n'existe pas dans le tableau de routage, alors la page d'erreur 404 est chargée
elseif (!array_key_exists($page, $pagesMenu)) {
    require 'add/erreur404.php';
    exit;
}
// Sinon, la page demandée est chargée
else {
    require $filesDirecrory . $pagesMenu[$page];
}
?>

<h1 class="smallTitreRow orange thick"> ici c'est la page d'accueil</h1>
<h3 class="smallTitreRow orange thick"> Voici un petit code PHP</h3>

<p>Ce code permet de démarrer un projet rapidement, avec la gestion des URL, l'envoi des mails et toutes les fonctionnalités qui'il faut pour démmarrer une petit projet PHP<br>

</p>

<?php
// Utilisation de la fonction spl_autoload_register pour charger automatiquement les classes à partir du dossier src (sans sous dosssiers)
spl_autoload_register(function ($name) {
    require_once 'src/' . $name . '.php';
});

// Création d'une nouvelle instance de la classe App avec '/index' comme argument
$app = new App('/index');

?>
<div class="rowSlim"></div>

<?php
// Inclusion du fichier footer.php qui contient probablement le pied de page de votre site
require_once __DIR__ . '/includes/footer.php';
?>
