<?php 
 	session_start();

 	$identificacion = $_POST['identificacion'];
 	

 	$conexion = new mysqli( 'localhost', 'root', '', 'gicad' );

 	$proceso =$conexion->query("SELECT * FROM persona WHERE numeroid='$identificacion'  ");

 	if($resultado = mysqli_fetch_array($proceso)){
 	 	$_SESSION['identificacion'] = $resultado['numeroid'];
 	 	$_SESSION['diagnostico'] = "correcto";	
		header("location: ../../contactanos/diagnostico.php");
 	}else{
 		header("location: ../../contactanos/solodiagnostico.php");
 		$_SESSION['error'] = "correcto";
 	}

 	
 ?>