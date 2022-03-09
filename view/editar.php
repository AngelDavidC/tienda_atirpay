<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ventas.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Editar Venta</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


<?php 
    include_once("../config/Conexion.php");
    if(isset($_POST['enviar'])){
        $IdDetalleVenta = $_POST['IdDetalleVenta'];
        $IdVenta = $_POST['IdVenta'];
        $IdProducto = $_POST['IdProducto'];
        $Cantidad = $_POST['Cantidad'];
        $Precio = $_POST['Precio'];
        $SubTotal = $_POST['SubTotal'];
        $sql = "update detalle_venta set IdVenta='$IdVenta',IdProducto='$IdProducto',Cantidad='$Cantidad',Precio='$Precio',SubTotal='$SubTotal' where IdDetalleVenta = $IdDetalleVenta";
        $rs = mysqli_query($conexion,$sql);
        if ($rs) {
            echo "Se actualizo bien";
            echo "<br><br>";
            echo '<a href="ventas.php">Salir</a>';
            exit();
            
        }else{
            echo "Fallo en la actualizacion";
        }

    }else{
        
        $IdDetalleVenta = $_GET['IdDetalleVenta'];
        $sql="select * from detalle_venta where IdDetalleVenta = '".$IdDetalleVenta."'";
        $rs = mysqli_query($conexion,$sql);
        $datos = mysqli_fetch_assoc($rs);
        $IdVenta = $datos["IdVenta"];
        $IdProducto = $datos["IdProducto"];
        $Cantidad = $datos["Cantidad"];
        $Precio =$datos["Precio"];
        $SubTotal = $datos["SubTotal"];
    }

?>


    <!-- Formulario -->
   <div class="col-md-6">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Nueva venta</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="editar.php">
                <div class="card-body">
                <input type="hidden" name="IdDetalleVenta" value="<?php echo $datos["IdDetalleVenta"] ?>">
                  <div class="form-group">
                    <label>ID Venta</label>
                    <input type="text" class="form-control" name="IdVenta" value='<?php echo $datos["IdVenta"] ?>'>
                  </div>
                  <div class="form-group">
                    <label>ID Producto</label>
                    <input type="text" class="form-control" name="IdProducto" value='<?php echo $datos["IdProducto"] ?>'>
                  </div>
                  <div class="form-group">
                    <label >Cantidad</label>
                    <input type="number" class="form-control" name="Cantidad" value='<?php echo $datos["Cantidad"] ?>'>
                  </div>
                  <div class="form-group">
                    <label >Precio</label>
                    <input type="number" class="form-control" name="Precio" value='<?php echo $datos["Precio"] ?>'>
                  </div>
                  <div class="form-group">
                    <label >SubTotal</label>
                    <input type="number" class="form-control" name="SubTotal" value='<?php echo $datos["SubTotal"] ?>'>
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="enviar">Registrar</button>
                </div>
              </form>
            </div>
            </div>
  

  <!-- Main Footer -->
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>