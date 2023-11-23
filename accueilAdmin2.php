<?php
   require_once('roleAdmin.php');
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

    

</div>