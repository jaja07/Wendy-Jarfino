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

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Créneaux</th>
                <th scope="col">Jeux</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>

            <?php
                
                $i = 1;

                //Connexion à la base de données
                include("connpdo.php");
                $req="SELECT date,nom FROM creneau NATURAL JOIN jeux ";
                $stmt=$pdo->prepare($req);
                $stmt->execute();
                

                while ($creneaux = $stmt->fetch() ) {
                    echo '<tr>';
                    echo '<th scope="row">' . $i . '</th>';
                    echo '<td>' . $creneaux['date'] . '</td>';
                    echo '<td>' . $creneaux['nom'] . '</td>';
                    echo '<td><a href="tt_UpdateCreneau.php">Modifier</a></td>';
                    echo '<td><a href="tt_SuppressionCreneau.php" >Supprimer</a></td>';
                    echo '</tr>';
                    $i++;
                }
            ?>
        </tbody>
    </table>

     <button type="button" class="btn btn-outline" style="float:right">
        <a  href="addCreneau.php">Ajouter</a>
    </button>

</div>