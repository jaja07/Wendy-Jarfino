<?php
    session_start();
    $titre = "Welcome";
    include 'header.inc.php';
    include 'menu.inc.php';


?>
<style>
      body {
        background-color: midnightblue ;
      }
      h1 {
	color: white;
         }
        
</style>


<div class="container-fluid">


<?php
    if(isset($_SESSION['message'])) {
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
        echo $_SESSION['message'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        unset($_SESSION['message']);
    }
?>
       <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="photos/chess.jpg" alt="Chess" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="photos/dames.jpg" alt="Dames" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="photos/Loup Garou.jpg" alt="Loup Garou" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="photos/Ludo.jpg" alt="Ludo" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="photos/Mancala.jpg" alt="Mancala" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="photos/Monopoly.jpg" alt="Monopoly" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="photos/Uno.jpg" alt="Uno" class="d-block w-100">
    </div>
  </div>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
        

</div>
<?php
    include 'footer.inc.php';
?>

<!-- 
     <h1>ESIG'GAMES</h1>
        <p>
            <a href="./invite/cartes.php"> <img class="left" 
             src="photos\cartes.PNG" width="250" height="150" 
             alt="cartes" title="" style="float:left;margin:10px 100px 50px 20px;" />
            </a>

            <a href="./invite/marelle.php"><img class="left" 
             src="photos\marelle.PNG" width="250" height="150" 
             alt="marelle" title="" style="float:left;margin:10px 100px 50px 20px;" />
            </a>

             <a href="./invite/mancala.php"><img class="left" 
             src="photos\mancala.PNG" width="250" height="150" 
             alt="mancala" title="" style="float:left;margin:10px 100px 50px 20px;" />
             </a>

             <a href="./invite/echecs.php"><img class="center" 
             src="photos\echecs.PNG" width="250" height="150" 
             alt="echecs" title="" style="float:center;margin:10px 100px 50px 20px;" />
             </a>

             <a href="./invite/ludo.php"><img class="center" 
             src="photos\ludo.PNG" width="250" height="150" 
             alt="ludo" title="" style="float:center;margin:10px 100px 50px 20px;" />
             </a>
             
             <a href="./invite/uno.php"><img class="center" 
             src="photos\uno.PNG" width="250" height="150" 
             alt="uno" title="" style="float:center;margin:10px 100px 50px 20px;" />
             </a>

             <a href="./invite/dames.php"><img class="right" 
             src="photos\dame.PNG" width="250" height="150" 
             alt="dames" title="" style="float:center;margin:10px 100px 50px 20px;" />
             </a>

             <a href="./invite/monopoly.php"><img class="right" 
             src="photos\monopoly.PNG" width="250" height="150" 
             alt="monopoly" title="" style="float:center;margin:10px 100px 50px 20px;" />
             </a>

             <a href="./invite/loupGarou.php"><img class="right" 
             src="photos\loup garou.PNG" width="250" height="150" 
             alt="loup garou" title="" style="float:center;margin:10px 100px 50px 20px;" />
            </a>
            </p>
-->