<?php
include 'param.inc.php';
// Initialisation de la connexion
$connexion = new mysqli($host, $login, $passwd, $dbname);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $categorie = $_POST['categorie'];

    // Charger la règle depuis le fichier
    $regle_contenu = file_get_contents($_FILES['regle']['tmp_name']);

    // Charger l'image depuis le fichier
    $image_contenu = file_get_contents($_FILES['image']['tmp_name']);

    // Préparer la requête SQL avec une déclaration préparée
    $stmt = $connexion->prepare("INSERT INTO jeux (nom, description, categorie, regle, image) VALUES (?, ?, ?, ?, ?)");

    // Liaison des paramètres
    $stmt->bind_param("sssss", $nom, $description, $categorie, $regle_contenu, $image_contenu);

    // Exécution de la requête
    if ($stmt->execute()) {
        echo "Le jeu a été ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du jeu : " . $stmt->error;
    }

    // Fermeture de la déclaration
    $stmt->close();
}

// Fermeture de la connexion à la base de données
$connexion->close();
?>
