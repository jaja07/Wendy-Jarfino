<?php
require_once('roleAdmin.php');

$nom = htmlentities($_POST['nom']);
$description = htmlentities($_POST['description']);
$categorie = htmlentities($_POST['categorie']);

$regle=$_FILES['regle']['name'];//recupérer le nom original du fichier regle tel que sur la machine du client web 
$image=$_FILES['image']['name'];//recupérer le nom original du fichier image tel que sur la machine du client web

$regleTemp=$_FILES['regle']['tmp_name'];//recupérer le nom du fichier temporaire regle téléchargé sur le serveur.
$imageTemp=$_FILES['image']['tmp_name'];//recupérer le nom du fichier temporaire image téléchargé sur le serveur.

// Validation des fichiers
$typesAutorises = ['application/pdf', 'image/jpeg', 'image/png']; // Exemple : autoriser les fichiers PDF, JPEG et PNG; les valeurs dans ce tableau correspondent aux types MIME (Multipurpose Internet Mail Extensions)

if (in_array($_FILES['regle']['type'], $typesAutorises) && in_array($_FILES['image']['type'], $typesAutorises)) // Vérifie si on retrouve dans le tableau $typesAutorises les valeaurs des variables $_FILES['regle']['type']
{
move_uploaded_file($regleTemp,'Regles/'.$nom.'.pdf');//transférer le fichier dans le dossier regles du projet
move_uploaded_file($imageTemp,'Images/'.$nom.'.png');//transférer le fichier dans le dossier Images du projet
} else {
    echo "Type de fichier non autorisé.";
}


//Connexion à la base de données
include("connpdo.php");
$req="INSERT INTO jeux (nom, description, categorie, regle, image) VALUES (:nom, :description, :categorie, :regle, :image)";
$stmt=$pdo->prepare($req);
$nouveau_nom_regle='Regles/'.$nom.'.pdf';
$nouveau_nom_image='Images/'.$nom.'.png';
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':categorie', $categorie);
$stmt->bindParam(':regle', $nouveau_nom_regle);
$stmt->bindParam(':image', $nouveau_nom_image);

if($stmt->execute()) {
$_SESSION['message'] = "Ajout réussi.";
// Création du fichier php
$nomFichier = $nom.'.php';
$GLOBALS['n'] = $nom;
include 'pageJeux.inc.php';
header("location:jeuAdmin.php");
// Fin de création du fichier
} else {  $_SESSION['message'] = "Problème Ajout.";
    header("location:jeuAdmin.php");  }

    

?> 
