
<html lang="en">
<head>
    <title>Espace réparateur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .card{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php
require_once('function.php');
getAllServices();
if(isset($_SESSION['current_user'])){
    $connecter=true;
    $current_user=$_SESSION['current_user'];
    $reparateur = $_SESSION['current_user']['reparateur'];
}
//updateDemandeReparateurStatus($current_user['id']);
$demandes_reparateur = getMesDemandesReparateur($current_user['id']);


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



    </div>
</nav>
<style>
.boxservice {
    padding: auto;
    /* display:flex;
    flex-wrap:wrap; */
}

</style>
<div class='boxservice'>

    <?php
    if($demandes_reparateur){
        foreach($demandes_reparateur as $key=>$value){
            $state=$value['etat_intervention'];

           if($state=='ENVOYEE') {
               $bg = "list-group-item-info";
           }else if ($state=='VALIDEE') {

                    $bg = "bg-success";
                    }else if ($state=="TERMINEE") {

                    $bg = "bg-primary";
                    }else if($state=='REFUSEE') {

                    $bg = 'bg-danger';
                    }else{

                    $bg='bg-warning';
            }
            ?>

            <div class="boxservice <?php echo $bg;?> mt-2 " >
                <img class="card-img-top img-responsive col-lg-4 " src="<?php echo $value['img_service']; ?>" alt="Card image">
                <div class="card-body col-lg-8">
                    <h4 class="card-title text-primary"><?php echo $value['titre_service']; ?></h4>
                    <span class="mr-0">Date effectué le  :  <?php echo date('Y-m-d H:i',strtotime($value['date_demande']));?></span>
                    <p class="card-text">Client : <?php echo $value['nom_client']?></p>
                    <p class="card-text">Tarif : <?php echo $value['tarif_service']?></p>
                    <p class="card-text">Adresse de l'intervention  : <?php echo $value['adresse_intervention']?></p>
                    <p class="card-text">Date et heure de la de l'intervention  : <?php echo date('Y-m-d H:i',strtotime($value['date_intervention']))?></p>
                    <p class="card-text">Sujet de la demande  :<br> <?php echo $value['description']?></p>
                    <p class="card-text">Statut de la demande  :<br> <?php echo $value['etat_intervention']?></p>
                    <?php

                    if($state=='ENVOYEE'){
                    ?>
                    <a href="managedemands.php?ida=<?php echo $value['id']; ?>" class="btn btn-lg btn-block btn-success">Accepter</a>
                    <a href="managedemands.php?idr=<?php echo $value['id']; ?>" class="btn btn-lg btn-block btn-danger">Refuser</a>
                    <?php

                    }
                    else if($state=='REFUSEE'){
                        ?>
                        <a href="deletedemande.php?id=<?php echo $value['id']; ?>" class=" btn btn-danger">Supprimer</a>
                        <?php
                    }
                    else{
                        echo "<h3 class='display-3'> Votre demande a l'état : $state, elle ne peut etre gerée</h3>";
                    }
                    ?>
                </div>
            </div>
<br>

            <?php


        }
    }
    else{
        echo 'ko';
    }
    ?>

  </div>


</body>


</html>