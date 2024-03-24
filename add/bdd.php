<?php
// Inclusion des fichiers nécessaires
require_once __DIR__ . '/../includes/entete.php'; // Inclut le fichier d'entête
require_once __DIR__ . '/../config/database.php'; // Inclut le fichier de configuration de la base de données

// Vérifie si une image a été téléchargée sans erreur
if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
    $filename = basename($_FILES['img']['name']); // Récupère le nom du fichier
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/public/images/uploads/' . $filename; // Définit le chemin où l'image sera stockée

    // Déplace le fichier téléchargé vers le répertoire de destination
    if (move_uploaded_file($_FILES['img']['tmp_name'], $targetPath)) {
        // Récupère les informations de l'image
        $title = "titre de l'image " . $filename;
        $title = isset($_POST['title']) ? filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
        $alt = isset($_POST['alt']) ? filter_var($_POST['alt'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';


        $src = '/public/images/uploads/' . $filename; // Définit le chemin d'accès à l'image

        // Essaie d'insérer les informations de l'image dans la base de données
        try {
            $stmt = $conn->prepare("INSERT INTO images (alt, src, title) VALUES (:alt, :src, :title)"); // Prépare la requête SQL
            $stmt->bindParam(':alt', $alt); // Lie la valeur de $alt à :alt
            $stmt->bindParam(':src', $src); // Lie la valeur de $src à :src
            $stmt->bindParam(':title', $title); // Lie la valeur de $title à :title
            $stmt->execute(); // Exécute la requête SQL

            echo "Nouvelles données créées avec succès"; // Affiche un message de succès
            $_SESSION['flash'] = 'L\'image est enregistrée.'; // Stocke un message flash dans la session
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage(); // Affiche le message d'erreur si une exception est levée
        }
    } else {
        echo 'Il y a eu un problème avec le téléchargement de l\'image'; // Affiche un message d'erreur si le fichier n'a pas pu être déplacé
    }
    // Affiche le message flash s'il existe
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        echo '<div class="flash-message">' . $flash . '</div>';
        unset($_SESSION['flash']); // Supprime le message flash de la session
    }
}


?>

    <h2 class="smallTitreRow orange thick">Récupération des images via la BDD</h2>
    <p class="margeGaucheDroite">
        Le but du jeu est de récupérer toutes les images dans un tableau pour les afficher :
<div class="rowSlim"></div>
<?php
// Récupère toutes les images de la base de données et les affiche
$images = $pdo->query('SELECT * FROM images'); // Exécute la requête SQL pour récupérer toutes les images
$images = $images->fetchAll(PDO::FETCH_ASSOC); // Récupère toutes les lignes retournées par la requête SQL
foreach ($images as $image) {
    $altImage = $image['alt']; // Récupère le texte alternatif de l'image
    $srcImage = $image['src']; // Récupère le chemin d'accès à l'image
    echo '<img src="' . $srcImage . '" alt="' . $altImage . '" class="imagesMax">'; // Affiche l'image
}
?>
    <h2>Formulaire d'upload d'image</h2>
    <p>
        Les images sont enregistrées dans le répertoire /public/images/uploads/ et le chemin est enregistré en base de données.
    </p>
    <br>
<?php
// Formulaire d'upload d'image
?>
    <form method="post" enctype="multipart/form-data">
        <label for="img">Choisissez une image :</label>
        <input type="file" name="img" id="img" accept="image/*" required>
        <br>
        <input type="text" name="alt" id="alt" placeholder="Description de l'image">
        <br>
        <input type="submit" value="Envoyer">
    </form>


<div class="rowSlim"></div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>

