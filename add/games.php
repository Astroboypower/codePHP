<?php
// Inclusion du fichier 'entete.php'
require_once __DIR__ . '/../includes/entete.php';
?>
    <div class="rowSlim"></div>
<h2>Le plus loin de zéro</h2>
<?php

function findLargest($numbers)
{
    // Vérifier si le tableau est vide ou si le tableau contient plus de 10 éléments
    if (empty($numbers) || count($numbers) > 10) {
        return null;
    }

    // Initialiser la valeur la plus grande à la première valeur du tableau
    $largest = $numbers[0];

    // Parcourir le tableau
    foreach ($numbers as $number) {
        // Vérifier si la valeur est un entier et si la valeur est dans la plage autorisée
        if (!is_int($number) || $number < -2147483648 || $number > 2147483647) {
            throw new Exception("Toutes les valeurs du tableau doivent être des entiers");
        }

        // Si le nombre actuel est plus grand que la valeur la plus grande actuelle, le mettre à jour
        if ($number > $largest) {
            $largest = $number;
        }
    }

    // Retourner la valeur la plus grande
    return $largest;
}

$tableTest = [1, 2, 184, 78, -12, 178, -17];

foreach ($tableTest as $value) {
    echo $value . " / ";
}

?>

<br>
Le chiffre le plus éloigné de zéro parmi ces valeurs est : <?= findLargest($tableTest) ?> !!

<h2>Rendu de monnaie</h2>
<?php
class Change {
    public $coin2 = 0;
    public $bill5 = 0;
    public $bill10 = 0;
    public $message = "Nous vous avons rendu l'appoint";
}

function optimalChange($s) {
    if (is_int($s) && $s > 0 && $s <= 2147483647){
        $change = new Change();

        // Tant que la somme est supérieure à 20, nous soustrayons 10 et augmentons le nombre de billets de 10€.
        while ($s >= 20) {
            $change->bill10++;
            $s -= 10;
        }
        // Si la somme restante est de 11 ou 13
        if ($s  == 11 || $s  == 13) {
            $change->bill5++;
            $s -= 5; // ici $s = 5 ou 8
        }
        // Si la somme restante est 10, ajout d'un billet de 10€ et soustrayons 10de la somme.
        if ($s >= 10) {
            $change->bill10++;
            $s -= 10;
        }

        // Si la somme restante est de 7 ou 9
        if ($s== 5 || $s  == 7 || $s  == 9) {
            $change->bill5++;
            $s -= 5;
        }

        // Si la somme restante est un multiple de 2, ajout du nombre approprié de pièces de 2€.
        if ($s % 2 == 0) {
            $change->coin2 = $s / 2;
        }

        else {
            // Si la somme restante n'est pas un multiple de 2, return NULL car il est impossible de rendre cette somme avec des pièces de 2€ et des billets de 5€ et 10€.
            $change->message = "Désolé, nous n'avons pas de pièces de1€. il manque 1€";
            return $change;
        }
        return $change;
    }
}

$s = 214; // Change this value to perform other tests
$m = optimalChange($s);

echo "montant: " . $s . "<br>";
echo "Coin(s)  2€: " . $m->coin2 . "<br>";
echo "Bill(s)  5€: " . $m->bill5 . "<br>";
echo "Bill(s) 10€: " . $m->bill10 . "<br>";

$result = $m->coin2*2 + $m->bill5*5 + $m->bill10*10;
echo $m->message ." : ". $result;

?>

<div class="rowSlim"></div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
