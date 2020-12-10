
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
    if (isset($_SESSION['nombref']) ) {
    
    }else {
    header("location: ../login_v1/index.php");
    }
      $link = new mysqli( 'datos.mysql.database.azure.com', 'datos@datos', 'Marlon12345', 'control' );    

    $proceso =$link->query("SELECT count(*) as cantidad FROM razones ;");
    
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
        $('.tablausuarios').toggle("slow");
    });
    $("#botonmapa").click(function () {
        $('.tablausuarios').toggle("slow");
           
    });
    $("#botontablacara").click(function () {
        $('.tablausuarios').toggle("slow");
    });
    $("#botontablaasignar").click(function () {
        $('.tablausuarios').toggle("slow");
    });
    $("#botontablaasignados").click(function () {
        $('.tablausuarios').toggle("slow");
    });
    $("#botontablausuarios").click(function () {
        $('.tablausuarios').toggle("slow");
    });
});

$(document).ready(function() {
    $(document).on('click', '.edit', function() {
        var id = $(this).val();
        var identificacion = $('#identificacion' + id).text();
        var nombre = $('#nombre' + id).text();
        var descripcion = $('#descripcion' + id).text();
        var tarjeta = $('#tarjeta' + id).text();
        
        $('#eidentificador').val(identificacion);
        $('#enombre').val(nombre);
        $('#edescripcion').val(descripcion);
        $('#etarjeta').val(tarjeta);
       
    });
});
$(document).ready(function() {
    $(document).on('click', '.delete', function() {
        var id = $(this).val();
        var identificacion = $('#identificacion' + id).text();   
        $('#didentificacion').val(identificacion);
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
                            <span><a href="tablero.php">INICIO</a></span>
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
                                    <a href="#" style="color: white;">
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
       
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <a style="text-decoration:none" href="#" id="botoncaracterizacion">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registrar razón</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <a style="text-decoration:none" href="#" id="botontablausuarios">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Datos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $cantidad ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-address-card fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>



        </div>
            <!-- Earnings (Monthly) Card Example -->
            
        <div class="caracterizacion card shadow mb-4" style="display: none;">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Crear razón</h6>
          </div>
          <div class="card-body">
            
            <div class="outer-container">
                <form action="tiporazon.php" method="POST"
                name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                    <div class="container" style="margin: 0px; max-width: 20040px;">  
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-xl-6 col-md-12" style="text-align: left;">
                                <label for="nombre">Nombre</label>
                                <input class="form-control"  name="nombre" type="text" placeholder="Nombre" required>                               
                            </div>
                            <div class="col-lg-6 col-md-12" style="text-align: left;">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tarjeta</label>
                                    <select name="tarjeta" class="form-control" id="exampleFormControlSelect1">
                                        <option value="1">Si</option> 
                                        <option value="0">No</option>
                                    </select>
                                </div>                              
                            </div>
                            

                        </div>
                        <div class="row">
                              <div class="col-xl-12 col-md-12" style="text-align: left;">
                                <div class="form-group">
                                <label for="apellido">descripción</label>
                                <textarea class="form-control"  name="descripcion" type="text" placeholder="descripción" required rows="3"></textarea> 
                                </div>                             
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-lg-6 col-md-12" style="text-align: left;">
                                <input class="btn btn-primary" type="submit" value="Registrar">                      
                            </div>
                              
                        </div>
                    </div>
                </form>

                
            </div>
          </div>
        </div> 
         
        
        
         <div class="tablausuarios card shadow mb-4" >
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Razones</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                    <table id="example3" class="table table-striped table-bordered" style="width:100%">                
                    <thead>
                        <tr center>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Tarjeta</th>
                            <th>Estado</th>
                            <th>Modificar</th>
                            <th>Cambiar</th>
                          </tr>
                    </thead>
                    <?php foreach ($link->query("SELECT idrazon, nombre,  descripcion, CASE tarjeta WHEN '1' THEN 'Si' ELSE 'No' END as Tarjeta, CASE  WHEN estado = '1' THEN 'Activo' WHEN estado = '0' THEN 'Inactivo' END AS estado FROM razones;" ) as $row){ // aca puedes hacer la consulta e iterarla  ?> 
                    <tr>
                        <td><span id="identificacion<?php echo $row['idrazon'] ?>"><?php echo $row['idrazon'] ?></span></td>
                        <td><span id="nombre<?php echo $row['idrazon'] ?>"><?php echo $row['nombre'] ?></span></td>
                        <td><span id="descripcion<?php echo $row['idrazon'] ?>"><?php echo $row['descripcion'] ?></span></td>
                        <td><span id="tarjeta<?php echo $row['idrazon'] ?>"><?php echo $row['Tarjeta'] ?></span></td>
                        <td><span ><?php echo $row['estado'] ?></span></td>
                        <td><center><button value="<?php echo $row['idrazon'] ?>" id="<?php echo $row['idrazon'] ?>" onclick="document.getElementById('id01').style.display='block'" class="btn-primary edit"><i class="fas fa-user-edit"></i></button></center></td>
                        <td><center><button value="<?php echo $row['idrazon'] ?>" id="<?php echo $row['idrazon'] ?>" onclick="document.getElementById('id02').style.display='block'" class="btn-primary delete"><i class="fas fa-user-times"></i></i></button></center></td>                         
                     </tr>
                    <?php
                        }
                    ?>
                    <tfoot>
                        <tr center>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Tarjeta</th>
                            <th>Estado</th>
                            <th>Modificar</th>
                            <th>Cambiar</th>
                          </tr>
                    </tfoot>
                </table>
                </div>
            </div>     
        </div>
        <div id="id01" class="modal1" id="edit">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
            <form id="form" class="modal1-content" enctype="multipart/form-data" action="../static/php/modificarrazon.php" method="POST">
                <div class="container">
                    <h1 style="font-size: 60px;color: #2199be;text-align: center;" class="vc_custom_heading vc_custom_1513035251258" ><b>MODIFICAR</b></h1><h1 style="font-size: 50px;color: #2199be;text-align: center;" class="vc_custom_heading ">Datos de la razón</h1>
                    <div class="row">
                        <div class="col-lg-6 form-group" style="text-align: left;">
                            <label for="Nombre"><h2 style="color: #2199be;text-align: left" class="vc_custom_heading">Identificador</h2></label>
                            <input type="number" class="form-control" id="eidentificador" aria-describedby="emailHelp" placeholder="Ingrese su nombre" name="editid" required="true">
                            
                        </div>
                        <div class="col-lg-6 form-group" style="text-align: left;">
                            <label for="Apellido"><h2 style="color: #2199be;text-align: left" class="vc_custom_heading">Nombre</h2></label>
                            <input type="text" class="form-control" id="enombre" aria-describedby="emailHelp" placeholder="Ingrese su apellido" name="editnombre" required="true">
                            
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-lg-12 form-group" style="text-align: left;">
                            <label for="Correo"><h2 style="color: #2199be;" class="vc_custom_heading">Descripción </h2></label>
                            <input type="text" class="form-control" id="edescripcion" aria-describedby="emailHelp" placeholder="Ingrese su Correo" name="editdescripcion" required="true">   
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12" style="text-align: left;">
                            <div class="form-group">
                                <label for="valtarjeta"><h2 style="color: #2199be;" class="vc_custom_heading">Tarjeta</h2></label>
                                <select name="edittarjeta" class="form-control" id="valtarjeta"  required>
                                    <option  value="">Selecciona una tarjeta</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>                              
                         </div>                          
                    </div>
                    <br></br>
                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn vc_custom_heading">CANCELAR</button>
                        <button type="submit" class="deletebtn vc_custom_heading modificar">MODIFICAR</button>
                    </div>
                </div>
            </form>
        </div>
        <div id="id02" class="modal2" id="eliminar" >
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span>
            <form id="form" class="modal2-content" enctype="multipart/form-data" action="../static/php/desactivarrazon.php" method="POST">
                <div class="container">
                    <h1 style="font-size: 60px;color: #2199be;text-align: center;" class="vc_custom_heading vc_custom_1513035251258" ><b>CAMBIAR ESTADO</b></h1><h1 style="font-size: 50px;color: #2199be;text-align: center;" class="vc_custom_heading ">¿Está seguro de cambiar el estado de esta razón?</h1>
                    <div class="row">
                        <div class="col-lg-12 form-group" style="text-align: left;  display: none;">
                            <label for="Nombre"><h2 style="color: #2199be;text-align: left" class="vc_custom_heading">Identificación</h2></label>
                            <input type="number" class="form-control" id="didentificacion" aria-describedby="emailHelp" placeholder="Ingrese su identificación" name="deleteid" required="true">
                            
                        </div>
                    </div>
                    <br></br>
                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn vc_custom_heading">CANCELAR</button>
                        <button type="submit" class="deletebtn vc_custom_heading modificar">CAMBIAR</button>
                    </div>
                </div>
            </form>
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




        <?php if (isset($_SESSION['ErrorAcademia'])) { ?>
            <script type="text/javascript">
                swal("<?php echo $_SESSION['ErrorAcademia'] ?>","", "error");
            </script>
        <?php $_SESSION['ErrorAcademia'] = null; } ?>
        <?php if (isset($_SESSION['exito'])) { ?>
            <script type="text/javascript">
                swal("<?php echo $_SESSION['exito'] ?>","", "success");
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
