<?php declare (strict_types = 1);
include 'C:/wamp64/www/codePhp/includes/entete.php';

echo "<h3>"." Les tableaux"."</h3>";

$langues = array(
'en' => 'English',
'fr' => 'Français',
'es' => 'Español',
'de' => 'Deutsch',
'am' => 'American',
'be' => 'Belge',
'ch' => 'Suisse',
'me' => 'Mexicano',
'at' => 'Austrian',
'hu' => 'Magyar',
'all' => 'Voir tous',
'none' => 'Choisir'
);

$var = 'es';
if (in_array($var, array('fr', 'en', 'de', 'es'))) {
echo 'la variable $var qui a pour valeur : '. $var .' est dans le tableau';
} else {
echo 'passe pas!';
}

echo '<br />';
if (array_key_exists($var, $langues)) {
echo 'la variable est dans le tableau $langues <br />';
echo $var . ' est l\'index de "' . $langues[$var] . '"du tableau $langues : ' . $var . ' => ' . $langues[$var];
} else {
echo 'absent du talbeau $langues!';
}

echo "<br>";

function temperatureNearZero(array $temperatures)
{
    $mostCold = $temperatures[0];//première valeur de tableau

    foreach ($temperatures as $temperature)
    {
        $absTemperature = abs($temperature);
        $absMostCold = abs($mostCold);
        if ($absTemperature < $absMostCold)
        {
            $mostCold = $temperature;
        }
        else if ($absTemperature === $absMostCold && $mostCold < 0)
        {
            $mostCold = $temperature;
        }
    }

    return $mostCold;
}

$temps = [7,2,5,-12,-7,-1];
$zero =  temperatureNearZero($temps) ;

echo '<h1>Temperature proche de zéro dans le talbeau</h1>';
echo ' temperature proche de zero : '.$zero;


echo '<h1> Talbeaux clés dynamiques : $$</h1>';

$variables = array(
    'nom' => 'John',
    'age' => 12
);
foreach ($variables as $key => $value) {
    $$key = $value;
}

// Maintenant, vous avez une variable $nom avec la valeur 'John'
echo $nom; // Affiche 'John'

?>
<div class="rowSlim"></div>

<?php
require_once __DIR__.'/../includes/footer.php';
?>

