<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

  <link rel="stylesheet" href="index.css" />



    <title>Document</title>
</head>
<body>


<?php

require_once("function.php");

if(isset($_SESSION['current_user'])){
	$connecter=true;
	$current_user=$_SESSION['current_user'];
  $reparateur = $_SESSION['current_user']['reparateur'];
  $id_service = $_GET['id'];
$service = getServiceById($id_service);

}

else {
  $connecter=false;
}
?> 

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
  
        
      <?php
      }
      ?>



</ul>
   
<?php
$id_service = $_GET['id'];
$service = getServiceById($id_service);

?>

<div class="commander">

  <img class="card-img-top img-responsive " src="<?php echo $service['img']; ?>" alt="Card image">
  <div class="card-body">
    <h4 class="card-title"><?php echo $service['titre']; ?></h4>
    <p class="card-text"><?php echo $service['nom'].'  '.$service['tarif'] ?> euros</p>
    <p id='adr'><?php echo $service['adresse']." ".$service['ville']." ".$service['codepostal'] ; ?></p>
  </div>

 <div class="card-body">
  <p ><?php echo $service['description'] ; ?></p>
  <p> J'interviens dans un rayon de <?php echo $service['rayon_intervention'] ; ?> km de mon adresse
</div>
<form action="#" method='post'>
<div class='form-group'>
<label>Date de l'intervention </label>
<input type="date" class='form-control' value ="<?php echo date('Y-m-d'); ?>" name="date_intervention" required/>
<label>Date de l'intervention </label>
<input type="time" class='form-control' value ="<?php echo time(); ?>" name="heure_intervention" />
    </div>
    <div class='form-group'>
        <label>Adresse si different de votre adresse </label>
        <input type="text" class='form-control' name="adresse_intervention" value="<?php echo $current_user['adresse'].' '.$current_user['ville'].' '.$current_user['codepostal'] ?>" required/>
    </div>
<div class='form-group'>
<label> Votre Message </label>
<textarea class='form-control' name='message' required>

</textarea>
</div>

<div class='form-group'>

<button type='submit' class='form-control btn btn-primary' name="send">Envoyer </button>
</div>
</form>
</div>
    </div>


<?php

if(isset($_POST['send'])){



  $data= $_POST;

  array_pop($data);
  array_push($data,$_GET['id']);
  $indexed_data=array_values($data);


  commander($indexed_data);



//   $data= $_POST;

//     array_pop($data);
//     array_push($data,$_GET['id']);
//     $indexed_data=array_values($data);
var_dump($indexed_data);

//     commander($indexed_data);
  

}

?>
</div>
</body>
</html>
