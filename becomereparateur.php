<?php
require_once('function.php');


if(isset($_SESSION['current_user'])){
	$connecter=true;
	$current_user=$_SESSION['current_user'];
	$reparateur = $_SESSION['current_user']['reparateur'];
}
if(isset($_SESSION['all_services'])){

	$allservices=$_SESSION['all_services'];
}


?>
<?php


 if(isset($_POST['devenirreparateur'])){
	 updateReparateur($current_user['id']);
     echo"
	 <script>window.location='acceuil.php' </script>
	 ";
	 //header('location:acceuilreparateur.php');

 }
 
 ?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="index.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />   
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>
<body>

	<?php	
	if(!$connecter){
	?>

	<nav>
	<ul>

	 <li><img src="https://img.icons8.com/external-inipagistudio-lineal-color-inipagistudio/64/000000/external-bike-bike-to-work-inipagistudio-lineal-color-inipagistudio-1.png"/></li>
            <li>Home Repair</li>
   
      <li><a href="home.php">Home</a></li>
	
	<li>
    <a href="logout.php" id="Deconnexion">Déconnexion</a> 
	</li>

	<li>	
    <a href="index.php" id="Deconnexion">Conctact</a> 
	</li>
	</ul>
	<?php
	}
	else{
		
	?>
	

	<ul>
	
    <a href="logout.php" id="Deconnexion">Déconnexion</a> 
</li>
      <li><a href="contact.php" id="Deconnexion"><span></span> Contact</a></li>
	</ul>
	</nav>
	<?php
	}
	?>
  </div>
</nav>


<p>
Contrary to popular belief, Lorem Ipsum is not simply random text.
 It has roots in a piece of classical Latin literature from 45 BC,
 making it over 2000 years old. Richard McClintock, a Latin professor
 at Hampden-Sydney College in Virginia, looked up one of the more
 obscure Latin words, consectetur, from a Lorem Ipsum passage,
 and going through the cites of the word in classical literature,
 discovered the undoubtable source. Lorem Ipsum comes from sections 
 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
 (The Extremes of Good and Evil) by Cicero, written in 45 BC. 
 This book is a treatise on the theory of ethics, very popular
 during the Renaissance. The first line of Lorem Ipsum, "Lorem
 ipsum dolor sit amet..", comes from a line in section 1.10.32.
Contrary to popular belief, Lorem Ipsum is not simply random text.
 It has roots in a piece of classical Latin literature from 45 BC,
 making it over 2000 years old. Richard McClintock, a Latin professor
 at Hampden-Sydney College in Virginia, looked up one of the more
 obscure Latin words, consectetur, from a Lorem Ipsum passage,
 and going through the cites of the word in classical literature,
 discovered the undoubtable source. Lorem Ipsum comes from sections 
 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
 (The Extremes of Good and Evil) by Cicero, written in 45 BC. 
 This book is a treatise on the theory of ethics, very popular
 during the Renaissance. The first line of Lorem Ipsum, "Lorem
 ipsum dolor sit amet..", comes from a line in section 1.10.32.
 Contrary to popular belief, Lorem Ipsum is not simply random text.
 It has roots in a piece of classical Latin literature from 45 BC,
 making it over 2000 years old. Richard McClintock, a Latin professor
 at Hampden-Sydney College in Virginia, looked up one of the more
 obscure Latin words, consectetur, from a Lorem Ipsum passage,
 and going through the cites of the word in classical literature,
 discovered the undoubtable source. Lorem Ipsum comes from sections 
 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
 (The Extremes of Good and Evil) by Cicero, written in 45 BC. 
 This book is a treatise on the theory of ethics, very popular
 during the Renaissance. The first line of Lorem Ipsum, "Lorem
 ipsum dolor sit amet..", comes from a line in section 1.10.32.
</p>
<p>
Contrary to popular belief, Lorem Ipsum is not simply random text.
 It has roots in a piece of classical Latin literature from 45 BC,
 making it over 2000 years old. Richard McClintock, a Latin professor
 at Hampden-Sydney College in Virginia, looked up one of the more
 obscure Latin words, consectetur, from a Lorem Ipsum passage,
 and going through the cites of the word in classical literature,
 discovered the undoubtable source. Lorem Ipsum comes from sections 
 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
 (The Extremes of Good and Evil) by Cicero, written in 45 BC. 
 This book is a treatise on the theory of ethics, very popular
 during the Renaissance. The first line of Lorem Ipsum, "Lorem
 ipsum dolor sit amet..", comes from a line in section 1.10.32.
Contrary to popular belief, Lorem Ipsum is not simply random text.
 It has roots in a piece of classical Latin literature from 45 BC,
 making it over 2000 years old. Richard McClintock, a Latin professor
 at Hampden-Sydney College in Virginia, looked up one of the more
 obscure Latin words, consectetur, from a Lorem Ipsum passage,
 and going through the cites of the word in classical literature,
 discovered the undoubtable source. Lorem Ipsum comes from sections 
 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
 (The Extremes of Good and Evil) by Cicero, written in 45 BC. 
 This book is a treatise on the theory of ethics, very popular
 during the Renaissance. The first line of Lorem Ipsum, "Lorem
 ipsum dolor sit amet..", comes from a line in section 1.10.32.
 Contrary to popular belief, Lorem Ipsum is not simply random text.
 It has roots in a piece of classical Latin literature from 45 BC,
 making it over 2000 years old. Richard McClintock, a Latin professor
 at Hampden-Sydney College in Virginia, looked up one of the more
 obscure Latin words, consectetur, from a Lorem Ipsum passage,
 and going through the cites of the word in classical literature,
 discovered the undoubtable source. Lorem Ipsum comes from sections 
 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
 (The Extremes of Good and Evil) by Cicero, written in 45 BC. 
 This book is a treatise on the theory of ethics, very popular
 during the Renaissance. The first line of Lorem Ipsum, "Lorem
 ipsum dolor sit amet..", comes from a line in section 1.10.32.
</p>
<p>
Contrary to popular belief, Lorem Ipsum is not simply random text.
 It has roots in a piece of classical Latin literature from 45 BC,
 making it over 2000 years old. Richard McClintock, a Latin professor
 at Hampden-Sydney College in Virginia, looked up one of the more
 obscure Latin words, consectetur, from a Lorem Ipsum passage,
 and going through the cites of the word in classical literature,
 discovered the undoubtable source. Lorem Ipsum comes from sections 
 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
 (The Extremes of Good and Evil) by Cicero, written in 45 BC. 
 This book is a treatise on the theory of ethics, very popular
 during the Renaissance. The first line of Lorem Ipsum, "Lorem
 ipsum dolor sit amet..", comes from a line in section 1.10.32.
Contrary to popular belief, Lorem Ipsum is not simply random text.
 It has roots in a piece of classical Latin literature from 45 BC,
 making it over 2000 years old. Richard McClintock, a Latin professor
 at Hampden-Sydney College in Virginia, looked up one of the more
 obscure Latin words, consectetur, from a Lorem Ipsum passage,
 and going through the cites of the word in classical literature,
 discovered the undoubtable source. Lorem Ipsum comes from sections 
 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
 (The Extremes of Good and Evil) by Cicero, written in 45 BC. 
 This book is a treatise on the theory of ethics, very popular
 during the Renaissance. The first line of Lorem Ipsum, "Lorem
 ipsum dolor sit amet..", comes from a line in section 1.10.32.
 Contrary to popular belief, Lorem Ipsum is not simply random text.
 It has roots in a piece of classical Latin literature from 45 BC,
 making it over 2000 years old. Richard McClintock, a Latin professor
 at Hampden-Sydney College in Virginia, looked up one of the more
 obscure Latin words, consectetur, from a Lorem Ipsum passage,
 and going through the cites of the word in classical literature,
 discovered the undoubtable source. Lorem Ipsum comes from sections 
 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
 (The Extremes of Good and Evil) by Cicero, written in 45 BC. 
 This book is a treatise on the theory of ethics, very popular
 during the Renaissance. The first line of Lorem Ipsum, "Lorem
 ipsum dolor sit amet..", comes from a line in section 1.10.32.
</p>
<div class=>
<form action ='' method='post'>
<div class='form-group'>
<input type='checkbox' name='accept' value='1' required/>
<label> J'accepte les conditions</label>&nbsp;
</div>
<div class='form-group'>
<button class="form-control btn btn-success" name='devenirreparateur'> Devenir Reparateur</button>
</div>
</form>
</div>


 </html>