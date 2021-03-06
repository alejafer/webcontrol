
<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Control</title>
   
    <link rel="icon" type="image/png" href="../static/img/icono.png" />
    <link rel="stylesheet" type="text/css" href="../static/css/bootstrap2.css"> 
    <link rel="stylesheet" type="text/css" href="../static/css/font-Awesome.css">
    <link rel="stylesheet" type="text/css" href="../static/css/css.css">  
    <link rel="stylesheet" type="text/css" href="../static/css/main.css"> 
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> 
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../static/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../static/css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> 





</head>
<?php 

    session_start();
    if (isset($_SESSION['nombref'])) {
    
    }else {
    header("location: ../login_v1/index.php");
    }
    $link = new mysqli( 'controlbd.mysql.database.azure.com', 'acceso@controlbd', 'Control123', 'control' );    

    $proceso =$link->query("SELECT count(*) as cantidad FROM usuarios ");
    
     if($resultado = mysqli_fetch_array($proceso)){
        $cantidad = $resultado['cantidad'];
    }
?>
  <?php include("modal_modificar.php");?>
<script type="text/javascript">
$(document).ready(function(){  
    $("#botoncaracterizacion").click(function () {
        $('.caracterizacion').toggle("slow");
    });
    $("#botondiagnostico").click(function () {
        $('.diagnostico').toggle("slow");
    });
    $("#botonmapa").click(function () {
        $('.mapa').toggle("slow");
           
    });
    $("#botontablacara").click(function () {
        $('.tablacara').toggle("slow");
    });
    $("#botontablaasignar").click(function () {
        $('.tablaasignar').toggle("slow");
    });
    $("#botontablaasignados").click(function () {
        $('.tablaasignados').toggle("slow");
    });
    $("#botontablausuarios").click(function () {
        $('.tablausuarios').toggle("slow");
    });
});
</script>
<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
<body class="bodyMenu">


    <nav class="navbar navbar-light shadow">
        <a class="navbar-brand"></a>
        <form action="../static/php/cerrar_sesion.php" class="form-group" id="registro" method="post">
            <a href="#Cerrar"  class="btn btn-outline-success my-2 my-sm-0 botonsalirMenu" type="">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </form>
    </nav>
    <div class="page-wrapper default-theme sidebar-bg bg1 toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <!-- sidebar-brand  -->
                            <div class="sidebar-item sidebar-brand">
                <div onclick="esconde()" class="col-md-8" id="close-sideba">
                        <i class="fas fa-align-justify"></i>
                    </div>
                    <div style="text-align: right; " class="col-md-4" id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>

                <!-- sidebar-header  -->

                <div class="sidebar-item sidebar-header d-flex flex-nowrap">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="../static/img/user.jpg" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <?= $_SESSION['nombref'] ?>
                            <strong><?= $_SESSION['apellidof'] ?></strong> 
                        </span>
                        <span class="user-role"><?= $_SESSION['nombreint'] ?></span>
                        <span class="user-status">
                            <i><i class="fa fa-circle"></i></i>
                            <span>En linea</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-menu  -->
                <div class=" sidebar-item sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span><a href="">INICIO</a></span>
                        </li>
                                
                                
                                <li class="sidebar-dropdown" >   
                                    <a href="academia.php" >
                                        <i><i class="fas fa-align-justify" ></i></i>
                                        <span class="menu-text">Academia</span>
                                    </a>   
                                </li> 
                                <li class="sidebar-dropdown" >   
                                    <a href="tipo.php" >
                                        <i><i class="fas fa-align-justify" ></i></i>
                                        <span class="menu-text">Tipos de usuario</span>
                                    </a>   
                                </li> 
                                <li class="sidebar-dropdown" >   
                                    <a href="cargos.php" >
                                        <i><i class="fas fa-align-justify" ></i></i>
                                        <span class="menu-text">Perfiles</span>
                                    </a>   
                                </li> 
                                
                                <li class="sidebar-dropdown" >   
                                    <a href="control.php" >
                                        <i><i class="fas fa-align-justify" ></i></i>
                                        <span class="menu-text">Control</span>
                                    </a>   
                                </li> 
                                <li class="sidebar-dropdown" >   
                                    <a href="razon.php" >
                                        <i><i class="fas fa-align-justify" ></i></i>
                                        <span class="menu-text">Razones</span>
                                    </a>   
                                </li> 
                                <li class="sidebar-dropdown" >   
                                    <a href="reporte.php" >
                                        <i><i class="fas fa-align-justify" ></i></i>
                                        <span class="menu-text">Reportes</span>
                                    </a>   
                                </li> 
                                                         
                    </ul>

                </div>

                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-footer  -->

        </nav>
        <!-- page-content  -->
    <div  id="app"  class="page-wrapper default-theme sidebar-bg bg1 toggled">
        <main class="page-content pt-2">
        
        
    
        <div class="row">
       
     


        </div>
            <!-- Earnings (Monthly) Card Example -->
            
        <div class="caracterizacion card shadow mb-4" style="display: none;">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cargar datos</h6>
          </div>
          <div class="card-body">
            
            <div class="outer-container">
                <form action="import_data.php" method="POST"
                name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                    <div class="upload-btn-wrapper">    

                        <div class="container">
                            <h3>Importar el archivo con los datos de los usuarios</h2> 
                                
                          <div class="row">
                            <div class="col-12">
                                <label id="fichero" for="file" class="btn btn-info"> Adjuntar archivo </label>         
                                <input type="file" value="file" class="inputfile hidden-xs hidden-md" name="file" id="file" >
                                <br>
                            </div>
                            <div class="col-12">
                                <center><button class="btn btn-primary" style="width: 40%" type="button" onclick="subirlist()">Enviar</button></center>
                            </div>      
                          </div>
                        </div>                        
                    </div>
                </form>

                
            </div>
          </div>
        </div> 
        <div class="tablaasignar card shadow mb-4" style="display: none;">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Personas sin asignar </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table id="example4" class="table table-striped table-bordered" style="width:100%">                
                    <thead>
                        <tr center>
                            <th>identificacion</th>
                            <th>Nombre</th>
                            <th>apellido</th>
                            <th>Numero</th>
                            <th>Puntos</th>
                            <th>Ultimo diagnostico</th>
                          </tr>
                    </thead>
                    <?php foreach ($link->query("SELECT * FROM `usuarios`" ) as $row){ // aca puedes hacer la consulta e iterarla  ?> 
                    <tr>
                        <td><?php echo $row['identificacion'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['nombre2'] ?></td>
                        <td><?php echo $row['apellido'] ?></td>
                        <td><?php echo $row['apellido2'] ?></td>
                        <td><?php echo $row['correo'] ?></td>                      
                     </tr>
                    <?php
                        }
                    ?>
                    <tfoot>
                        <tr center>
                            <th>identificacion</th>
                            <th>Nombre</th>
                            <th>apellido</th>
                            <th>Numero</th>
                            <th>Puntos</th>
                            <th>Ultimo diagnostico</th>
                          </tr>
                    </tfoot>
                </table>
                </div>
            </div>     
        </div>
        
        
         <div class="tablausuarios card shadow mb-4" style="display: none;">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                    <table id="example3" class="table table-striped table-bordered" style="width:100%">                
                    <thead>
                        <tr center>
                            <th>identificacion</th>
                            <th>usuario</th>
                            <th>Nombre</th>
                            <th>apellido</th>
                          </tr>
                    </thead>
                    <?php foreach ($link->query("SELECT * FROM `usuario` where nivel = 2" ) as $row){ // aca puedes hacer la consulta e iterarla  ?> 
                    <tr>
                        <td><?php echo $row['identificacion'] ?></td>
                        <td><?php echo $row['usuario'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['apellido'] ?></td>                         
                     </tr>
                    <?php
                        }
                    ?>
                    <tfoot>
                        <tr center>
                            <th>identificacion</th>
                            <th>usuario</th>
                            <th>Nombre</th>
                            <th>apellido</th>
                          </tr>
                    </tfoot>
                </table>
                </div>
            </div>     
        </div>


        <div class="row">
            <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7" style="display: none;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ejemplo de datos</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Encabezado:</div>
                      <a class="dropdown-item" href="#">Mujeres</a>
                      <a class="dropdown-item" href="#">Hombres</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Otros</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
        </div>

            <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5" style="display: none;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ejemplo de datos</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Encabezado:</div>
                      <a class="dropdown-item" href="#">Masculino</a>
                      <a class="dropdown-item" href="#">Femenino</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Otro</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Masculino
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Femenino
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Otro
                    </span>
                  </div>
                </div>
                </div>
        </div>
        </div>


            
            <div class="lightbox" id="Cerrar">
              <figure>
                <a  class="close"></a>  
                <form action="../cerrar_sesion.php" class="form-group" id="registro" method="post">
                <div class="confirms">
                <h1>Cerrar sesión</h1>
                <p> <strong>Se cerrará tu sesión</strong>. Tendrás que volver a introducir tu nombre de cuenta y contraseña.</p>
                <br>
                <br>

                <button type="reset"><a class="btn" href="#" style="width: 100%;"> Cancelar</a></button>
                 <button type="submit" ><a class="btn" >Confirmar</a></button>
                </div>
              </figure>
            </div>
        </main>
    </div>
    

        <!-- page-content" -->
    <div class="container body-content">
    </div>
    <!-- page-wrapper -->
    <!-- using online scripts -->
     
    <script type="text/javascript">
       
        $(document).ready(function() {
          $('#example').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
          });
        });
        $(document).ready(function() {
          $('#example2').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
          });
        });
        $(document).ready(function() {
          $('#example3').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
          });
        });
        $(document).ready(function() {
          $('#example4').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
          });
        });
      </script>
    
    <script type="text/javascript" src="../static/js/main.js"></script>
    <script type="text/javascript" src="../static/js/awesome.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="../chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    
    <script src="../chart.js/chart-area-demo.js"></script>
    <script src="../chart.js/chart-pie-demo.js"></script>

    <script src="../static/js/functions.js" type="text/javascript"></script>
    <script src="../static/js/sweetalert.min.js" type="text/javascript"></script>




        <?php if (isset($_SESSION['identificaciondoble'])) { ?>
            <script type="text/javascript">
                swal("Error, el numero de identificacion ya existe","", "error");
            </script>
        <?php $_SESSION['identificaciondoble'] = null;} ?>

        <?php if (isset($_SESSION['usuariodoble'])) { ?>
            <script type="text/javascript">
                swal("Error, el correo del usuario ya existe","", "error");
            </script>
        <?php $_SESSION['usuariodoble'] = null; } ?>
        <?php if (isset($_SESSION['exito'])) { ?>
            <script type="text/javascript">
                swal("Nuevo usuario regitrado!","", "success");
            </script>
        <?php $_SESSION['exito'] = null;} ?>



</body>

</html>
<script type="text/javascript">
function subirlist() {
		var Form =new FormData($('#frmExcelImport')[0]);
		$.ajax({
			url:"import_data.php",
			type: "post",
			data: Form,
			processData:false,
			contentType: false,
			success: function (data) {
				 swal("Datos regitrados!","", "success");

			}
		})
	}

</script>
