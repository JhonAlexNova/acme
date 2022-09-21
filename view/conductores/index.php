<?php
   require_once '../../conexion/config.php';
   require_once '../../app/controller/conductor/select.php';
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>ACME | Conductores</title>
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
                  <a href="../../index3.html" class="nav-link">Inicio</a>
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
                        <h1>Conductores</h1>
                     </div>
                     <div class="col-sm-6">
                        <a class="btn btn-primary float-right" href="conductores/create.php">
                        Agregar
                        </a>
                     </div>
                  </div>
               </div>
            </section>
            <section class="content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-body p-2">
                              <div class="table-responsive">
                                 <table class="table" id="users-table">
                                    <thead>
                                       <tr>
                                          <th>Numero cedula</th>
                                          <th>Primer nombre</th>
                                          <th>Segundo nombre</th>
                                          <th>Apellidos</th>
                                          <th>Direccion</th>
                                          <th>Telefono</th>
                                          <th>Ciudad</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          if($query -> rowCount() > 0)   { ?>
                                             <?php  foreach($resultsConductores as $result) {  ?>
                                                <tr>
                                                   <td> <?php   echo $result->numero_cedula; ?> </td>
                                                   <td> <?php   echo $result->primer_nombre; ?> </td>
                                                   <td> <?php   echo $result->segundo_nombre; ?> </td>
                                                   <td> <?php   echo $result->apellidos; ?> </td>
                                                   <td> <?php   echo $result->direccion; ?> </td>
                                                   <td> <?php   echo $result->telefono; ?> </td>
                                                   <td> <?php   echo $result->ciudad; ?> </td>
                                                </tr>
                                             <?php  } ?>
                                       <?php  } ?>

                                       
                                    </tbody>
                                 </table>
                              </div>
                              <div class="card-footer clearfix">
                                 <div class="float-right">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                     </div>
                  </div>
               </div>
            </section>
         </div>
        
         <?php  require_once 'footer.php'; ?>
      </div>
     

      <script src="/public/libs/jquery/jquery.min.js"></script>
      <script src="/public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="/public/libs/jquery-validation/jquery.validate.min.js"></script>
      <script src="/public/libs/jquery-validation/additional-methods.min.js"></script>
      <script src="/public/js/adminlte.min.js"></script>
      <script src="/public/js/usuarios.js"></script>
      
   </body>
</html>