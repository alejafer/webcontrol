<?php 
	session_start();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $tarjeta = $_POST['tarjeta'];
	$descripcion = $_POST['descripcion'];


 	$connect = new mysqli( 'datos.mysql.database.azure.com', 'datos@datos', 'Marlon12345', 'control');

	


	if(!$consult =$connect->query("INSERT INTO `razones` (idrazon, nombre, descripcion, tarjeta, estado) VALUES (null, '$nombre', '$descripcion', '$tarjeta', '1')")){
		
			$_SESSION['ErrorAcademia'] = 'Error al registrar la razón!';
	
	}else{

			$_SESSION['exito'] = 'Nueva razón registrada!';

	}

 	header("location: razon.php");

 ?>