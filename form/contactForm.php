<?php
require_once __DIR__ . '/../config/mails.php';
?>

<form action="../add/contact.php"  method="post">
    <label for="fname">Nom</label>
    <input type="text" id="fname" name="firstname" placeholder="Votre nom" required>

    <label for="lname">Prénom</label>
    <input type="text" id="lname" name="lastname" placeholder="Prénom" required>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" placeholder="Votre adresse électromnique" required>

    <label for="phone">Numéro de téléphone:</label>
    <input type="tel" id="phone" name="phone" placeholder="Si vous souhaitez être contacté par téléphone téléphone" pattern="^[0-9\s]{1,14}$" title="Veuillez entrer un numéro de téléphone valide (uniquement des chiffres et des espaces, jusqu'à 14 caractères)">


    <label for="subject">Message</label>
    <textarea id="subject" name="subject" placeholder="Votre messsage" style="height:200px"></textarea>

    <input type="submit" value="Envoyer">
</form>
