
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="/resources/demos/style.css">


    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


</head>
<?php 

    session_start();
    if (isset($_SESSION['nombref'])) {
    
    }else {
    header("location: ../login_v1/index.php");
    }
    $link = new mysqli( 'controlbd.mysql.database.azure.com', 'acceso@controlbd', 'Control123', 'control' );

    $proceso =$link->query("SELECT count(*) as cantidad FROM control where estado='0' ");
    
     if($resultado = mysqli_fetch_array($proceso)){
        $cantidad = $resultado['cantidad'];
    }
    if( isset($_SESSION['consulta'] )){
    }else{
        $_SESSION['consulta'] = "SELECT u.identificacion,t.nombre as tipousuario, u.nombre1 , u.apellido1, r.nombre as razon, CASE r.tarjeta WHEN '1' THEN 'Si' ELSE 'No' END as tarjeta, c.fechaentrada, c.fechasalida FROM tipousuario t,control C, usuarios u, razones r WHERE estado='0' and C.identificacion = u.identificacion and c.razon = r.idrazon and u.tipousuario = t.id and u.tipousuario ";
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
  $( function() {
      $('#datepicker').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        language: "es",
        autoclose: true,
        keyboardNavigation: false,
        todayHighlight: true
    });      
      $('#datepicker2').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        language: "es",
        autoclose: true,
        keyboardNavigation: false,
        todayHighlight: true
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
                                    <a href="Razon.php" >
                                        <i><i class="fas fa-align-justify" ></i></i>
                                        <span class="menu-text">Razones</span>
                                    </a>   
                                </li>
                                <li class="sidebar-dropdown" >   
                                    <a href="#" >
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Consulta</div>
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
              <a style="text-decoration:none" href="#" id="botontablaasignar">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Resultado</div>
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
            <h6 class="m-0 font-weight-bold text-primary">Filtros de la consulta </h6>
          </div>
          <div class="card-body">
           
            <div class="outer-container">
                <form action="reportecontrol.php" method="POST"
                name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                    <div class="container" style="margin: 0px; width: 100%; max-width: 20040px;">  
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-xl-6 col-md-12" style="text-align: left;">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tipo de usuario </label>
                                    <select name="tipo" class="form-control" id="exampleFormControlSelect1">
                                      <option value="u.tipousuario">Seleccione una opción </option>
                                     <?php foreach ($link->query("SELECT id, nombre FROM `tipousuario`" ) as $row){ ?> 
                                      <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>                             
                            </div>
                            <div class="col-xl-6 col-md-12" style="text-align: left;">
                               <div class="form-group">
                                    <label for="tarjetaselect">Tarjeta </label>
                                    <select name="Tarjeta" class="form-control" id="tarjetaselect" onchange="mytarjeta()">
                                        <option value="t.id">Seleccione una opción </option>
                                        <option value="0">Si</option>
                                        <option value="1">No</option>
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-lg-6 col-md-12" style="text-align: left;">
                                <div class="form-group" >
                                    <label for="exampleFormControlSelect1">Evento </label>
                                    <select name="evento" class="form-control" id="exampleFormControlSelect1">
                                      <option value="Ninguno">Seleccione una opción </option>
                                      <option value="Entrada">Entrada</option>
                                      <option value="Salida">Salida</option>
                                    </select>
                                </div>                              
                            </div>
                              <div class="col-lg-6 col-md-12" style="text-align: left;">
                                <div class="form-group" style="display: none;"  id="razon1select">
                                    <label for="razon1">Razón </label>
                                    <select name="razon1" class="form-control" id="razon1">
                                      <option value="null">Seleccione una opción </option>
                                     <?php foreach ($link->query("SELECT * FROM razones where tarjeta='1';" ) as $row){ ?> 
                                      <option value="<?php echo $row['idrazon'] ?>"><?php echo $row['nombre'] ?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>  
                                 <div class="form-group" style="display: none;" id="razon2select">
                                    <label for="razon2">Razón </label>
                                    <select name="razon2" class="form-control" id="razon2">
                                      <option value="null">Seleccione una opción </option>
                                     <?php foreach ($link->query("SELECT * FROM razones where tarjeta='0';" ) as $row){ ?> 
                                      <option value="<?php echo $row['idrazon'] ?>"><?php echo $row['nombre'] ?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div >  
                                <div class="form-group"  id="razon3select">
                                    <label for="razon3">Razón </label>
                                    <select name="razon3" class="form-control" id="razon3">
                                      <option value="null">Seleccione una opción </option>
                                     <?php foreach ($link->query("SELECT * FROM razones " ) as $row){ ?> 
                                      <option value="<?php echo $row['idrazon'] ?>"><?php echo $row['nombre'] ?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>                               
                          
                        </div>
                        <div class="row">
                             <div class='col-md-6' style="text-align: left;">
                                <div class="form-group">
                                    <label for="apellido">Fecha inicial</label>
                                    <input name="fechainicial" class="form-control" id="datepicker"  placeholder="Fecha inicial" required> 
                                </div>   
                              </div>
                              <div class='col-md-6'>
                                  <div class="form-group" style="text-align: left;">
                                    <label for="apellido">Fecha final</label>
                                    <input name="fechafinal" class="form-control" id="datepicker2"  placeholder="Fecha final" required> 
                                 </div> 
                              </div>
                        </div>
                        <div class="row">
                             <div class='col-md-6'>
                                <div class="form-group" style="text-align: left;">
                                    <label for="apellido">Hora inicial</label>
                                    <input name="horainicial" class="form-control" id="timepicker"  placeholder="Hora inicial" required> 
                                </div>   
                              </div>
                              <div class='col-md-6'>
                                  <div class="form-group" style="text-align: left;">
                                    <label for="apellido">Hora final</label>
                                    <input name="horafinal" class="form-control" id="timepicker2"  placeholder="Hora final" required> 
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
        <div class="tablaasignar card shadow mb-4" >
           <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">historial de entradas y salidas </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table id="example3" class="table table-striped table-bordered" style="width:100%">                
                    <thead>
                        <tr center>
                            <th>Identificacion</th>
                            <th>Tipo_usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Razón</th>
                            <th>Tarjeta</th>
                            <th>Fecha_entrada</th>
                            <th>Fecha_salida</th>
                          </tr>
                    </thead>
                    <?php foreach ($link->query($_SESSION['consulta']) as $row){ // aca puedes hacer la consulta e iterarla  ?> 
                    <tr>
                        <td><?php echo $row['identificacion'] ?></td>
                        <td><?php echo $row['tipousuario'] ?></td>
                        <td><?php echo $row['nombre1'] ?></td>
                        <td><?php echo $row['apellido1'] ?></td>
                        <td><?php echo $row['razon'] ?></td>
                        <td><?php echo $row['tarjeta'] ?></td>
                        <td><?php echo $row['fechaentrada'] ?></td>   
                        <td><?php echo $row['fechasalida'] ?></td>                    
                     </tr>
                    <?php
                        }
                    ?>
                    <tfoot>
                        <tr center>
                            <th>Identificacion</th>
                            <th>Tipo_usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Razón</th>
                            <th>Tarjeta</th>
                            <th>Fecha_entrada</th>
                            <th>Fecha_salida</th>
                          </tr>
                    </tfoot>
                </table>
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
         $('#timepicker').timepicker();
         $('#timepicker2').timepicker();
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

    <script>
    function mytarjeta() {
      var x = document.getElementById("tarjetaselect").value;
        if(x=='t.id'){
            $('#razon1select').hide("slow"); 
            $('#razon2select').hide("slow"); 
            $('#razon3select').toggle("slow"); 
           
        }
        if(x==0){
            $('#razon1select').toggle("slow"); 
            $('#razon2select').hide("slow"); 
            $('#razon3select').hide("slow"); 
           
        }
        if(x==1){
            $('#razon1select').hide("slow"); 
            $('#razon2select').toggle("slow"); 
            $('#razon3select').hide("slow"); 
        }
        
    }
    </script>

        
        

        <?php if ($_SESSION['Error']=="hora") { ?>
            <script type="text/javascript">
                swal("Error, La hora inicial no puede ser mayor a la final!","", "error");
            </script>
        <?php $_SESSION['Error'] = null; } ?>
        <?php if ($_SESSION['Error']=="fecha") { ?>
            <script type="text/javascript">
                swal("Error, La fecha inicial no puede ser mayor a la final!","", "error");
            </script>
        <?php $_SESSION['Error'] = null; } ?>



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
