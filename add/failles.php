<?php declare (strict_types = 1);
require_once __DIR__.'/../includes/entete.php';
?>

<h2 class="smallTitreRow orange thick">La faille XSS </h2>

<p class="margeGaucheDroite">Pour ne pas que le contenu textuel entré dans un formulaire puisse être interpété. La phocton en PHP échape les balise pour avoir leur representation textuelle
    C'est la fonction htmlspeciachars()<br>
    <?php

    ?>

</p>

<h2 class="smallTitreRow orange thick">formulaire pour BDD </h2>
<p class="margeGaucheDroite">
<form method="post">
    <input type="text" name="img" placeholder="Image">
    <input type="text" name="scr" placeholder="description de l'mage">

    <input type="submit" value="envoyer">
</form>
</p>


<?php
require_once __DIR__.'/../includes/footer.php';
?>
