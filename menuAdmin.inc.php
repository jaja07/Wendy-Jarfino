<nav class="navbar navbar-expand-md bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Esigelec</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarText">
        <!-- Eléments à gauche -->
      <ul class="navbar-nav me-auto mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="page.php">Une page</a>
            </li>
      </ul>

      <!-- Eléments à droite -->
      <ul class="navbar-nav mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="jeuAdmin.php">Jeu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="creneauAdmin.php">Créneaux</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="membreAdmin.php">Membres</a>
            </li>
      </ul>

    </div>
  </div>
</nav>

<style>
    li{
        position: relative;
    }

    li a:hover{
        background-color: black;
        color: white;
    }

    li:hover .sub-menu {
        display: block;
    }

    .sub-menu {
        display: none;
        position: absolute;
    }
</style>