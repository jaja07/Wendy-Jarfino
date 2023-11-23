<?php
    require_once('roleAdmin.php');
    $titre = "Ajouter des jeux";
    include 'header.inc.php';
    include 'menuAdmin.inc.php';

    // Valider et nettoyer l'ID
    $id = isset($_GET['idJeux']) ? intval($_GET['idJeux']) : 0;

    // Récupération du chemin du fichier regle associé au jeu dans la table "jeux"
    include("connpdo.php");
    $req="SELECT * FROM jeux WHERE idJeux = ?";
    $stmt=$pdo->prepare($req);
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);   
?>


<div class="container">
<h1>Ajouter un Jeu</h1>
<form method="POST" action="tt_UpdateJeux.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
    <div class="container">
        <!-- Nom du jeu -->
        <div class="row my-3">
            <div class="col-md-12">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $result['nom']; ?>" required>
            </div>
        </div>
        
        <!-- Description du jeu -->
        <div class="row my-3">
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"  required><?php echo $result['description']; ?></textarea> 
            </div>
        </div>
        
        <!-- Catégorie du jeu -->
        <div class="row my-3">
            <div class="col-md-12">
                <label for="categorie" class="form-label">Catégorie :</label>
                <input type="text" class="form-control" id="categorie" name="categorie" value="<?php echo $result['categorie']; ?>" required>
            </div>
        </div>
        <!-- Regle du jeu -->
        <div class="row my-3">
            <div class="col-md-12">
                <label for="regle" class="form-label">Règle :</label>
                <input type="file" id="regle" name="regle" class="form-control">
            </div>
        </div>

        <!-- Image du jeu -->
        <div class="row my-3">
            <div class="col-md-12">
                <label for="image" class="form-label">Image :</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
        </div>

         <div class="row my-3">
            <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-primary" name="submit" type="submit">Valider</button></div>   
        </div>


    </div>
</form>
</div>
<?php
    include 'footer.inc.php';
?>