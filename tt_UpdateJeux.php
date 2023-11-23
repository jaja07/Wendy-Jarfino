<?php
require_once("roleAdmin.php");
 
$id = $_GET['id'];
 
$nom = htmlentities($_POST['nom']);
$categorie = htmlentities($_POST["categorie"]);
$description = htmlentities($_POST["description"]);
 
// Initialisez les chemins relatifs

 
// Connexion :
include("connpdo.php");
    $req="SELECT * FROM jeux WHERE idJeux = ?";
    $stmt1=$pdo->prepare($req);
    $stmt1->bindParam(1, $id, PDO::PARAM_INT);
    $stmt1->execute();
    $result = $stmt1->fetch(PDO::FETCH_ASSOC); 

    var_dump($id,$nom,$categorie,$description,$result['regle'],$result['image']);
 
// Récupérez les chemins relatifs actuels depuis la base de données
if ($result) {
    $ancienCheminRegle = $result['regle'];
    $ancienCheminImage = $result['image'];
    $cheminRelatifRegle = $ancienCheminRegle;
    $cheminRelatifImage = $ancienCheminImage;
    $stmt1->closeCursor();
}
 
// Mettez à jour la ligne dans la table "jeu"
if ($stmt = $pdo->prepare("UPDATE jeux SET nom=?, description=?, categorie=?, regle=?, image=? WHERE idJeux=?")) {
    $stmt->bindParam(1, $nom);
    $stmt->bindParam(2, $description);
    $stmt->bindParam(3, $categorie);
    $stmt->bindParam(4, $cheminRelatifRegle);
    $stmt->bindParam(5, $cheminRelatifImage);
    $stmt->bindParam(6, $id);
 
    // Supprimez les anciens fichiers si de nouveaux fichiers sont téléchargés
    if (isset($_FILES["regle"]) && $_FILES["regle"]["error"] == UPLOAD_ERR_OK) {
        if (file_exists($ancienCheminRegle)) {
            unlink($ancienCheminRegle); //Suppression de l'ancien fichier
        }
        $regleTemp=$_FILES['regle']['tmp_name'];//recupérer le nom du fichier temporaire regle téléchargé sur le serveur.
        $typesAutorises = ['application/pdf', 'image/jpeg', 'image/png']; // Exemple : autoriser les fichiers PDF, JPEG et PNG; les valeurs dans ce tableau correspondent aux types MIME (Multipurpose Internet Mail Extensions)
        if (in_array($_FILES['regle']['type'], $typesAutorises)) {
            move_uploaded_file($regleTemp,'Regles/'.$nom.'.pdf');//transférer le fichier dans le dossier regles du projet      
        } else {
            echo "Type de fichier non autorisé.";
        }
        $cheminRelatifRegle ='Regles/'.$nom.'.pdf';
        var_dump($cheminRelatifRegle);
    }
 
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        if (!empty($ancienCheminImage) && file_exists($ancienCheminImage)) {
            unlink($ancienCheminImage); //Suppression de l'ancien fichier
        }
        $imageTemp=$_FILES['image']['tmp_name'];//recupérer le nom du fichier temporaire regle téléchargé sur le serveur.
        $typesAutorises = ['application/pdf', 'image/jpeg', 'image/png']; // Exemple : autoriser les fichiers PDF, JPEG et PNG; les valeurs dans ce tableau correspondent aux types MIME (Multipurpose Internet Mail Extensions)
        if (in_array($_FILES['image']['type'], $typesAutorises)) {
            move_uploaded_file($imageTemp,'Images/'.$nom.'.png');//transférer le fichier dans le dossier regles du projet      
        } else {
            echo "Type de fichier non autorisé.";
        }
        $cheminRelatifImage='Images/'.$nom.'.png';
        var_dump($cheminRelatifImage);
    }
 
    // Exécutez la mise à jour
    if ($stmt->execute()) {
        $_SESSION['message'] = "Mise à jour réussie";
    } else {
        $_SESSION['message'] = "Impossible de mettre à jour";
    }
 
     $stmt->closeCursor();
}
 
// Redirection vers la page des listes de jeux
//header("location:jeuAdmin.php");
?>


