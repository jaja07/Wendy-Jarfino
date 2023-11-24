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
    <h1>Liste des jeux</h1>

    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Jeux</th>
                <th scope="col">Nom Jeux</th>
                <th scope="col">Descriptions</th>
                <th scope="col">Categorie</th>
                <th scope="col">Regles</th>
                <th scope="col">Images</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>

            <?php
                
                $i = 1;

                //Connexion à la base de données
                include("connpdo.php");
                $req="SELECT * FROM jeux ";
                $stmt=$pdo->prepare($req);
                $stmt->execute();
                

                while ($user = $stmt->fetch() ) {
                    echo '<tr>';
                    echo '<th scope="row">' . $i . '</th>';
                    echo '<td>' . $user['idJeux'] . '</td>';
                    echo '<td>' . $user['nom'] . '</td>';
                    echo '<td>' . $user['description'] . '</td>';
                    echo '<td>' . $user['categorie'] . '</td>';
                    echo '<td>' . $user['regle'] . '</td>';
                    echo '<td>' . $user['image'] . '</td>';
                    echo '<td><a href="updateJeux.php?idJeux=' . $user['idJeux'] . '" >Modifier</a></td>';
                    echo '<td><a href="tt_SuppressionJeux.php?idJeux=' . $user['idJeux'] . '" >Supprimer</a></td>';
                    echo '</tr>';
                    $i++;
                }
            ?>
        </tbody>
    </table>

     <button type="button" class="btn btn-outline" style="float:right">
        <a  href="addGame.php">Ajouter</a>
    </button>

</div>