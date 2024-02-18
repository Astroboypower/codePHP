<!DOCTYPE html>
<html>
<div style="background-color: #222222; color: #cccccc ">

<?php
session_start();
var_dump($_SESSION);

$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

$home = 'http://codephp/';
$adresse = $home.'index.php?what=';
$filesDirecrory ='add/';
$imagesDirectory = 'C:/wamp64/www/codePhp/public/images/';

$ccsStyle = '/public/css/style.css';
$ccsMenu = '/public/css/menu.css';
$ccsFooter = '/public/css/footer.css';
$ccsFADirectory = '/public/css/font-awesome.css';

$jsMaps = '/public/js/maps.js';
$jsMenu = '/public/js/menu.js';
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tests de codes</title>
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


<?php


$url = $_SERVER['PHP_SELF'];
var_dump($url);
?>


