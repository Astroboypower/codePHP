<?php declare (strict_types = 1);
require_once __DIR__.'/../includes/entete.php';

$servername = 'localhost';
$dbname =  'trainingphp';
$username = 'root';
$password = '';

/*
var_dump($_POST);
var_dump($_FILES);

*/


if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK ){   //le tableau $_FILES['img '] est crée à la ligne 87

    $filename = basename($_FILES['img']['name']); //basename ne prends ce qu'il y a après le dernier slash pour ne pas prendre des chemins
    //if (move_uploaded_file($_FILES['img']['tmp_name'], __DIR__.'/../img/'.$filename)){    // on place le dossier avec le nom du fichier temporaire
    if (move_uploaded_file($_FILES['img']['tmp_name'], $imagesDirectory.$filename)){    // on place le dossier avec le nom du fichier temporaire
        // dans le reprtoire img et si c'est ok on entre dans la boucle
        echo 'ok';
    }else{
        echo'il y a eu un problème avec l
        
        ' ;
    }
    $title = basename($_FILES['img']['name']);
    $alt = $_POST['alt'];
    $src = '/public/images/'.$_FILES['img']['name'];
}


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $req = $conn->prepare("INSERT INTO images (alt, src, title)
  VALUES (:alt, :src, :title)");

        $req->bindParam(':alt', $alt);
        $req->bindParam(':src', $src);
        $req->bindParam(':title', $title);

        $req->execute();

        /* insert a row
        $alt = "John";
        $src = "Doe";
        $title = "john@example.com";
        $req->execute();

        // insert another row
        $alt = "Mary";
        $src = "Moe";
        $title = "mary@example.com";
        $req->execute();
        */

        echo "New records created successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;

?>

<h2 class="smallTitreRow orange thick">Recuperation des images via la BDD </h2>

<p class="margeGaucheDroite">Le but du jeu est de recuperer toutes les images dans un tableau pour les afficher les images <br>
    <?php
    $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);
    $images = $pdo->query('SELECT * FROM images');
    //var_dump($images);                                          //dans $images, il ya la requete
    $images =  $images->fetchAll(PDO::FETCH_ASSOC);
    var_dump($images);                                          //dans $images, il ya un tableau avec les images

    foreach ($images as $image){
        $altImage = $image['alt'];
        $srcImage = $image['src'];

        //echo '<img src="/public/images/identite2.png">';
        echo '<img src='.$srcImage.'>';

    }
    ?>

</p>

<h2 class="smallTitreRow orange thick">formulaire pour BDD </h2>
<p class="margeGaucheDroite">
<form method="post" enctype="multipart/form-data">
    <label>
        <input type="file" name="img">
    </label>
    <label>
        <input type="text" name="alt" placeholder="description de l'image">
    </label>

    <input type="submit" value="envoyer">
</form>
</p>





<?php
require_once __DIR__.'/../includes/footer.php';
?>
