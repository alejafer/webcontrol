<?php 
 	session_start();

 	$usuario = $_POST['usuario'];
 	$nombre = $_POST['nombre'];
 	$nombre2 = $_POST['nombre2'];
 	$apellido = $_POST['apellido'];
 	$apellido2 = $_POST['apellido2'];
 	$identificacion = $_POST['identificacion'];

 	$conexion = new mysqli( 'localhost', 'root', '', 'gicad' );

 	$proceso =$conexion->query("SELECT * FROM usuario WHERE usuario='$usuario'  ");
 	
 	if($resultado = mysqli_fetch_array($proceso)){
 	 	$_SESSION['usuariodoble'] = $resultado['usuario'];	 	
 	}

 	$proceso =$conexion->query("SELECT * FROM usuario WHERE identificacion='$identificacion'  ");
 	
 	if($resultado = mysqli_fetch_array($proceso)){
 	 	$_SESSION['identificaciondoble'] = $resultado['identificacion'];	 	
 	}
 	if($_SESSION['usuariodoble'] == $usuario || $_SESSION['identificaciondoble'] == $identificacion){
 		$_SESSION['exito'] = null;
 		header("location: ../../tablero/tablero.php");
 	}else{	
 	$proceso =$conexion->query("INSERT INTO `usuario` (`usuario`, `password`, `nombre`, `nombre2`, `apellido`, `apellido2`, `identificacion`, `nivel`) VALUES ('$usuario', '$identificacion', '$nombre', '$nombre2', '$apellido', '$apellido2', '$identificacion', '2')");
 		$_SESSION['exito'] = 'correcto';
 		$_SESSION['usuariodoble'] = null; 
 		$_SESSION['identificaciondoble'] = null;
    	header("location: ../../tablero/tablero.php");
 	}


 	
 	
	
 	
 	 	
 	 


 ?>