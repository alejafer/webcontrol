<?php 
	session_start();

    $connect = new mysqli( 'controlbd.mysql.database.azure.com', 'acceso@controlbd', 'Control123', 'control' );

    $tipo = $_POST['tipo'];
    $Tarjeta = $_POST['Tarjeta'];
    $evento = $_POST['evento'];

	$razon1 = $_POST['razon1'];
	$razon2 = $_POST['razon2'];
    $razon3 = $_POST['razon3'];

    $fechainicial = $_POST['fechainicial'];
	$fechafinal = $_POST['fechafinal'];
 	$horainicial = $_POST['horainicial'];
    $horafinal = $_POST['horafinal'];

    $inicial =  $fechainicial."&nbsp00:00";
    $final = $fechafinal."&nbsp00:00";
    
    if($Tarjeta == 't.id'){
    	$razon = $razon3;

    }
    else if($Tarjeta == 0){
    	$razon = $razon1;
    }
    else if($Tarjeta == 1){
    	$razon = $razon2;
    }
    if($razon == 'null'){
    	$razon = 'r.idrazon';
    }
    $fecha1 = strtotime($fechainicial);
    $fecha2 = strtotime($fechafinal);

    $hora1 = substr($horainicial, 0, -3); 
    $hora2 = substr($horafinal, 0, -3); 


    if($fecha1 > $fecha2){

         $_SESSION['Error'] = 'fecha';

    }
    else if($fechainicial == $fechafinal){

        if($hora1 > $hora2){

            $_SESSION['Error'] = 'hora';
            
        }else{

            if($evento == 'Ninguno'){
                $_SESSION['consulta'] = "SELECT u.identificacion,t.nombre as tipousuario, u.nombre1 , u.apellido1, r.nombre as razon, CASE r.tarjeta WHEN '1' THEN 'Si' ELSE 'No' END as tarjeta, c.fechaentrada, c.fechasalida FROM tipousuario t,control C, usuarios u, razones r WHERE estado='0' and C.identificacion = u.identificacion and c.razon = r.idrazon and u.tipousuario = t.id and u.tipousuario = $tipo and t.id = $Tarjeta and r.idrazon = $razon and (fechaentrada between '$fechainicial $horainicial' and '$fechafinal $horafinal') and (fechasalida between '$fechainicial $horainicial' and '$fechafinal $horafinal');";
            }else if ($evento == 'Entrada'){
                $_SESSION['consulta'] = "SELECT u.identificacion,t.nombre as tipousuario, u.nombre1 , u.apellido1, r.nombre as razon, CASE r.tarjeta WHEN '1' THEN 'Si' ELSE 'No' END as tarjeta, c.fechaentrada, c.fechasalida FROM tipousuario t,control C, usuarios u, razones r WHERE estado='0' and C.identificacion = u.identificacion and c.razon = r.idrazon and u.tipousuario = t.id and u.tipousuario = $tipo and t.id =  $Tarjeta and r.idrazon = $razon and (fechaentrada between '$fechainicial $horainicial' and '$fechafinal $horafinal');";
            }else if ($evento == 'Salida'){
                $_SESSION['consulta'] = "SELECT u.identificacion,t.nombre as tipousuario, u.nombre1 , u.apellido1, r.nombre as razon, CASE r.tarjeta WHEN '1' THEN 'Si' ELSE 'No' END as tarjeta, c.fechaentrada, c.fechasalida FROM tipousuario t,control C, usuarios u, razones r WHERE estado='0' and C.identificacion = u.identificacion and c.razon = r.idrazon and u.tipousuario = t.id and u.tipousuario = $tipo and t.id =  $Tarjeta and r.idrazon = $razon and (fechasalida between '$fechainicial $horainicial' and '$fechafinal $horafinal');";
            }
        }

    }else {
         if($evento == 'Ninguno'){
                $_SESSION['consulta'] = "SELECT u.identificacion,t.nombre as tipousuario, u.nombre1 , u.apellido1, r.nombre as razon, CASE r.tarjeta WHEN '1' THEN 'Si' ELSE 'No' END as tarjeta, c.fechaentrada, c.fechasalida FROM tipousuario t,control C, usuarios u, razones r WHERE estado='0' and C.identificacion = u.identificacion and c.razon = r.idrazon and u.tipousuario = t.id and u.tipousuario = $tipo and t.id = $Tarjeta and r.idrazon = $razon and (fechaentrada between '$fechainicial $horainicial' and '$fechafinal $horafinal') and (fechasalida between '$fechainicial $horainicial' and '$fechafinal $horafinal');";
            }else if ($evento == 'Entrada'){
                $_SESSION['consulta'] = "SELECT u.identificacion,t.nombre as tipousuario, u.nombre1 , u.apellido1, r.nombre as razon, CASE r.tarjeta WHEN '1' THEN 'Si' ELSE 'No' END as tarjeta, c.fechaentrada, c.fechasalida FROM tipousuario t,control C, usuarios u, razones r WHERE estado='0' and C.identificacion = u.identificacion and c.razon = r.idrazon and u.tipousuario = t.id and u.tipousuario = $tipo and t.id =  $Tarjeta and r.idrazon = $razon and (fechaentrada between '$fechainicial $horainicial' and '$fechafinal $horafinal');";
            }else if ($evento == 'Salida'){
                $_SESSION['consulta'] = "SELECT u.identificacion,t.nombre as tipousuario, u.nombre1 , u.apellido1, r.nombre as razon, CASE r.tarjeta WHEN '1' THEN 'Si' ELSE 'No' END as tarjeta, c.fechaentrada, c.fechasalida FROM tipousuario t,control C, usuarios u, razones r WHERE estado='0' and C.identificacion = u.identificacion and c.razon = r.idrazon and u.tipousuario = t.id and u.tipousuario = $tipo and t.id =  $Tarjeta and r.idrazon = $razon and (fechasalida between '$fechainicial $horainicial' and '$fechafinal $horafinal');";
            }
    }

 	



	
	if(!$consult =$connect->query("SELECT u.identificacion,t.nombre as tipousuario, u.nombre1, u.apellido1, r.nombre, CASE r.tarjeta WHEN '1' THEN 'Si' ELSE 'No' END as Tarjeta, c.fechaentrada, c.fechasalida FROM tipousuario t,control C, usuarios u, razones r WHERE estado='0' and C.identificacion = u.identificacion and c.razon = r.idrazon and u.tipousuario = t.id and u.tipousuario = $tipo and t.id = $Tarjeta and r.idrazon = $razon;")){
		
			$_SESSION['Error'] = '';
	
	}

 	header("location: reporte.php");

 ?>