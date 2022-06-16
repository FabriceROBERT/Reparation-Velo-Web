<?php
require_once('function.php');
if($_GET['ida']){
    $id_demande=$_GET['ida'];

    handleDemande($id_demande,'VALIDEE');
}
if($_GET['idr']){
    $id_demande=$_GET['idr'];

    handleDemande($id_demande,'REFUSEE');
}




    
?>