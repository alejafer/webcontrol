<?php 
 	session_start();
	
 	$usuario = $_POST['user'];
 	$contrasena = $_POST['password'];

 	
 	$conexion = new mysqli( 'localhost', 'root', '', 'eventos' );

 	
 	
 	
 	 	 $buscar2 =$conexion->query("SELECT * FROM perfiles where identificacion ='$usuario' AND Clave='$contrasena' ");
 	
 	
	 	 if($resultado = mysqli_fetch_array($buscar2)){

	 	 	$_SESSION['apellido'] = $resultado['Apellido'];
	 	 	$_SESSION['nombre'] = $resultado['Nombre'];
	 	 	$_SESSION['nombreint'] = $resultado['identificacion'];


	 	 	header("Location: ../../tablero.php");


	 	 }else {

		header("Location: ../../login");
 	 }
 	
 	 	
 	
 	 	
 ?>