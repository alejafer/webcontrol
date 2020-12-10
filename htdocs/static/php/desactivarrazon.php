<?php 
	session_start();
	$id = $_POST['deleteid'];
 

 	$connect = new mysqli( 'datos.mysql.database.azure.com', 'datos@datos', 'Marlon12345', 'control' );

 	$proceso =$connect->query("SELECT * FROM razones WHERE idrazon = '$id' and estado='0'");

 	if($resultado = mysqli_fetch_array($proceso)){

	       if(!$consult =$connect->query("UPDATE  razones SET `estado` ='1' where  idrazon='$id'; ")){
				
		$_SESSION['ErrorAcademia'] = 'El perfil no se activo!';
			
		}else{

			$_SESSION['exito'] = 'La razón se activo';

		}
	        
	}else {
		if(!$consult =$connect->query("UPDATE  razones SET `estado` ='0' where  idrazon='$id'; ")){
				
		$_SESSION['ErrorAcademia'] = 'La razón no se desactivo!';
			
		}else{

			$_SESSION['exito'] = 'La razón se desactivo';

		}
	}

	

	header("location: ../../tablero/razon.php");

 	?>