<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index2.css">

    <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>

</head>

<body>

<nav>
        <ul>


        
            <li><img src="https://img.icons8.com/external-inipagistudio-lineal-color-inipagistudio/64/000000/external-bike-bike-to-work-inipagistudio-lineal-color-inipagistudio-1.png"/></li>
       
            <li>Qui sommes-nous ?</li>
          
     <li><a href="connexion.php" style="text-decoration:none;color:#64dfdf" >Selectionner un service</a></li>


            <button class="inscription"> <span id="inscription"><a href="inscription.php" style="text-decoration:none; color: white;">Inscription </a></span></button>
            <button class="connexion"> <span id="connexion"><a href="connexion.php"style="text-decoration:none;color: white;">Connexion </a></span></button>
         
  

        </ul>
        </nav>

<div class="box1">


   
</div>

<img id="gif" src="giphy.gif"> 

<div class="exm">
    <h1>Bienvenue</h1>

</div>

</img>


<?php

    require("function.php");
    $adresse="";
    if(isset($_POST["submit"])) {
    $adresse= $_POST["adresse"];
  
}

?>








<div class="cmt" style="text-transform: uppercase;">Comment ça marche ?</div>
<section>
 






<div class="container reveal">

<div class="text-container">
  <div class="text-boxN2">
    <h3></h3>
   
<div class="explication">

<div class="rdv">
<h3>Prendre rendez-vous</h3>


</div>

<div class="repair">

<h3>Trouvez un réparateur près de chez vous !</h3>
</div>

<div class="neuf">
<h3>Recevez le comme neuf</h3>
</div>
</div>
</div>
</div>
</section>


 
<footer>
                <div id="footer">
                    <div class="a_propos">
                        <h2>À propos</h2>
                            <ul>
                                <li><a href="Citrus.html">Notre mission</a></li>
                                <li><a href="Citrus.html">Recrutement</a></li>
                                <li><a href="Citrus.html">Blog</a></li>
                            </ul>
                    </div>
                    <div class="service">
                        <h2>Services</h2>
                            <ul>
                                <li><a href="connexion.html">Réparation vélo</a></li>
                                <li><a href="Citrus.html">Réparation V.A.E</a></li>
                                <li><a href="connexion.html">Réparation de trotinette</a></li>
                                <li><a href="Citrus.html">Certification technique</a></li>
                            </ul>
                    </div>
                    <div class="liens_utiles">
                        <h2>Liens Utiles</h2>
                            <ul>
                                <li><a href="connexion.html">Questions fréquentes</a></li>
                                <li><a href="Citrus.html">Nos prix</a></li>
                                <li><a href="connexion.html">Témoignages</a></li>
                                <li><a href="Citrus.html">Devenir réparateur</a></li>
                            </ul>
                    </div>
                </div>
            </footer>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="index24.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>





</html>



