<?php
    
    require_once('roleAdmin.php');
    $titre = $nom;
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
    <h1></h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Jeux</th>
                <th scope="col">Nom Jeux</th>
                <th scope="col">Descriptions</th>
                <th scope="col">Categorie</th>
                <th scope="col">Regles</th>
            </tr>
        </thead>
        <tbody>

            <?php
                
                $i = 1;

                //Connexion à la base de données
                $req="SELECT * FROM jeux WHERE nom = ?";
                $stmt=$pdo->prepare($req);
                $stmt->bindParam(1, $nom, PDO::PARAM_INT);
                $stmt->execute();
                

                while ($row = $stmt->fetch() ) {
                    echo '<tr>';
                    echo '<th scope="row">' . $i . '</th>';
                    echo '<td>' . $row['idJeux'] . '</td>';
                    echo '<td>' . $row['nom'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td>' . $row['categorie'] . '</td>';
                    echo '<a href='.$row['regle'].' target="_blank">Télécharger le PDF</a>';
                    echo '</tr>';
                    $i++;
                }
            ?>
        </tbody>
    </table>
</div>