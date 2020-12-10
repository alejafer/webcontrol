<?php 
	session_start();
	$id = $_POST['editid'];
    $nombre = $_POST['editnombre'];
    $descripcion = $_POST['editdescripcion'];
    $tarjeta = $_POST['edittarjeta'];

 	$connect = new mysqli( 'datos.mysql.database.azure.com', 'datos@datos', 'Marlon12345', 'control' );

	

	$proceso2 =$connect->query("SELECT * FROM razones WHERE nombre = '$nombre' and idrazon <> '$id';");

	if($resultado = mysqli_fetch_array($proceso2)){

	       $_SESSION['ErrorAcademia'] = 'Error nombre repetido!';
	        
	}else{
    
			if(!$consult =$connect->query("UPDATE razones SET nombre ='$nombre', descripcion ='$descripcion', tarjeta ='$tarjeta' where idrazon='$id'; ")){
				
					$_SESSION['ErrorAcademia'] = 'Error id repetida!';
			
			}else{

				$_SESSION['exito'] = 'Razón modificado!';

			}

		

	}

	header("location: ../../tablero/razon.php");


 	?>