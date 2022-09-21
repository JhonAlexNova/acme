
<?php
   require_once '../../conexion/config.php';
   require_once '../../app/controller/vehiculo/select.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ACME S.A | Vehiculos</title>

 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <link rel="stylesheet" href="/public/libs/fontawesome-free/css/all.min.css">
  
  <link rel="stylesheet" href="/public/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Conductores</a>
      </li>
    </ul>    
  </nav>


  <?php require_once '../layouts/menu.php'; ?>
 

 
  <div class="content-wrapper">
 
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear conductor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Conductores</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            
            <div class="card card-primary">
              
              
              <form id="quickForm" action='../../app/controller/conductor/insert.php' method='POST'>
                <div class="card-body">
                    <div class="row">
                        <?php require_once 'campos.php'; ?>
                        <div class="col-md-6 form-group">
                          <label for="">Vehiculos</label>
                          <select name="vehiculo_id" class="form-control">
                              <option value="">Seleccionar</option>
                                  <?php
                                      if($query -> rowCount() > 0)   { ?>
                                          <?php  foreach($results as $result) {  ?>
                                              <option value="<?php echo $result->id;?>"> <?php echo $result->placa.' '.$result->marca; ?> </option>
                                          <?php  } ?>
                                  <?php  } ?>
                          </select>
                      </div>
                        <div class="col-md-12 form-group">
                            <button type='submit' name='insertar' class='btn btn-primary'>Crear</button>
                        </div>
                    </div>
                </div>
              </form>
            </div>
            
            </div>
         
          
        </div>
        
      </div>
    </section>
    
  </div>
  
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2022 <a href="#">ACME S.A</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

  <!-- jQuery -->
  <script src="/public/libs/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- jquery-validation -->
  <script src="/public/libs/jquery-validation/jquery.validate.min.js"></script>
  <script src="/public/libs/jquery-validation/additional-methods.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/public/js/adminlte.min.js"></script>
  <script src="/public/js/usuarios.js"></script>
</body>
</html>
