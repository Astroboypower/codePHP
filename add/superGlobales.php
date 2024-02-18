<?php declare (strict_types = 1);
require_once __DIR__.'/../includes/entete.php';
?>

    <h2 class="smallTitreRow orange thick">$_GET </h2>
    <h3 class="margeGaucheDroite">
        <?php
        printf( '%s : %s',
            $_GET['name'] ?? 'Nom par defaut',
            $_GET['message'] ?? 'message par defaut' );
        ?>
    </h3>
    <h4 class="smallTitreRow orange thick">modification de l'url avec un formulaire simple </h4>
    <p class="margeGaucheDroite">
        Nous allons passer  les deux parametre dans l'url en utilisante ce petit formulaire simple pour modifier les valeurs par défaut


    <form>
        <label>
            <input type="text" name="name" placeholder="entrez votre nom">
        </label>
        <label>
            <input type="text" name="message" placeholder="entrez un message">
        </label>

        <input type="submit" value="GO !">
    </form>
    <br>

    </p>

    <h2 class="smallTitreRow orange thick">$_POST </h2>
    <h4 class="smallTitreRow orange thick">Recuperation des données du formulaire sans passer par l'url , apres valdation du formulaire nous pourrons récuperre les deoonées de la variable _$POST</h4>
    <p class="margeGaucheDroite">


<?php
//var_dump($_POST);
if (!empty($_POST)){

    extract($_POST);
    /** @var $couleur */
    /** @var $age */
    var_dump($age, $couleur);
}
?>

    <form method="POST">
        <label>
            <input type="text" name="age" placeholder="entrez votre age" value="<?= $age ?? 'age par defaut' ?>">
        </label>
        <label>
            <input type="text" name="couleur" placeholder="votre couleur preferée?" value="<?= $couleur ?? 'vert par defaut' ?>">
        </label>

        <input type="submit" value="GO !">
    </form>

    <p class="margeGaucheDroite">
        Si nous actualisons la page ,les données du formulaire précédament envoyées sont dans gardées
    </p>

    <h2 class="smallTitreRow orange thick">$_FILES pour uploader des fichier</h2>
    <p class="margeGaucheDroite">Si cela ne fonctionne pas ,il faut modifier le PHP.ini pour modifier la taille minimum des fichiers que l'on peut uploader
        <br>
        Par exemple upload_max_filesize = 100M
    </p>


<?php
if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK ){   //le tableau $_FILES['img '] est crée à la ligne 87

    var_dump($_FILES['img']);
    $filename = basename($_FILES['img']['name']); //basename ne prends ce qu'il y a après le dernier slash pour ne pas prendre des chemins
    if (move_uploaded_file($_FILES['img']['tmp_name'], __DIR__.'/../img/'.$filename)){    // on place le dossier avec le nom du fichier temporaire
                                                                                                    // dans le reprtoire img et si c'est ok on entre dans la boucle
        echo 'ok';
    }else{
        echo'ça chie';
    }
}

?>

 <p class="margeGaucheDroite">
    <form method="POST" enctype="multipart/form-data">
        <label>
            <input type="file" name="img">
        </label>
        <input type="submit" value="GO !">
    </form>
    </p>


    <h2 class="smallTitreRow orange thick">$_SESSION pour verifier que la requuete vient du même utiliateur</h2>
    <p class="margeGaucheDroite">Le but est di'identifier l'utilisateur.
        La superglobale $_SESSION n'est accessible seulement après avoir demarré le systeme de session avec session_start()
    </p>

<?php
// Start the session
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo 'Session variables : favcolor: '.$_SESSION["favcolor"].'; favanimal: '. $_SESSION["favanimal"];

?>



    <h2 class="smallTitreRow orange thick">$_COOKIES</h2>
    <p class="margeGaucheDroite"> Ce système permet d'identifier et de suivre les visiteurs via les postes de travail.
        La superglobale $_COOKIES est instanciée dans  l'entete avec : <em> setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day</em>
    </p>

<?php
$cookie_name = "user";
$cookie_value = "John Doe";

if(!isset($_COOKIE[$cookie_name])) {                // La superglobale $_COOKIES est instanciée dans  l'entete avec : <em> setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day</em>
    echo "Cookie named '" . $cookie_name . "' is not set or removed!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>


<?php
require_once __DIR__.'/../includes/footer.php';
?>