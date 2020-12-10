<?php 
	session_start();
	$id = $_POST['deleteid'];
 

 	$connect = new mysqli( 'datos.mysql.database.azure.com', 'datos@datos', 'Marlon12345', 'control' );

 	$proceso =$connect->query("SELECT * FROM usuarios WHERE identificacion = '$id' and estado='0'");

 	if($resultado = mysqli_fetch_array($proceso)){

	       if(!$consult =$connect->query("UPDATE  usuarios SET `estado` ='1' where  identificacion='$id'; ")){
				
		$_SESSION['ErrorAcademia'] = 'El perfil no se activo!';
			
		}else{

			$_SESSION['exito'] = 'Perfil se activo';

		}
	        
	}else {
		if(!$consult =$connect->query("UPDATE  usuarios SET `estado` ='0' where  identificacion='$id'; ")){
				
		$_SESSION['ErrorAcademia'] = 'El perfil no se desactivo!';
			
		}else{

			$_SESSION['exito'] = 'Perfil se desactivo';

		}
	}

	

	header("location: ../../tablero/cargos.php");

 	?>