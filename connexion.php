<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />   
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<body>
<?php
include ("function.php");

?>


<nav>
        <ul>
            <li><img style="height:auto;width:auto;" src="https://img.icons8.com/external-inipagistudio-lineal-color-inipagistudio/64/000000/external-bike-bike-to-work-inipagistudio-lineal-color-inipagistudio-1.png" ></li>
            
            <li><a href="demande.php">Se faire réparer</a></li>
            <li>Qui sommes-nous ?</li>

            <button class="connexion"> <span id="connexion"><a href="index.php"style="text-decoration:none;">Home Repair </a></span></button>
   
   
   
   
        </ul>
    </nav>

<H3 id="con2">Connexion</H3>

    <form method="post" action="">

    <div class="formulaire">
    
    <label for="Email_1"> Email :</label>
    <p>
    <input type="text" name="Email_1" class="form-control" required>
    </p>
    
        <label for="password"> Mot de passe :</label>
        <p>
    <input type="password" name="password" class="form-control" id="password"required>
         
</p>
          <button type="submit" id="submit" class="form-control btn btn-success" name="login" >Connexion</button>

          <p>
  <span>Nouveau compte  </span><a href='inscription.php' class='text-primary' >S'inscrire </a>
  </p>

</div>
</form>



<?php

if(isset($_POST["login"]))
{

 $email = $_POST["Email_1"];
 $mdp = $_POST["password"];
 connect_user($email,$mdp);
 

}
?> 

<script src="index24.js"></script>
</body>


</html>
