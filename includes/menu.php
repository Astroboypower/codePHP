<!-- pages du menu -->
<?php
// Définition d'un tableau associatif pour les pages du menu
require __DIR__ . '/../config/routing.php';
?>


<div id="scrollTop" class="largeFull backroundGardient menu">
    <!-- Lien vers la page d'accueil -->
    <a href="<?php echo $home; ?>" class="floatLeft linksHome "><i class="fa fa-home fa-lg backroundButton" aria-hidden="true"></i></a>

    <?php
    // Boucle sur le tableau des pages du menu pour créer un lien pour chaque page
    foreach ($pagesMenu as $titre => $page){
        echo'<a href="'.$home.$filesDirecrory.$page.'" class="linksButton backroundButton displayLarge dispalySmall">'.$titre.'</a>';
    }
    ?>

    <!-- menu pour mobile -->
    <!-- menu responsive-->
    <div class="dropdownMenu floatRight">
        <!-- Bouton pour afficher le menu déroulant sur les appareils mobiles -->
        <button class="dropbtn backroundGardient displayLargeMenu dispalySmallMenu"><i class="fa faBars fa-bars fa-lg backroundButton"
                                                                                       aria-hidden="true"></i></button>
        <div class="dropdown-content-menu">
            <!-- Boucle sur le tableau des pages du menu pour créer un lien pour chaque page dans le menu déroulant -->
            <?php
            foreach ($pagesMenu as $titre => $page){
                echo'<a href="'.$home.$filesDirecrory.$page.'">'.$titre.'</a>';
            }
            ?>
        </div>
    </div>
</div>
