<?php 
	session_start();
	$id = $_POST['editid'];
    $nombre = $_POST['editnombre'];

 	$connect = new mysqli( 'datos.mysql.database.azure.com', 'datos@datos', 'Marlon12345', 'control' );

	

	$proceso2 =$connect->query("SELECT * FROM tipousuario WHERE nombre = '$nombre' and id <> '$id';");

	if($resultado = mysqli_fetch_array($proceso2)){

	       $_SESSION['ErrorAcademia'] = 'Error nombre repetido!';
	        
	}else{
    
			if(!$consult =$connect->query("UPDATE tipousuario SET nombre ='$nombre' where id='$id'; ")){
				
					$_SESSION['ErrorAcademia'] = 'Error id repetida!';
			
			}else{

				$_SESSION['exito'] = 'Tipo usuario modificado!';

			}

		

	}

	header("location: ../../tablero/tipo.php");


 	?>