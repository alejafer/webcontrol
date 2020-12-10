<?php 
 	session_start();

 	$usuario=$_POST['usuario'];
 	$contrasena = $_POST['contrasena'];

 	$conexion = new mysqli(  'datos.mysql.database.azure.com', 'datos@datos', 'Marlon12345', 'control' );

 	$proceso =$conexion->query("SELECT * FROM perfil p, Usuarios u, tipousuario t where p.usuarios_identificacion = u.identificacion and t.id = u.tipousuario_id and usuario='$usuario' AND clave='$contrasena' and u.estado = '1'");
 	
 	 if($resultado = mysqli_fetch_array($proceso)){
 	 	$_SESSION['nombref'] = $resultado['nombre1'];
 	 	$_SESSION['apellidof'] = $resultado['apellido1'];
 	 	$_SESSION['nombreint'] = $resultado['identificacion'];
 	 	$_SESSION['idtipo'] = $resultado['tipousuario_id'];
 	 	$_SESSION['Error'] = null;
 	 	header('Location: ../tablero/tablero.php');
 	 	header('Location: ../tablero/tablero.php');


 	 	
 	 }else{
 	 		header("Location: index.php");
 	 		header("Location: index.php");
 	 	}
 	 	
 	 	
 	 


 ?>