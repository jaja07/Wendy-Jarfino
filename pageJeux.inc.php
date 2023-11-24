<?php
// Ouvrir le fichier en mode écriture (créez-le s'il n'existe pas)
$nomComplet = 'temp/'.$nomFichier;
$handle = fopen($nomComplet, "w");

// Vérifier si l'ouverture du fichier a réussi
if ($handle) {
    // Le contenu de votre page dynamique
    $contenuPage = '<?php
    
    require_once(\'../roleMembre.php\');
    $titre = \'$nom\';
    include \'../header.inc.php\';
    include \'../menuMembre.inc.php\';


?>

<div class="container">


    <?php
    
         if(isset($_SESSION[\'message\'])) {
            echo \'<div class="alert alert-primary alert-dismissible fade show" role="alert">\';
            echo $_SESSION[\'message\'];
            echo \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\';
            echo \'</div>\';
            unset($_SESSION[\'message\']);
            }
    ?>
    <h1></h1>

    <table class="table table-dark table-hover">
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
                $n = isset($_GET[\'nomJeu\']) ? intval($_GET[\'nomJeu\']) : 0;
                //Connexion à la base de données
                include("../connpdo.php");
                $req="SELECT * FROM jeux WHERE nom = ?";
                $stmt=$pdo->prepare($req);
                $stmt->bindParam(1, $n, PDO::PARAM_INT);
                $stmt->execute();
                
                $i=1;
                while ($row = $stmt->fetch() ) {
                    echo \'<tr>\';
                    echo \'<th scope="row">\' . $i . \'</th>\';
                    echo \'<td>\' . $row[\'idJeux\'] . \'</td>\';
                    echo \'<td>\' . $row[\'nom\'] . \'</td>\';
                    echo \'<td>\' . $row[\'description\'] . \'</td>\';
                    echo \'<td>\' . $row[\'categorie\'] . \'</td>\';
                    echo \'<td><a href=../\'.$row[\'regle\'].\' target="_blank">Télécharger le PDF</a></td>\';
                    echo \'</tr>\';
                    $i++;
                }
            ?>
        </tbody>
    </table>
</div>';

    // Écrire le contenu dans le fichier
    fwrite($handle, $contenuPage);

    // Fermer le fichier
    fclose($handle);

    echo "La page dynamique a été créée avec succès!";
} else {
    echo "Erreur lors de l'ouverture du fichier.";
}
?>