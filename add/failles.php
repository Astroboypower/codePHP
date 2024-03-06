<?php declare (strict_types=1);
require_once __DIR__ . '/../includes/entete.php';
?>

<h2 class="smallTitreRow orange thick">La faille XSS </h2>

<p class="margeGaucheDroite">Pour ne pas que le contenu textuel entré dans un formulaire puisse être interpété, la
    fonction en PHP échape les balises pour avoir leur représentation textuelle. C'est la fonction `htmlspecialchars()`.
    Voici un exemple :</p>

<?php
$texte = "<script>alert('Ceci est une attaque XSS');</script>";
$texteSecurise = htmlspecialchars($texte, ENT_QUOTES, 'UTF-8');

echo  $texte . "<br>";
echo "Nous avons vu le texte interprété par le naviagateur, Voici le texte sécurisé .<br>";
echo "Texte sécurisé : <em>" . $texteSecurise . "</em><br>";
?>

<h2>Formulaire sécurisé</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nom : <input type="text" name="nom">
    <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collecte de la valeur du champ d'entrée 'nom'
    $nom = htmlspecialchars($_POST['nom']);
    echo "Bonjour, " . $nom;
}
?>
<h2>Formulaire non sécurisé</h2>
<p>
    Dans cet exemple, si un utilisateur entre quelque chose comme <em><?=$texteSecurise ?></em> dans le champ ‘nom’, le navigateur interprétera cela comme du code JavaScript et exécutera le script.
</p>
<form method="post" action="<?php echo ($_SERVER["PHP_SELF"]);?>">
    Nom : <input type="text" name="nom">
    <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collecte de la valeur du champ d'entrée 'nom'
    $nom = htmlspecialchars($_POST['nom']);
    echo "Bonjour, " . $nom;
}
?>




<div class="rowSlim"></div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
