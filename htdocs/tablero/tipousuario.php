<?php 
	session_start();
	$id = $_POST['Identificador'];
    $nombre = $_POST['nombre'];

 	$connect = new mysqli( 'datos.mysql.database.azure.com', 'datos@datos', 'Marlon12345', 'control' );

	if(!$consult =$connect->query("INSERT INTO `tipousuario` (`id`, `nombre`) VALUES ('$id', '$nombre')")){
		
			$_SESSION['ErrorAcademia'] = '';
	
	}

	header("location: tipo.php");

 	?>