<?php
    require_once('roleAdmin.php');
    $titre = "Accueil";
    include 'header.inc.php';
    include 'menuAdmin.inc.php';


?>



<div class="coontainer">


    <?php
      
         if(isset($_SESSION['message'])) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
            echo $_SESSION['message'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['message']);
            }
        // Répertoire où sont stockées les images
        $chemin = "Images/";
        // Récupération de la liste des fichiers images
        $images = glob($chemin . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
    ?>
    <h1>Accueil</h1>
        
    <!-- Liste des jeux -->
        <section class="container">
            <div class="container-md grille">
                <div class="row line">
                    <?php
                        // Affichage des images dans la galerie
                        foreach ($images as $image) {
                            $infoFichier = pathinfo($image);
                            $nomSansExtension = $infoFichier['filename'];
                            echo
                            '
                            <div class="col-lg-3 grid-item">
                                
                                    <a href=" ./temp/'. $nomSansExtension .'.php?nomJeu=' .$nomSansExtension .'"><img src="' . $image . '" alt="Image" class="img-thumbnail image"></a>
                                
                            </div>   ';
                             /*echo  '<div class="col-lg-3 grid-item"><a href="chess.php"><img src="' . $image . '" alt="Image" class="img-thumbnail image"></a> </div>';*/
                        }
                    ?>
                </div>
            </div>
        </section>
    

</div>
<?php
    include 'footer.inc.php';
?>

<!--
/* echo  
                                '<label>
                                <input type="checkbox" id="monCheckbox">
                                <div class="col-lg-3 grid-item"><a href="chess.php"><img src="' . $image . '" alt="Image" class="img-thumbnail image"></a> </div>
                                </label>';*/ 
                            
                            <button class="btn btn-outline bouton" name="submit" type="submit">
                            </button>
                            -->