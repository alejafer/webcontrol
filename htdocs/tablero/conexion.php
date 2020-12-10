<?php 

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "sqldatos", "pwd" => "Marlon12345", "Database" => "sqldatos", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:sqldatos.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

?>
