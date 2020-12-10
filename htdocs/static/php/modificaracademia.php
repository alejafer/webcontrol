<?php 
	session_start();
	$id = $_POST['editid'];
    $nombre = $_POST['editnombre'];
    $nombre2 = $_POST['editnombre2'];
    $apellido = $_POST['editapellido'];
    $apellido2 = $_POST['editapellido2'];
    $correo = $_POST['editcorreo'];
    $telefono = $_POST['edittelefono'];
    $idusuario = $_POST['editidusuario'];
    $tarjeta = $_POST['edittarjeta'];

 	$connect = new mysqli( 'datos.mysql.database.azure.com', 'datos@datos', 'Marlon12345', 'control' );

	$proceso =$connect->query("SELECT * FROM usuarios WHERE telefono = '$telefono' and identificacion <> '$id'");

	$proceso2 =$connect->query("SELECT * FROM usuarios WHERE correo = '$correo' and identificacion <> '$id'");

	if($resultado = mysqli_fetch_array($proceso2)){

	       $_SESSION['ErrorAcademia'] = 'Error correo repetida!';
	        
	}else{
    
	    if($resultado = mysqli_fetch_array($proceso)){

	       $_SESSION['ErrorAcademia'] = 'Error telefono repetida!';
	        
	    }else{

			if(!$consult =$connect->query("UPDATE Usuarios SET  nombre1 ='$nombre', nombre2 ='$nombre2', apellido1='$apellido', apellido2='$apellido2', correo='$correo', telefono='$telefono', tipousuario_id='$idusuario', tarjeta='$tarjeta' where identificacion='$id';")){
				
					$_SESSION['ErrorAcademia'] = 'Error identificacion repetida!';
			
			}else{

				$_SESSION['exito'] = 'Usuario modificado!';

			}

		}

	}

	header("location: ../../tablero/academia.php");


 	?>