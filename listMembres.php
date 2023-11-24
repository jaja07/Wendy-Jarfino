<?php
    
    require_once('roleAdmin.php');
    $titre = "liste des membres";
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
    <h1>Liste des membres</h1>

    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Dates</th>
                <th scope="col">Membres</th>
                <th scope="col">Accepter</th>
                <th scope="col">Refuser</th>
            </tr>
        </thead>
        <tbody>

            <?php
                
                $i = 1;

                //Connexion à la base de données
                include("connpdo.php");
                $req="SELECT creneau.date,user.nom,inscription.id FROM inscription INNER JOIN creneau ON creneau.idCreneau=inscription.idCreneau INNER JOIN user ON inscription.idUser=user.idUser";
                $stmt=$pdo->prepare($req);
                $stmt->execute();
                

                while ($row = $stmt->fetch() ) {
                    echo '<tr>';
                    echo '<th scope="row">' . $i . '</th>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>' . $row['nom'] . '</td>';
                    echo '<td><a href="accepter.php?id=' . $row['id'] . '" >Accepter</a></td>';
                    echo '<td><a href="refuser.php?id=' . $row['id'] . '" >Refuser</a></td>';
                    echo '</tr>';
                    $i++;
                }
            ?>
        </tbody>
    </table>

     

</div>