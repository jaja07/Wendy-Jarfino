<?php
    session_start();
    $titre = "Welcome";
    include 'header.inc.php';
    include 'menu.inc.php';


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
        <a href="addGame.php" class="btn btn-outline-primary"></a>
        <!-- Liste des jeux -->
        <section class="container">
            <div class="container-md grille">
                <div class="row line">
                     <?php
                        /*
                        include 'param.inc.php';

                        // Initialisation de la connexion à la base de données
                        $connexion = new mysqli($host, $login, $passwd, $dbname);

                        if ($connexion->connect_error) {
                            die("La connexion à la base de données a échoué : " . $connexion->connect_error);
                        }

                         // Récupération des images depuis la base de données
                        $result = $connexion->query("SELECT image FROM jeux");

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                /* Affichage de l'image 
                                La fonction base64_encode convertie l'image depuis sa représentation binaire stockée dans la BDD en une URL de data
                                echo '<div class="col-lg-3 grid-item"><a href="chess.php"><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Image" class="img-thumbnail image"></a> </div>';
                                
                            }
                        } else {
                            echo "Aucune image trouvée dans la base de données.";
                        }

                        // Fermeture de la connexion à la base de données
                        $connexion->close();*/

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