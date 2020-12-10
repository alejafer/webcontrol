<?php 
	session_start();
	$id = $_POST['editid'];
    $nombre = $_POST['editnombre'];
    $apellido = $_POST['editapellido'];
    $telefono = $_POST['edittelefono'];
    $tipoperfil = $_POST['editperfil'];

 	$connect = new mysqli( 'controlbd.mysql.database.azure.com', 'acceso@controlbd', 'Control123', 'control' );

	$proceso =$connect->query("SELECT * FROM perfil WHERE telefono = '$telefono' and identificacion <> '$id'");

	if($resultado = mysqli_fetch_array($proceso)){

	   	$_SESSION['ErrorAcademia'] = 'Error telefono repetida!';
	        
	}else{

		if(!$consult =$connect->query("UPDATE perfil SET  nombre1 ='$nombre', apellido1 ='$apellido', idtipo='$tipoperfil', telefono='$telefono' where identificacion='$id';")){
					
				$_SESSION['ErrorAcademia'] = 'Error identificacion repetida!';
				
		}else{

			$_SESSION['exito'] = 'Perfil modificado!';

		}

	}

	

	header("location: ../../tablero/cargos.php");


 	?>