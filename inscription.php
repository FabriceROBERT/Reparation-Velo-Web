<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>




<body>
<?php
require_once("function.php");

if(isset($_POST['signin'])) {
  
	$data= $_POST;

  array_pop($data);
  array_pop($data);
	add_user($data);

}


?>
<nav>
        <ul>
            <li><img id="Logo" style="height:auto;width:auto;" src="https://img.icons8.com/external-inipagistudio-lineal-color-inipagistudio/64/000000/external-bike-bike-to-work-inipagistudio-lineal-color-inipagistudio-1.png"/></li>
            <li><a href="index.php"style="text-decoration:none;">Home Repair </a></li>
            <li>Rechercher un réparateur</li>
            <li>Qui sommes-nous ?</li>
            

        </ul>
    </nav>

    <h2 id="ins2">INSCRIPTION</h2>
    <div class="container">
  <form action="" method='post'>
<p>
    <input type="radio" name="sexe" id="sexe" value="h" checked="checked" >
    <label for="sexe">Homme</label>
    <input type="radio" name="sexe" id="sexe" value="f" >
    <label for="sexe">Femme</label>
</p>
      
      <label for="nom">Nom :</label>
      <p>
      <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" class="form-control" name="nom" required>
      </p>
      
      <label for="prenom">Prénom :</label>
      <p>
      <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prenom" class="form-control" name="prenom" required>
      </p>
      
      
      <label for="email">Email :</label>
      <p>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
      </p>

      
      <label for="pwd">Mot de passe :</label>
      <p>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
      </p>
    
     
      <label for="pwd2"> Confirmer le mot de passe :</label>
       <p>
      <input type="password" class="form-control" id="pwd2" placeholder="Enter password" name="password2" required>
      </p>

      <p>
      <label for="phone">Téléphone :</label>
      <br>
      <input type="text" class="form-control" id="phone" placeholder="Entrez votre numero" name="tel" required>
      </p>

      <p>
      <label for="adresse">Adresse :</label>
      <br>
      <input type="text" class="form-control" id="adresse" placeholder="Entrez votre adresse" name="adresse" required>
      </p>
      
       <p>
      <label for="cp">Code postal :</label>
     <br>
      <input type="text" class="form-control" id="cp" placeholder="Entrez votre CP" name="codepostal" required>
      </p>

      <p>
      <label for="ville">Ville :</label>
      <br>
      <input type="text" class="form-control" id="ville" placeholder="Entrez votre ville" name="ville" required>
      </p>
    <div class="checkbox">

    
      <label><input type="checkbox" name="remember" id="checked" required><a href="cg.html"> Accepter les Conditions Générales </a></label>
      
      </p>
    </div>

    <p>
    <button type="submit" class="form-control btn btn-success" name='signin'>S'inscrire</button>

    <p style="text-algn:center;">Déja inscrit? <a href='connexion.php' >Me connecter </a>
    </p>
</div>
</form>
<script src="acceuil.js"></script>

</body>
</html>



