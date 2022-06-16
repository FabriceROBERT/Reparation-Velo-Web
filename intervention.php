<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>intervention</h1>
    <form action="" method="POST">
<div class="intevntion">
<label for="Debut d'intervention">Début d'intervention :</label>
    <input type="time">


<label for="Fin d'intervention">Fin d'intervention :    </label>
    <input type="time">

    <button name='send'>Valider</button>


</div>
    
    </form>
    
</body>
<?php 

require_once("function.php");


?>

</html>
<?php


if (isset($_POST['send'])) {



 
$data= $_POST;
array_pop($data);
array_push($data);
$indexed_data=array_values($data);


intervention($indexed_data);

}



?>