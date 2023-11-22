<?php
session_start();

// Valider et nettoyer l'ID
$id = isset($_GET['idJeux']) ? intval($_GET['idJeux']) : 0;
var_dump($id);
include("connpdo.php");

$chaineImage="Images/";
$chaineRegle="Regles/";
$chainePHP="temp/";

echo "1";

// Récupération du chemin du fichier regle associé au jeu dans la table "jeux"
$req="SELECT regle FROM jeux WHERE idJeux = ?";
$stmt=$pdo->prepare($req);
$stmt->bindParam('?', $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Si le chemin du fichier existe, on le supprime
if ($result && file_exists($chaineRegles.$result['regle'])) {
    unlink($chaineRegle.$result['regle']);
}
$stmt->closeCursor();

// Récupération du chemin du fichier image associé au jeu dans la table "jeux"
$req="SELECT image FROM jeux WHERE idJeux = ?";
$stmt=$pdo->prepare($req);
$stmt->bindParam(1, $id, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Si le chemin du fichier existe, on le supprime
if ($result && file_exists($chaineImage.$result['image'])) {
    unlink($chaineImage.$result['regle']);
}
$stmt->closeCursor();

// Récupération du chemin du fichier php associé au jeu dans la table "jeux"
$req="SELECT nom FROM jeux WHERE idJeux = ?";
$stmt=$pdo->prepare($req);
$stmt->bindParam(1, $id, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Si le chemin du fichier existe, on le supprime
if ($result && file_exists($chainePHP.$result['nom'])) {
    unlink($chainePHP.$result['nom']);
}
$stmt->closeCursor();


// Suppression du jeu de la base de données
$q_delete = $pdo->prepare("DELETE FROM jeux WHERE idJeux=?");
$q_delete->bindParam(1, $id, PDO::PARAM_INT);
$q_delete->execute();
$q_delete->closeCursor();


//echo "Jeu supprimé avec succès : " . $_POST['nomjeux'];
header("location:jeuAdmin.php");
?>

