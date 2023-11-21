<?php
    session_start();
    $titre = "Accueil";
    include 'header.inc.php';
    include 'menuAdmin.inc.php';


?>


<div class="container">


<?php
    if(isset($_SESSION['message'])) {
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
        echo $_SESSION['message'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        unset($_SESSION['message']);
    }
?>
        <h1>Accueil</h1>
        
        <!-- Liste des jeux -->
        <form method="POST" action="tt_pageJeux.php" enctype="multipart/form-data">
            <section class="container">
                <div class="container-md grille">
                    <div class="row line">
                        <?php
                            // Répertoire où sont stockées les images
                            $chemin = "Images/";

                            // Récupération de la liste des fichiers images
                            $images = glob($chemin . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

                            // Affichage des images dans la galerie
                            foreach ($images as $image) {
                            /* echo  
                                '<label>
                                <input type="checkbox" id="monCheckbox">
                                <div class="col-lg-3 grid-item"><a href="chess.php"><img src="' . $image . '" alt="Image" class="img-thumbnail image"></a> </div>
                                </label>';*/
                                echo
                                '<div class="col-lg-3 grid-item">
                                    <button class="btn" name="submit" type="submit">
                                        <img src="' . $image . '" alt="Image" class="img-thumbnail image">
                                    </button>
                                </div>   ';
                                
                            }
                        ?>
                    </div>
                </div>
            </section>
        </form>

</div>
<?php
    include 'footer.inc.php';
?>