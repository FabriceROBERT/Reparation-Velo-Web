<?php
require_once('function.php');
getAllServices();
if(isset($_SESSION['current_user'])){
	$connecter=true;
	$current_user=$_SESSION['current_user'];
	$reparateur = $_SESSION['current_user']['reparateur'];
}
$services = getServiceByReparateur($current_user['id']);

?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />


  <link rel="stylesheet" href="index.css" />
  
</head>
<body>

    
    
	<?php
	
	if(!$reparateur && $connecter){
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
      <a href="voirservices.php">Voir les services</a>
      <a href="ajouterservice.php">Ajouter service</a>
      <a href="#">Annuler une demande</a>
    </div>
  </div>
  
  <li>
  <a href="becomereparateur.php" id="Deconnexion">Devenir reparateur</a> 
  </li>

  <li>	
  <a href="index.php" id="Deconnexion">Conctact</a> 
  </li>
  <li>	
    <a href="index.php" id="Deconnexion">Deconnexion</a> 
    </li>
	</ul>
</nav>
    
	<?php
	}
    
	elseif($reparateur && $connecter){
		
	?>
    <nav>
	<ul>
    <div class="dropdown">
    <button class="dropbtn">Profil
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="acceuil.php">Voir mon profil</a>  
      <a href="#">Ajouter un service</a>
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
      <a href="service.php">Demande de réparation</a>
      <a href="#">Mes gains</a>
      <a href="#">Annuler une demande</a>
    </div>
  </div> 

  

      <li><a href="contact.php" style="text-decoration:none;"> Contact</a></li>

	
    
		<li ><a href="espacereparateur.php" style="text-decoration:none;">Home</a></li>



      <li id="Deconnexion"><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Deconnexion</a></li>
    
</ul>
</nav>
<?php
    }
?>
<h1 id="ins2">AJOUTER UN SERVICE</h1>
<div class="commander ">
<form action='' method='post' enctype="multipart/form-data">

<div class='form-group'>
<label> Titre de service </label>
<select name="Type" class="form-control" >
  <option value="Réparation de pneu" name="option0">Réparation de pneu</option>
  <option value="Controle technique" name="option1">Controle technique</option>
  <option value="Purge huile frein" name="option2">Purge huile frein</option>
  <option value="Remplacement câbles et gaines" name="option3">Remplacement câbles et gaines</option>
  <option value="Montage de vélo" name="option4">Montage de vélo</option>
</select>
</p>
</div>

<div class='form-group'>
<label> Descritpion de service </label><p>
<textarea name="description" class='form-control'>
</textarea>     
</p>
<p>
</div>

<div class='form-group'>
<label> Votre tarif  en euro</label>
<input type='number' step="any" class='form-control' name='tarif' min='0'/>
</p>
<p>
</div>

<div class='form-group'>
<label> Votre rayon d'intervention (en KM)</label>
<input type='number' class='form-control' name='rayon_intervention' min='0'/>
</div>
</p>
<p>

<div class='form-group'>
<label> Image to upload </label>
<input type='file' name='img' />
</div>
</p>

<button type='submit' class='form-control btn-large btn-success' name='add'>Ajouter</button>

</div>
</div>
</form>


<?php 
if(isset($_POST['add'])){
	$path_to_picture = uploadPicture($_FILES['img']);
	if(!$path_to_picture){
		echo "<label class='text-danger'> Uploader une image valide </label>";
	}
	else{
		// je recupere les infos envoyé dans le formulaire dans $data
		$data = $_POST;
		// je retire le dernier element (le bouton add)
		array_pop($data);
		// je rajoute le path et l'id de user dans $data
		array_push($data,intval($current_user['id']),$path_to_picture);
		// je transforme mon tableau $ data en un tableau indexé
		$indexed_data=array_values($data);
		// j'appel la fonction qui ajoute un service.
		addService($indexed_data);
	}
	
}


?>

</body>


</html>