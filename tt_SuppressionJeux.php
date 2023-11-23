<?php

require_once('roleAdmin.php');
// Valider et nettoyer l'ID
$id = isset($_GET['idJeux']) ? intval($_GET['idJeux']) : 0;

var_dump($id);
include("connpdo.php");

$chaineImage="Images/";
$chaineRegle="Regles/";
$chainePHP="temp/";

echo "1";

// Récupération des chemins des fichiers regle, image et php associés au jeu dans la table "jeux"
$req="SELECT nom,regle,image FROM jeux WHERE idJeux = ?";
$stmt=$pdo->prepare($req);
$stmt->bindParam(1, $id, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Si le chemin du fichier existe, on le supprime
if ($result && file_exists($result['regle'])) {
    unlink($result['regle']);
}

// Si le chemin du fichier existe, on le supprime
if ($result && file_exists($result['image'])) {
    unlink($result['image']);
}

// Si le chemin du fichier existe, on le supprime
if ($result && file_exists($chainePHP.$result['nom'].'.php')) {
    unlink($chainePHP.$result['nom'].'.php');
}
$stmt->closeCursor();


// Suppression du jeu de la base de données
$q_delete = $pdo->prepare("DELETE FROM jeux WHERE idJeux=?");
$q_delete->bindParam(1, $id, PDO::PARAM_INT);
$q_delete->execute();
$q_delete->closeCursor();



//header("location:jeuAdmin.php");
?>

