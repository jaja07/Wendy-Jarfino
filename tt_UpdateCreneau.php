<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Creation jeux</title>
</head>
<body>
<?php
    require 'navbar.html';
    ?>
<div class="container">
<h1>Modification d'un Jeux </h1>
<form  method ="post" action="" enctype="multipart/form-data">
    <div class="container">
    <div class="row my-3">
       <div class="row">

        <div class="col-md-6">
            <label for="nomjeux" class="form-label">Nom de jeux</label>
            <input type="text" class="form-control " id="nomjeux" name="nomjeux" placeholder="Nom du jeux..." required>
        </div>

        <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control " id="description" name="description" placeholder="description..." required>
        </div>

        <div class="col-md-6">
            <label for="categorie" class="form-label">Categorie</label>
            <input type="text" class="form-control " id="categorie" name="categorie" placeholder="Categorie..." required>
        </div>


        <div class="col-md-6">
            <label class="form-label">Images du jeux</label>
            <input type="file" name="imagejeux" class="form-control" required>
        </div>

        <div class="col-md-6">
             <label  class="form-label">Regles du jeux </label>
            <input type="file" name="userfile" class="form-control" />
 
        </div>

       </div>
        <div class="row my-3">
        <div class="d-grid gap-2 d-md-block">
            <button class="btn btn-outline-primary" name ="formsend1" type="submit">
                Modifier

            </button>
        </div>   
        </div>
    </div>
</form>
</div>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('connection.php');

// Valider et nettoyer l'ID
$id = isset($_GET['idjeux']) ? intval($_GET['idjeux']) : 0; 
//echo "1";
if(isset($_POST['formsend1']))
{
  $nomjeux = $_POST['nomjeux'];
  $descriptions = $_POST['description'];
  $categorie = $_POST['categorie'];               
  $userfile = $_FILES['userfile']['name'];
  $imagejeux = $_FILES['imagejeux']['name'];

  global $db;

    $options = [
      'cost' => 12,
      ];
  $chainejeux="../images/";
  $chaineregles="../regles_jeux/";

//echo "1";

// Récupération du chemin du fichier associé au jeu dans la table "jeux"
  $q = $db->prepare("SELECT regles FROM jeux WHERE id_jeux = ?");
  $q->bindParam(1, $id, PDO::PARAM_INT);
  $q->execute();
  $result = $q->fetch(PDO::FETCH_ASSOC);

  // Si le chemin du fichier existe, on le supprime
  if ($result && file_exists($chaineregles.$result['regles'])) {
    unlink($chaineregles.$result['regles']);
  }

  $q->closeCursor();  

  // Récupération du chemin du fichier associé au jeu dans la table "imagejeux"
  $q1 = $db->prepare("SELECT images FROM imagejeux WHERE id_jeux_images = ?");
  $q1->bindParam(1, $id, PDO::PARAM_INT);
  $q1->execute();
  $result1 = $q1->fetch(PDO::FETCH_ASSOC);

  // Si le chemin du fichier existe, on le supprime
  if ($result1 && file_exists($chainejeux.$result1['images'])) {
    unlink($chainejeux.$result1['images']);
    }

  $q1->closeCursor();
  /* echo "Chemin du fichier jeu : " . $chaineregles.$result['regles'] . "<br>";
echo "Chemin du fichier imagejeux : " . $chaineregles.$result1['images'] . "<br>";
echo "Chemin du fichier imagejeux : " . $result1 && file_exists($result1['images']) . "<br>";

var_dump($result);
var_dump($result1); */

  $fichierTempuserfile=$_FILES['userfile']['tmp_name'];//recupérer le nom du fichier temporaire téléchargé sur le serveur.    
  move_uploaded_file($fichierTempuserfile,'../regles_jeux/'.$userfile);

  $fichierTempimagesjeux=$_FILES['imagejeux']['tmp_name'];//recupérer le nom du fichier temporaire téléchargé sur le serveur.
  move_uploaded_file($fichierTempimagesjeux,'../images/'.$imagejeux);
// Modification des éléments de la table jeu de la base de données


$q_update = $db->prepare("UPDATE jeux 
SET  nom_jeux = :nomjeux,
   descriptions = :descriptions,
   categorie = :categorie,
   regles = :userfile
WHERE id_jeux = :id");

$q_update->bindParam(':nomjeux', $nomjeux);
$q_update->bindParam(':descriptions', $descriptions);
$q_update->bindParam(':categorie', $categorie);
$q_update->bindParam(':userfile', $userfile);
$q_update->bindParam(':id', $id);

$q_update->execute();



// Suppression de l'entrée associée dans la table "imagejeux"
  $q1_update = $db->prepare("UPDATE imagejeux 
    SET  images = :imagejeux
    WHERE id_jeux_images=:id");

$q1_update->bindParam(':imagejeux', $imagejeux);
$q1_update->bindParam(':id', $id);
$q1_update->execute();
//echo "Jeu modifiéé avec succès : " . $_POST['nomjeux'];
  header("location:list.php");
  }
  else {
    echo"Probleme";
    }

?>
</body>
</html>

