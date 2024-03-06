<!-- pages du menu -->
<?php
// Définition d'un tableau associatif pour les pages du menu
require __DIR__ . '/../config/routing.php';

?>

<div id="scrollTop" class="largeFull backroundGardient menu">
    <a href="<?php echo $home; ?>" class="floatLeft linksHome "><i class="fa fa-home fa-lg backroundButton" aria-hidden="true"></i></a>
    <?php
    foreach ($pagesMenu as $titre => $page){
        ?>
        <a href="<?= $home.$filesDirecrory.$page ?>" class="linksButton backroundButton displayLarge dispalySmall"><?= $titre ?></a>
        <?php
    }
    ?>

    <div class="dropdownMenu">
        <button class="dropbtn displayLargeMenu dispalySmallMenu"><i class="fa fa-bars fa-lg backroundButton" aria-hidden="true"></i></button>
        <div class="dropdown-content-menu">
            <?php
            foreach ($pagesMenu as $titre => $page){
                echo'<a href="'.$home.$filesDirecrory.$page.'">'.$titre.'</a>';
            }
            ?>
        </div>
    </div>
</div>
