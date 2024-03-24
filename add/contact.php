<?php
//add/contact.php
// Inclusion du fichier 'entete.php'
require_once __DIR__ . '/../includes/entete.php';
?>
<div class="rowSlim"></div>
<?php
require_once __DIR__ . '/../config/mails.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST['firstname']);
    $lastName = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $message = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';

    $mail = getMailer();

    try {
        // Destinataires
        $mail->setFrom('contact@lavaurimmobilier.xyz', 'Service Client du site de test de PHP par JM CATALA');
        $mail->addAddress('jeanmarccatala@gmail.com', 'CATALA');  // l'adresse e-mail où vous souhaitez recevoir les messages

        // Contenu
        $mail->isHTML(true);
        $mail->Subject = 'Nouveau message de ' . $firstName . ' ' . $lastName;
        $mail->Body    = "Nom: $firstName $lastName<br>Email: $email<br>Téléphone: $phone<br>Message: $message";

        $mail->send();
        $_SESSION['flash'] = 'Votre message a bien été envoyé, nous allons vous répondre.';
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur de messagerie: {$mail->ErrorInfo}";
    }
}

if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    echo '<div class="flash-message">' . $flash . '</div>';
    unset($_SESSION['flash']);
}
?>
<h2>Nous contacter</h2>
<div class="container">
    <?php
    require_once __DIR__ . '/../form/contactForm.php';
    ?>
</div>

<div class="rowSlim"></div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
