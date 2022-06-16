<?php
 
session_start();

function connect_db(){

	$servername = "localhost";
    $user = 'root';
    $pass = '';
	try {
    $db= new PDO ('mysql:host=localhost;dbname=ppe4', $user, $pass);

	return $db;
	}
	
	catch (PDOException $e) {
	print "Erreur :" . $e->getMessage() . "<br/>";
	die();
	}

 }

 function getServiceById($id){
	$link= connect_db();
	if(!$link){
		echo 'Error ';
		return null;
	}
	else{
		$query = "select service.*, user.nom,user.prenom,user.codepostal,user.ville,user.adresse from service,user where service.id_reparateur=user.id and service.id ='$id'";
		$stmt = $link->prepare($query);
		$stmt->execute();
		if(!$stmt){
			echo $stmt->errorInfo();
			return null;
		}
		else{
			$service = $stmt->fetch(PDO::FETCH_ASSOC);
			return $service;
			
		}
		
	}
	
	
}


function updateService($indexed_data){
    $link= connect_db();
    if(!$link){
        echo 'Error ';
        return null;
    }
    else{

        $query = "update service set titre =?, description=?, tarif=?,rayon_intervention=?,img=? where id=?";
	
        $stmt = $link->prepare($query);
        $stmt->execute($indexed_data);
		
        if(!$stmt){
            var_dump($stmt->errorInfo());

            return null;
        }
        else{

			header('Location:voirservices.php');
        }

    }

}


function console($data) {

	$output = $data;
	if (is_array($output))
	$output = implode(',', $output);
	echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


function add_user($data){

	$link= connect_db();
	if(!$link){
	echo 'Error ';
	return null;
}
	else{
	
	$query = "insert into user
	values(NULL,?,?,?,?,?,?,?,?,?,0,'CLIENT')";
	$stmt = $link->prepare($query);
	unset($data['password2']);
	$data1 = array_values($data);
	$stmt->execute($data1);
	header('Location:acceuil.php');

	if(!$stmt){
	echo $stmt->errorInfo();
	var_dump($stmt->errorInfo());

	return null;
	echo "Cet email existe déja";
		}

		else{
		$id= $link->lastInsertId();
		echo "<script>alert('Cet email existe déja !')</script>";
		$user=array_merge(['id'=>$id],$data,['reparateur'=>0,'status'=>'CLIENT']);
		$_SESSION['current_user']=$user;
		
		}

		
	}
	
}

function connect_user($email,$pwd){
	$link= connect_db();
	if(!$link){
		echo 'Error ';
		return null;
	}
	else{
		$query = "select * from user where email = ? and password =?";
		$stmt = $link->prepare($query);
		$stmt->execute([$email,$pwd]);
		if(!$stmt){
			echo $stmt->errorInfo();
			return null;
		}
		else{
			if($stmt->rowCount()){
		
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
			$_SESSION['current_user']=$user;
			header('location:acceuil.php');	
			}
			else{
			
				echo "<script>alert('Utilisateur non trouvable')</script>";
				
			}
		}
		
	}
	
}

function intervention($indexed_data) {
	$link=connect_db();
	if(!$link){
        echo 'Error ';
        return null;
    }
    else{

		$query="insert into intervention  values(?)";
		$stmt = $link->prepare($query);
        $stmt->execute($indexed_data);
		
        if(!$stmt){
            var_dump($stmt->errorInfo());

            return null;
        }
        else{

			// header('Location:voirservices.php');
        }

    }

}


function getDemandeById($id){
    $link= connect_db();
    if(!$link){
        echo 'Error ';
        return null;
    }
    else{



        $query = "select demande.*, service.titre,service.tarif,service.img,service.rayon_intervention,service.description, user.nom,user.prenom from service,user,demande where service.id_reparateur=user.id and demande.id='$id' and demande.id_service=service.id  ";

        $stmt = $link->prepare($query);
        $stmt->execute();
        if(!$stmt){
            echo $stmt->errorInfo();
            return null;
        }
        else{
            $demande = $stmt->fetch(PDO::FETCH_ASSOC);
           return $demande;


        }

    }


}

function getAllServices(){
	$link= connect_db();
	if(!$link){
		echo 'Error ';
		return null;
	}
	else{
	    $user_id = $_SESSION['current_user']['id'];
		$query = "select service.*, user.nom,user.prenom from service,user where service.id_reparateur=user.id and user.id!='$user_id' ";
		$stmt = $link->prepare($query);
		$stmt->execute();
		if(!$stmt){
			echo $stmt->errorInfo();
			return null;
		}
		else{
			$allservices = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$_SESSION['all_services']=$allservices;
			
		}
		
	}
	
	
}

function getServiceByReparateur($id){
	$link= connect_db();
if(!$link){
	echo 'Error ';
	return null;
}
else{
	$query = "select service.*, user.nom,user.prenom from service,user where service.id_reparateur=user.id and service.id_reparateur='$id'";
	$stmt = $link->prepare($query);
	$stmt->execute();
	if(!$stmt){
		echo $stmt->errorInfo();
		return null;
	}
	else{
		$allservices = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $allservices;
		
	}
	
}
}

function updateReparateur($id){
	$link= connect_db();
	if(!$link){
		echo 'Error ';
		return null;
	}
	else{
		$query = "update user set reparateur = 1 where id ='$id'";
		$stmt = $link->prepare($query);
		$stmt->execute();
		if(!$stmt){
			echo $stmt->errorInfo();
			return null;
		}
		else{
			$_SESSION['current_user']['reparateur']=1;
			
		}
		
	}
	
	
}

function uploadPicture($image){
	
	$target_dir = "img/";
$target_file = $target_dir . basename($image["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($image["tmp_name"]);
  if($check !== false) {
   
    $uploadOk = 1;
  } else {

    $uploadOk = 0; 
	
  }
}



// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != ""
 ) {
	echo "L'image n'est pas conforme.";
  $uploadOk = 0	;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Désolé, votre image n'a pas été mise à jour.";}
// if everything is ok, try to upload file
 else {
  if (move_uploaded_file($image["tmp_name"], $target_file)) {
   return $target_file;
  } else {
    return false;
  }
}

}



function handleDemande($id,$status){
    $link= connect_db();
    if(!$link){
        echo 'Error ';
        return null;
    }
    else{

        $query = "update demande set etat_intervention = ? where id= ?";

        $stmt = $link->prepare($query);
        $stmt->execute([$status,$id]);

        if(!$stmt){
            var_dump($stmt->errorInfo());

            return null;
        }
        else{


           header('Location:mydemandsreparateur.php');





        }

    }

}


function addService($indexed_data){
	$link= connect_db();
	if(!$link){
		echo 'Error ';
		return null;
	}
	else{
		
		$query = "insert into service
		values(NULL,?,?,?,?,?,?)";
		
		$stmt = $link->prepare($query);
		
		$stmt->execute($indexed_data);
		
		if(!$stmt){
			echo $stmt->errorInfo();
			
			return null;
		}
		else{	
			
			header('location:voirservices.php');
		}
		
	}
	
}


function getMyDemandes($id){
    $link= connect_db();
    if(!$link){
        echo 'Error ';
        return null;
    }
    else{
        $req= "call updateDemande()";
        $stmt1= $link->prepare($req);
        $stmt1->execute();
          $query = "select demande.*, service.titre,service.tarif,service.img, user.nom,user.prenom from service,user,demande where service.id_reparateur=user.id and demande.id_client='$id' and demande.id_service=service.id and etat_intervention!='ARCHIVEE' ";

        $stmt = $link->prepare($query);
        $stmt->execute();
        if(!$stmt){
            echo $stmt->errorInfo();
            return null;
        }
        else{
            $alldemandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['myDemandes']=$alldemandes;


        }

    }


}

function commander($indexed_data){
	$id_service = $_GET['id'];
$service = getServiceById($id_service);
$title = $service['titre'];
    $link= connect_db();
    if(!$link){
        echo 'Error ';
        return null;
    }
    else{
        $current_user_id = $_SESSION['current_user']['id'];
        $current_date=date('Y-m-d H:i:s');
        $query = "insert into demande values (NULL,'$title','$current_date',?,?,?,?,'ENVOYEE',?,$current_user_id)";

        $stmt = $link->prepare($query);
        $stmt->execute($indexed_data);
		var_dump($stmt->errorInfo());

        if(!$stmt){

            return null;
        }
        else{
echo "<script> window.location='mydemands.php'</script>";


            return true;

        }

    }

}

function deleteDemande($id){
    $link= connect_db();
    if(!$link){
        echo 'Error ';
        return null;
    }
    else{
        $current_user_id = $_SESSION['current_user']['id'];
        $current_date=date('Y-m-d');
        $query = "delete from demande where id=?";

        $stmt = $link->prepare($query);
        $stmt->execute([$id]);

        if(!$stmt){
            var_dump($stmt->errorInfo());

            return null;
        }
        else{



           header('Location:mydemandsreparateur.php');

        }

    }

}
function getMesDemandesReparateur($id){
    $link= connect_db();
    if(!$link){
        echo 'Error ';
        return null;
    }
    else{
        $req= "call updateDemande()";
        $stmt1= $link->prepare($req);
        $stmt1->execute();
        $query = "select demande.*,
    service.titre 'titre_service',
    service.description'description_service'
    ,service.tarif 'tarif_service',
     service.img 'img_service' ,
     client.nom 'nom_client',
     client.prenom 'prenom_client',
      client.email 'email_client',
      client.tel 'tel_client' 
       from demande ,service,user reparateur,user client WHERE
          demande.id_service=service.id
           and service.id_reparateur=reparateur.id 
           and demande.id_client=client.id 
           and reparateur.id= ?";

        $stmt = $link->prepare($query);
        $stmt->execute([$id]);

        if(!$stmt){
            var_dump($stmt->errorInfo());

            return null;
        }
        else{


            if($stmt->rowCount()){

    $demande_reparateur = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $demande_reparateur;
}




        }

    }

}

function GetTotal($id){

    $link= connect_db();
    if(!$link){
        echo 'Error ';
        return null;
    }
    else{
        $query="select count(*) from demande where etat_intervention='VALIDEE' and reparateur.id= ?";
     $stmt = $link->prepare($query);
       $stmt->execute([$id]);

    }
        if(!$stmt){
            var_dump($stmt->errorInfo());

            return null;
        }
        else{


            if($stmt->rowCount()){

    $nombre = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($nombre);
    return $nombre;

    }
}
}

function getGains($id){
    $link= connect_db();
    if(!$link){
        echo 'Error ';
        return null;
    }
    else{

    

        $query = " select SUM(tarif) from service, demande where id='$id' and demande.id=service.id and etat_intervention!='VALIDEE'and ";
      

        $stmt = $link->prepare($query);
        $stmt->execute(); 
    
       
        if(!$stmt){
            return null;
             var_dump($stmt->errorInfo());
        }
        else{
            $gain = $stmt->fetch(PDO::FETCH_ASSOC);

            return $gain;


        }

    }
}
?>