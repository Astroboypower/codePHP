<!DOCTYPE html>
<?php
session_start();
//var_dump($_SESSION);
$theme = $_COOKIE['theme'] ?? 'dark'; // Utilisez le thème du cookie s'il existe, sinon utilisez 'dark' par défaut
$checked = $theme === 'light' ? 'checked' : ''; // Si le thème est 'light', le bouton doit être coché

$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

$home = 'http://codephp/';
$adresse = $home.'index.php?what=';
$filesDirecrory ='add/';
$imagesDirectory = 'C:/wamp64/www/codePhp/public/images/';

$ccsStyle = '/public/css/colors.css';
$ccsMain = '/public/css/main.css';
$ccsMenu = '/public/css/menu.css';
$ccsFooter = '/public/css/footer.css';
$ccsFADirectory = '/public/css/font-awesome.css';
$jsMenu = '/public/js/menu.js';
$jsThemes = '/public/js/theme.js';
?>

<html data-theme="<?php echo $theme; ?>">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tests de codes</title>
    <link href="<?php echo $ccsMain;?>" rel="stylesheet">
    <link href="<?php echo $ccsStyle;?>" rel="stylesheet">
    <link href="<?php echo $ccsMenu;?>" rel="stylesheet">
    <link href="<?php echo $ccsFooter;?>" rel="stylesheet">
    <link href="<?php echo $ccsFADirectory;?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

</head>

<!-- entete -->
<div id="accueil">
    <div class="relativeEntete">
        <img class="imgEnteteFond" src="/public/images/entete.png">
    </div>
</div>
<!-- fin entete -->


<!-- menu -->
<?php
include __DIR__.'/../includes/menu.php';
?>
<!-- fin menu -->

<label class="switch" style="position: absolute; top: 20px; right: 20px;"><!-- Bouton pour changer de thème -->
    <input type="checkbox" <?php echo $checked; ?>>
    <span class="slider round"></span>
</label>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // On récupère le bouton de basculement
        var toggleButton = document.querySelector('.switch input[type="checkbox"]');

        // On ajoute un écouteur d'événements au bouton de basculement
        toggleButton.addEventListener('change', function() {
            // Si le bouton est coché, on utilise le thème clair
            if (this.checked) {
                document.documentElement.setAttribute('data-theme', 'light');
                document.cookie = 'theme=light'; // On enregistre le thème dans les cookies
            }
            // Sinon, on utilise le thème sombre
            else {
                document.documentElement.setAttribute('data-theme', 'dark');
                document.cookie = 'theme=dark'; // On enregistre le thème dans les cookies
            }
        });
    });
</script>
<?php


$url = $_SERVER['PHP_SELF'];
//var_dump($url);
?>


<div class="margeGaucheDroite">