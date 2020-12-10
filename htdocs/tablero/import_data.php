<?php
$conexion = new mysqli( 'control096.mysql.database.azure.com', 'admcontrol@control096', 'Control123', 'control' );
$filelista = $_FILES['file'];
$filelista=file_get_contents($filelista['tmp_name']);
$filelista=explode("\n",$filelista);
$filelista=array_filter($filelista);
foreach ($filelista as $listado) {
    $filearrays[]= explode(";",$listado);
}
//insertar

foreach($filearrays as $data){

        $conexion->query("INSERT INTO usuarios 
        (identificacion, nombre1, nombre2, apellido1, apellido2, correo, telefono, tipousuario) 
        VALUES 
        ('{$data[0]}',
        '{$data[1]}',
        '{$data[2]}',
        '{$data[3]}',
        '{$data[4]}',
        '{$data[5]}',
        '{$data[6]}',
        '{$data[7]}') ");
    
    
    
    
}
  

  

?>