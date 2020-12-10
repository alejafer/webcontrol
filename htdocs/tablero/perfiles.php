<?php 
	session_start();
	$id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $nombre2 = $_POST['nombre2'];
    $apellido = $_POST['apellido'];
    $apellido2 = $_POST['apellido2'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $idusuario = $_POST['idusuario'];
    $tarjeta = $_POST['tarjeta'];



 	$connect = new mysqli( 'datos.mysql.database.azure.com', 'datos@datos', 'Marlon12345', 'control');

	$proceso =$connect->query("SELECT * FROM usuarios WHERE telefono = '$telefono'");

	$proceso2 =$connect->query("SELECT * FROM usuarios WHERE correo = '$correo'");

	if($resultado = mysqli_fetch_array($proceso2)){

	       $_SESSION['ErrorAcademia'] = 'Error correo repetida!';
	        
	}else{
    
	    if($resultado = mysqli_fetch_array($proceso)){

	       $_SESSION['ErrorAcademia'] = 'Error telefono repetida!';
	        
	    }else{

			if(!$consult =$connect->query("INSERT INTO `control`.`usuarios` (`identificacion`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `correo`, `telefono`, `tarjeta`, `tipousuario_id`, `estado`) VALUES ('$id', '$nombre', '$nombre2', '$apellido', '$apellido2', '$correo', '$telefono', '$tarjeta', '$idusuario', '1' )")){
				
					$_SESSION['ErrorAcademia'] = 'Error identificación repetida!';
			
			}else{
				if($idusuario == 2 || $idusuario == 3){
					$proceso =$connect->query("INSERT INTO `control`.`perfil` (`usuario`, `clave`, `usuarios_identificacion`) VALUES( '$id', '$id', '$id')");

					$_SESSION['exito'] = 'Nuevo perfil registrado!';

				}else{

					$_SESSION['exito'] = 'Nuevo usuario registrado!';

				}
				

			}

		}

	}

	header("location: cargos.php");


 	?>
	
