<?php
    require_once('roleMembre.php');
    $titre = "Welcome";
    include 'header.inc.php';
    include 'menuMembre.inc.php';


?>
<style>
      body {
        background-color: midnightblue ;
      }
      h1 {
	color: white;
         }
</style>


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
                            echo  '<div class="col-lg-3 grid-item"><a href="chess.php"><img src="' . $image . '" alt="Image" class="img-thumbnail image"></a> </div>';
                        }

                    ?>
                </div>
            </div>
        </section>
        

</div>
<?php
    include 'footer.inc.php';
?>