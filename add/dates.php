<?php declare (strict_types=1);
require_once __DIR__ . '/../includes/entete.php';

$todayWithDatFunction = date("l d/m/Y");       // date actuelle au format “jour mois/année”
$heure = date("H:i:s");         // l’heure actuelle au format “heures:minutes:secondes”
$todayDay = (int)date("d");   // crée une date Unix pour le 12 août 2014 à 11:14:54
$thisYear = (int)date("Y");
$thisMonth = (int)date("m");
$lastMonthMonth = (int)date("m") + 1;
$nowHour = date("H"); // l'heure de maintenant

$d = mktime(11, 14, 54, 8, 12, 2014);

$tomorrow = mktime(0, 0, 0, $thisMonth, $todayDay + 1, $thisYear);
$lastmonth = mktime(0, 0, 0, $lastMonthMonth, $todayDay + 1, $thisYear);
$nextyear = mktime(0, 0, 0, $thisMonth, $todayDay, $thisYear + 1);

?>

    <p>
        <h2 class="smallTitreRow orange thick">Les dates </h2>
        <div class="margeGaucheDroite">
        Voci ce qu'il ne faut pas faire! le piège! car au mois de décembre on à 13 pour le mois suivant. même problème pour le dernier jours du mois. il faut utiliser l'objet date pour les calculs

        <p class="margeGaucheDroite"> On est le : <?= $todayWithDatFunction ?> il est : <?= $heure ?></p>
        <p class="margeGaucheDroite"> Demain on sera le : <?= date("d/m/Y à H:i:s", $tomorrow) ?></p>
        <p class="margeGaucheDroite"> Le mois prochain : <?= date("d/m/Y", $lastmonth) ?></p>
        <p class="margeGaucheDroite"> l'année prochaine : <?= date("d/m/Y", $nextyear) ?></p>
        </div>

<?php


        $birth = new DateTime('1979-07-19');   //un objet DateTime pour la date de naissance
        $today = new DateTime();

        $todayStr = $today->format('d-m-Y');
        $todayDay = (int)date("d");   // crée une date Unix pour le 12 août 2014 à 11:14:54
        $interval = $birth->diff($today);
        $years = $interval->format('%y');   // extrait le nombre d’années de l’intervalle.
        $months = $interval->format('%m');  // extrait le nombre de mois de l’intervalle.
        $days = $interval->format('%d');    // extrait le nombre de jours de l’intervalle.

        $day = $today;
        $nextMonth = clone $day;
        $nextMonth->modify('+1 month');
        $tomorrow = clone $day;
        $tomorrow->modify('+1 day');
        $nextYear = clone $day;
        $nextYear->modify('+1 year');

        $locations = [
            'Tokyo' => 'Asia/Tokyo',
            'Sydney' => 'Australia/Sydney',
            'Lisbonne' => 'Europe/Lisbon',
            'New Delhi' => 'Asia/Kolkata',
            'Hong Kong' => 'Asia/Hong_Kong',
            'Toulouse' => 'Europe/Paris',
            'New York' => 'America/New_York',
            'Rio de Janeiro' => 'America/Sao_Paulo',
            'San Francisco' => 'America/Los_Angeles',
            'Temps Universel' => 'UTC'
        ];
?>
        <h2 class="smallTitreRow orange thick">Les dates avec la classe DateTime</h2>
        <div class="margeGaucheDroite">
            <p class="margeGaucheDroite"> On est le : <?= $todayStr ?> à <?= $heure ?> </p>
        <p class="margeGaucheDroite">Le mois prochain : <?= $nextMonth->format('d/m/Y') ?></p>
        <p class="margeGaucheDroite">Demain on sera le : <?= $tomorrow->format("d/m/Y à H:i:s") ?></p>
        <p class="margeGaucheDroite">L'année prochaine : <?= $nextYear->format("d/m/Y") ?></p>

        <p class="margeGaucheDroite">Mon age: <?=$years?> ans <?=$months?> mois <?=$days?> jours.</p>
            <p class="margeGaucheDroite">Date de naissance : <?=$birth->format("d/m/Y")?></p>
        </div>

        <h2 class="smallTitreRow orange thick">Décalage horaire et voyages </h2>
        <div class="margeGaucheDroite">
            <table>
            <tr><th>Location</th><th>Local Time</th></tr>
<?php
            // Affichage de l'heure locale pour chaque fuseau horaire
            foreach ($locations as $location => $timezone) {
                $date = new DateTime('now', new DateTimeZone($timezone));
                echo "<tr><td>$location</td><td>" . $date->format('d-m-Y H:i:s') . "</td></tr>";
            }
?>
            </table>
        </div>


<?php
// utilisation de constantes
define('PARIS', 'Paris');
define('RIO', 'Rio de Janeiro');
define('SAN_FRANCISCO', 'San Francisco');
define('TOKYO', 'Tokyo');

// Temps de vol approximatifs en heures
$flightTimes = [
    PARIS . '-' . RIO => 12,
    RIO . '-' . PARIS => 12,
    RIO . '-' . SAN_FRANCISCO => 19,
    SAN_FRANCISCO . '-' . RIO => 19,
    TOKYO . '-' . SAN_FRANCISCO => 11,
    SAN_FRANCISCO . '-' . TOKYO => 11,
    TOKYO . '-' . PARIS => 13,
    PARIS . '-' . TOKYO => 13,
    RIO . '-' . TOKYO => 26,
    TOKYO . '-' . RIO => 26,
    SAN_FRANCISCO . '-' . PARIS => 12,
    PARIS . '-' . SAN_FRANCISCO => 12,
];

$locations = [
    'Paris' => 'Europe/Paris',
    'Rio de Janeiro' => 'America/Sao_Paulo',
    'San Francisco' => 'America/Los_Angeles',
    'Tokyo' => 'Asia/Tokyo'
];

// Itinéraire de vol
$itinerary = [PARIS, RIO, SAN_FRANCISCO, TOKYO, PARIS];

// Heure de départ de Paris
$depart = new DateTime('now', new DateTimeZone($locations['Paris']));
?>

<table>
<tr><th>Voyage</th><th colspan='4'>Heure de départ</th><th colspan='4'>Heure d'arrivée</th></tr>
<tr><th></th><th>Paris</th><th>Rio</th><th>San Francisco</th><th>Tokyo</th><th>Paris</th><th>Rio</th><th>San Francisco</th><th>Tokyo</th></tr>

    <h2 class="smallTitreRow orange thick">Calcul pour les voyages </h2>
    <p>
        En admettant que l'on puisse partir maintenant
    </p>
<?php
// Pour chaque vol dans l'itinéraire
for ($i = 0; $i < count($itinerary) - 1; $i++) {
    // Calculer l'heure d'arrivée
    $arrival = clone $depart;
    $flightTime = $flightTimes[$itinerary[$i] . '-' . $itinerary[$i + 1]];
    $arrival->modify("+$flightTime hours");


    echo "<tr>";
    echo "<td>" . $itinerary[$i] . " - " . $itinerary[$i + 1] . "<br>Durée : " . $flightTime . " heures</td>";

    // Afficher l'heure de départ dans chaque fuseau horaire
    foreach ($locations as $city => $timezone) {
        $depart->setTimezone(new DateTimeZone($timezone));
        echo "<td>" . $depart->format('d-m-Y H:i:s') . "</td>";
    }

    // Afficher l'heure d'arrivée dans chaque fuseau horaire
    foreach ($locations as $city => $timezone) {
        $arrival->setTimezone(new DateTimeZone($timezone));
        echo "<td>" . $arrival->format('d-m-Y H:i:s') . "</td>";
    }

    echo "</tr>";

    // L'heure de départ du prochain vol est l'heure d'arrivée du vol actuel
    $depart = $arrival;
}

?>
</table>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $departCity = $_POST["departCity"];
    $arrivalCity = $_POST["arrivalCity"];
}
?>


    <h2 class="smallTitreRow orange thick">Calcul de dates avec les formulaires </h2>
    <p class="margeGaucheDroite">
        <a id="form">  <!-- Encrage pour revenir ici -->
        <!-- Début du formulaire -->
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>#form">
    <label for="departCity">Ville de départ:</label>
        <!-- Champ de sélection pour la ville de départ -->
        <select name="departCity" class="maxFormField">
            <!-- Chaque option représente une ville. La valeur de l'option est ce qui est envoyé au serveur lorsque le formulaire est soumis. -->
            <!-- Pour chaque option, on vérifie si la ville a été sélectionnée précédemment (c'est-à-dire si elle est égale à $_POST['departCity']). Si c'est le cas, on ajoute l'attribut 'selected' à l'option. -->
            <option value="Paris" <?php if (isset($_POST['departCity']) && $_POST['departCity'] == 'Paris') echo 'selected="selected"'; ?>>Paris</option>
            <option value="Rio de Janeiro" <?php if (isset($_POST['departCity']) && $_POST['departCity'] == 'Rio de Janeiro') echo 'selected="selected"'; ?>>Rio de Janeiro</option>
            <option value="San Francisco" <?php if (isset($_POST['departCity']) && $_POST['departCity'] == 'San Francisco') echo 'selected="selected"'; ?>>San Francisco</option>
            <option value="Tokyo" <?php if (isset($_POST['departCity']) && $_POST['departCity'] == 'Tokyo') echo 'selected="selected"'; ?>>Tokyo</option>
        </select>
    <br>
        <label for="arrivalCity">Ville d'arrivée:</label>
        <!-- Champ de sélection pour la ville d'arrivée -->
        <select name="arrivalCity" class="maxFormField">
            <!-- Même logique que pour le champ de sélection de la ville de départ -->
            <option value="Rio de Janeiro" <?php if (isset($_POST['arrivalCity']) && $_POST['arrivalCity'] == 'Rio de Janeiro') echo 'selected="selected"'; ?>>Rio de Janeiro</option>
            <option value="Paris" <?php if (isset($_POST['arrivalCity']) && $_POST['arrivalCity'] == 'Paris') echo 'selected="selected"'; ?>>Paris</option>
            <option value="San Francisco" <?php if (isset($_POST['arrivalCity']) && $_POST['arrivalCity'] == 'San Francisco') echo 'selected="selected"'; ?>>San Francisco</option>
            <option value="Tokyo" <?php if (isset($_POST['arrivalCity']) && $_POST['arrivalCity'] == 'Tokyo') echo 'selected="selected"'; ?>>Tokyo</option>
        </select>
        <!-- Bouton de soumission du formulaire -->
    <br>
        <input type="submit">
    </form>
    <!-- Fin du formulaire -->

    </p>
    <div class="container">
        <?php
        require_once __DIR__ . '/../form/dateForm.php';
        ?>
    </div>


    <br>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $departCity = $_POST["departCity"];
    $arrivalCity = $_POST["arrivalCity"];

    if ($departCity == $arrivalCity) {
        echo "Ceci n'est pas un voyage, merci de changer une des deux villes sélectionnées.";
    } else {
        // Votre code pour calculer et afficher les heures de départ et d'arrivée
        $flightTime = $flightTimes[$departCity . '-' . $arrivalCity];
        $depart = new DateTime('now', new DateTimeZone($locations[$departCity]));
        $arrival = clone $depart;
        $arrival->modify("+$flightTime hours");
        echo "<table>";
        echo "<tr><th></th><th>" . $departCity . "</th><th>" . $arrivalCity . "</th></tr>";
        echo "<tr><td>Heure de départ</td>";
        echo "<td>" . $depart->format('Y-m-d H:i:s') . "</td>";
        $depart->setTimezone(new DateTimeZone($locations[$arrivalCity]));
        echo "<td>" . $depart->format('Y-m-d H:i:s') . "</td></tr>";
        $arrival->setTimezone(new DateTimeZone($locations[$departCity]));
        echo "<tr><td>Heure d'arrivée</td>";
        echo "<td>" . $arrival->format('Y-m-d H:i:s') . "</td>";
        $arrival->setTimezone(new DateTimeZone($locations[$arrivalCity]));
        echo "<td>" . $arrival->format('Y-m-d H:i:s') . "</td></tr>";
        echo "</table>";
        echo "Temps de vol : " . $flightTime . " heures";
    }
}
?>
<div class="row"></div>
<?php
require_once __DIR__ . '/../includes/footer.php';
?>