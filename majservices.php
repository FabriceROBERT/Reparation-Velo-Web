<?php
require_once('function.php');
getAllServices();
if(isset($_SESSION['current_user'])){
    $connecter=true;
    $current_user=$_SESSION['current_user'];
    $reparateur = $_SESSION['current_user']['reparateur'];
}
$id_service=$_GET['id'];
$service = getServiceById($id_service);


?>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
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
  
      </nav>
      <h1 id="ins2">VOIR LES SERVICES</h1>    
      <?php
      }
      ?>
      <style>
        input, textarea {
          padding: 50px;
          text-align: left;
        }
        
      </style>
    <form action='' method='post' enctype="multipart/form-data">
        <div class="boxmaj">
        <legend> Modifier un service </legend>
       
            <label> Tire de service </label>
            <input type='text' name='titre' placeholder="Tire de votre service" class='form-control' value="<?php echo $service['titre']?>" />
    
            <label> Descritpion de service </label>
            <textarea style="text-align:left;" name="description" class='form-control'>
            <?php echo $service['description']?>
            </textarea>
        
            <label> Votre tarif  en euro</label>
            <input type='number' class='form-control' name='tarif' min='0' value="<?php echo $service['tarif']?>"/>
        
            <label> Votre rayon d'intervention (en KM)</label>
            <input type='number' class='form-control' name='rayon_intervention' min='0' value="<?php echo $service['rayon_intervention']?>"/>
            <br>
            <img src ="<?php echo $service['img']; ?>" alt="image service "/>
            
            <label> Modifier l'image </label>
            <input type='file' class='form-control' name='img' />
            <br>
   
            <button type='submit' class='form-control btn-large btn-success' name='update'>Modifier</button>

        </div>
    </form>


<?php
if(isset($_POST['update'])){
 $path_to_picture = uploadPicture($_FILES['img']);
  if(!$path_to_picture){

      $path_to_picture=$service['img'];
      $data = $_POST;
      // je retire le dernier element (le bouton add)
      array_pop($data);
      // je rajoute le path et l'id de user dans $data
      array_push($data,$path_to_picture,intval($service['id']));
      // je transforme mon tableau $ data en un tableau indexé
      $indexed_data=array_values($data);
      // j'appel la fonction qui ajoute un service.
      updateService($indexed_data);
   
  } 
 
else {
      // je recupere les infos envoyé dans le formulaire dans $data
      $data = $_POST;
      // je retire le dernier element (le bouton add)
      array_pop($data);
      // je rajoute le path et l'id de user dans $data
      array_push($data,$path_to_picture,intval($service['id']));
      // je transforme mon tableau $ data en un tableau indexé
      $indexed_data=array_values($data);
      // j'appel la fonction qui ajoute un service.
      updateService($indexed_data);
    
}

      
}

?>

</body>


</html>