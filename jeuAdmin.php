<?php
    session_start();
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
    ?>
    <h1>Accueil</h1>

    <table class="table">
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
                global $db;
                $i = 1;

                //Connexion à la base de données
                include("connpdo.php");
                $req="SELECT * FROM jeux ";
                $stmt=$pdo->prepare($req);
                $stmt->execute();
                
                

                /* Utilisation de "ORDER BY" pour ordonner les résultats par ID membre
                $req = $db->prepare("SELECT * FROM jeux INNER JOIN  imagejeux on(jeux.id_jeux=imagejeux.id_jeux_images)ORDER BY id_jeux");
                $req->execute();

                /*  $req1 = $db->prepare("SELECT * FROM imagejeux ORDER BY id_imagejeux");
                $req1->execute(); && $user1 = $req1->fetch()*/

                while ($user = $stmt->fetch() ) {
                    echo '<tr>';
                    echo '<th scope="row">' . $i . '</th>';
                    echo '<td>' . $user['idJeux'] . '</td>';
                    echo '<td>' . $user['nom'] . '</td>';
                    echo '<td>' . $user['description'] . '</td>';
                    echo '<td>' . $user['categorie'] . '</td>';
                    echo '<td>' . $user['regle'] . '</td>';
                    echo '<td>' . $user['image'] . '</td>';
                    echo '<td><a href="traitementUpdatejeux.php?idjeux=' . $user['idJeux'] . '&nomjeux=' . $user['nom'] . '&descriptions=' . $user['description'] . '&categorie=' . $user['categorie'] . '">Modifier</a></td>';
                    echo '<td><a href="traitementSupressionJeux.php?idjeux=' . $user['idJeux'] . '" >Supprimer</a></td>';
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