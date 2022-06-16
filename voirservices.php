
<?php
  
  require_once('function.php');
    getAllServices();
  
  if(!isset($_SESSION["username"])){
  
    }
   
  ?>
  
  <?php
  
  if(isset($_SESSION['current_user'])){
    $connecter=true; 
    $reparateur = true;
    $current_user=$_SESSION['current_user'];
    $reparateur = $_SESSION['current_user']['reparateur'];
  
  }
  if(isset($_SESSION['all_services'])){
    $allservices=$_SESSION['all_services'];
    
  }
  
  $services = getServiceByReparateur($current_user['id']);
  
  ?>
  
  
  
  <!DOCTYPE html>
  <html>
    <head>
    <link rel="stylesheet" href="index.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
  <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
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
      <a href="mydemands.php">Mes demandes</a>
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
      <a href="mydemands.php">Voir mes demandes</a>
      <a href="demande.php">Nouvelle demande de réparation</a>
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
	else{

  
	?>
	<nav>
	<ul>

 

  <div class="dropdown">
    <button class="dropbtn">Profil
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="ajouterservice.php">Ajouter un service</a>
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
      <a href="mydemands.php">Voir mes demandes</a>
      <a href="voirservices.php">Voir les services</a>
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

	</nav>
  <div class="boxservice" >
	<?php
	} 
	?>
     
      <?php
  if($services){
      foreach($services as $key=>$value){
        
  ?>

    <div class="card-body" style="padding-right: 50px;padding-left: 50px;">
    <img class="card-img-top img-responsive " src="<?php echo $value['img']; ?>" alt="Card image">
 
      <h4 class="card-title"><?php echo $value['titre']; ?></h4>
      <p class="card-text"><?php echo $value['nom'].'  '.$value['tarif'] ?> euros</p>
      <a href="majservices.php?id=<?php echo $value['id']; ?>" class="btn btn-primary" style="text-decoration: none;color:teal">Modifier</a>
    </div>

  
  
  <?php
  
  
      }
  }
  ?>
    </div>
  
  
  
    </body>
  </html>