<?php
session_start();
    $titre = "Connexion";
    include 'header.inc.php';
    include 'menu.inc.php';
?>
<div class="container">
    <h1>Créneaux</h1>
    <?php
        if(isset($_SESSION['message'])) {
            if($_SESSION['message']=="Erreur de connexion")
            {echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            }else{echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';}
            echo $_SESSION['message'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['message']);
        }

        //Connexion à la base de données
                    include("connpdo.php");
                    $req="SELECT * FROM jeux ";
                    $stmt=$pdo->prepare($req);
                    $stmt->execute();
    ?>

    <form  method="POST" action="tt_addCreneau.php">
        <div class="container">
            <div class="row my-3">
                <div class="col-md-6">
                    <?php
                        echo '<label for="sel1" class="form-label">Sélectionner un jeu:</label>';
                        echo '<select class="form-select" id="sel1" name="sel1" required>';
                        while ($user = $stmt->fetch() ) {
                        echo'<option>'.$user['nom'].'</option>';
                        }
                        echo'</select>';
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                        echo '<label for="sel2" class="form-label">Date:</label>';
                        echo '<input type="date" class="form-control " id="sel2" name="sel2" placeholder="Choisissez une date ..." required>';
                    ?>
                </div>
            </div>
            <div class="row my-3">
                <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-primary" type="submit">Ajouter</button></div>   
            </div>
        </div>
    </form>
</div>

<?php
    include 'footer.inc.php';
?>