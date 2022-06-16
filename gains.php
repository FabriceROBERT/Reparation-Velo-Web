<?php
require_once('function.php');
getAllServices();
if(isset($_SESSION['current_user'])){
    $connecter=true;
    $current_user=$_SESSION['current_user'];
    $reparateur = $_SESSION['current_user']['reparateur'];
}
$mesgains = getGains($current_user['id']);
$nombre= getTotal($current_user['id']);


?>
<html lang="en">
<head>
    <title>Espace réparateur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="index.css" />

</head>
<body>

        <?php

if(!$reparateur){ 
    ?>
<nav>
    <ul>

<div class="dropdown">
<button class="dropbtn">Profil
  <i class="fa fa-caret-down"></i>
</button>
<div class="dropdown-content">
<a href="acceuil.php">Acceuil</a>
  <a href="#">Mes demandes</a>
  <a href="#">Mes coordonnées</a>
  <a href="#">Aide</a>
  <a href="#">Application mobile</a>
</div>
</div>

<div class="dropdown">
<button class="dropbtn">Mes demandes
  <i class="fa fa-caret-down"></i>
</button>
<div class="dropdown-content">
  <a href="#">Voir mes demandes</a>
  <a href="demande.php">Nouvelle demande de réparation</a>
  <a href="#">Annuler une demande</a>
</div>
</div>

<li>
<a href="becomereparateur.php" id="Deconnexion">Devenir reparateur</a> 
</li>

<li>	
<a href="index.php" id="Deconnexion">Conctact</a> 
</li>
</ul>
</nav>
<?php
}
else{


?>
<nav>
<ul>



<div class="dropdown">
<button class="dropbtn">Profil
  <i class="fa fa-caret-down"></i>
</button>
<div class="dropdown-content">
  <a href="acceuil.php">Acceuil</a>
  <a href="#">Mes demande</a>
  <a href="#">Mes coordonnées</a>
  <a href="#">Aide</a>
  <a href="#">Application mobile</a>
</div>
</div>

<div class="dropdown">
<button class="dropbtn">Mes demandes
  <i class="fa fa-caret-down"></i>
</button>
<div class="dropdown-content">
  <a href="#">Voir mes demandes</a>
  <a href="#">Voir mes services</a>
  <a href="service.php">Demande de réparation</a>
  <a href="#">Mes gains</a>
  <a href="#">Annuler une demande</a>
</div>
</div> 

<li>
<a href="ajouterservice.php" style="text-decoration:none;">Proposer un service</a> 
</li>

<li>
<a href="contact.php" id="Deconnexion"><span></span> Contact</a>
</li>

<li>	
<a href="index.php" id="Deconnexion">Deconnexion</a> 
</li>
</ul>
     
    </div>
</nav>
<?php
	}
	?>

<section class="container">


    <div class="d-flex justify-content-between bg-secondary">
        <div class="bg-info">Bonjour <u>  <?php

    echo ($nombre);
    var_dump($nombre);


                echo ($mesgains['nom']);
                ?></u>
            : votre compte est à <span class="text-success"><?php

                echo ($mesgains['gain']);
                ?> € </span></div>
     


    </div>
</section>

</body>


</html>