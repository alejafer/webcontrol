<?php 
	session_start();
	$id = $_POST['deleteid'];
 

 	$connect = new mysqli( 'datos.mysql.database.azure.com', 'datos@datos', 'Marlon12345', 'control' );

 	$proceso =$connect->query("SELECT * FROM tipousuario WHERE id = '$id' and estado='0'");

 	if($resultado = mysqli_fetch_array($proceso)){

	       if(!$consult =$connect->query("UPDATE  tipousuario SET `estado` ='1' where  id='$id'; ")){
				
		$_SESSION['ErrorAcademia'] = 'El tipo de usuario no se activo!';
			
		}else{

			$_SESSION['exito'] = 'Tipo de usuario activado';

		}
	        
	}else {
		if(!$consult =$connect->query("UPDATE  tipousuario SET `estado` ='0' where  id='$id'; ")){
				
		$_SESSION['ErrorAcademia'] = 'El tipo de usuario no se desactivo!';
			
		}else{

			$_SESSION['exito'] = 'Tipo de usuario desactivado';

		}
	}

	

	header("location: ../../tablero/tipo.php");

 	?>