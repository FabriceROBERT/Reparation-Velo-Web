<?php
require_once('function.php');

if(isset($_SESSION['current_user'])){
    $connecter=true;
    $current_user=$_SESSION['current_user'];
    $reparateur = $_SESSION['current_user']['reparateur'];
}
getMyDemandes($current_user['id']);
$myDemandes= $_SESSION['myDemandes'];





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
        <a href="acceuil.php">Acceuil</a>
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
      <h1 id="ins2">VOIR MES DEMANDES</h1>    
      <?php
      }
      ?>
    </div>
</nav>


    <?php
    if($myDemandes){

    foreach($myDemandes as $key=>$value){

    ?>
    <style>
      .boxservice {
        margin-top: 10%;
      }
    </style>
    <div class="card-body1" style="padding-right: 50px;padding-left: 50px; padding-top: 100px;">
        <img class="card-img-top img-responsive " src="<?php echo $value['img']; ?>" alt="Card image">
       
            <h2 class="card-title"><?php echo $value['titre']; ?></h2>
            <p class="card-title">Demande effectué le : <span class="text-primary"><?php echo date('Y-m-d',strtotime($value['date_demande'])).'</span>  ' ?></p>
            <p class="card-title">Status : <span class="text-success"><?php echo $value['etat_intervention'] ?></span></p>
            <p class="card-text">Réparateur : <?php echo $value['nom'].'  '.$value['tarif'] ?> euros</p>
            <p class="card-text">Intervention prévu pour le : <span class="text-primary"><?php echo date('Y-m-d',strtotime($value['date_intervention'])).'</span>  ' ?></p>
            <p class="card-text">Message : <?php echo $value['description'] ?></p>

          
            <?php
            if($value['etat_intervention']=='ENVOYEE'){
                ?>
                <a href="updatedemande.php?id=<?php echo $value['id']; ?>" class=" btn btn-warning">Modifier</a> 
                <?php
            }
            if($value['etat_intervention']=='ENVOYEE' || $value['etat_intervention']=='REFUSEE') {

                ?>
                <a href="deletedemande.php?id=<?php echo $value['id']; ?>" class=" btn btn-danger">Supprimer</a>
                <?php

            }
                ?>
        </div>
    </div>
        <?php


    }
    }
    ?>

</body>


</html>