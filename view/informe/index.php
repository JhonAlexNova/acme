<?php
   require_once '../../conexion/config.php';
   require_once '../../app/controller/informe/select.php';
   require_once '../../app/controller/conductor/select.php';
   
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>ACME | Informe</title>
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
                  <a href="#" class="nav-link">Informe</a>
               </li>
            </ul>
         </nav>
         <?php require_once '../layouts/menu.php'; ?>
         <div class="content-wrapper">
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Informe general</h1>
                     </div>
                     <div class="col-sm-6">
                        <a class="btn btn-primary float-right" href="#ModalAsignar" data-toggle='modal'>
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
                                          <th>Placa</th>
                                          <th>Marca</th>
                                          <th>Nombre conductor</th>
                                          <th>Nombre propietario</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php

                                          if($query -> rowCount() > 0)   { ?>
                                             <?php  foreach($results as $result) {  ?>

                                                <tr>
                                                   <td> <?php   echo $result->placa; ?> </td>
                                                   <td> <?php   echo $result->marca; ?> </td>
                                                   <td> 
                                                      <?php
                                                         if(!empty($result->conductor)){
                                                            echo $result->conductor['primer_nombre'].' '.$result->conductor['segundo_nombre'].' '.$result->conductor['apellidos']; 
                                                         }else{
                                                            echo 'Sin conductor';
                                                         }
                                                      ?> 
                                                   </td>
                                                   <td> <?php   echo $result->propietario['primer_nombre'].' '.$result->propietario['segundo_nombre'].' '.$result->propietario['apellidos']; ?> </td>
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

         <!--  -->
         <form id="quickForm" action='../../app/controller/informe/insert.php' method='POST'>
         <div class="modal" tabindex="-1" role="dialog" id='ModalAsignar'>
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title">Asignacion de conductor</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                        <div class="row">
                           <div class="col-md-12 form-group">
                                 <label for="">Asignar conductor</label>
                                 <select name="conductor_id" class='form-control' required>
                                    <option value="">Seleccionar</option>
                                    <?php
                                       if($query -> rowCount() > 0)   { ?>
                                             <?php  foreach($resultsConductores as $result) {  ?>
                                                <option value="<?php echo $result->id;?>"> <?php echo $result->primer_nombre.' '.$result->segundo_nombre.' '.$result->apellidos; ?> </option>
                                             <?php  } ?>
                                    <?php  } ?>
                                 </select>
                           </div>
                           
                           <div class="col-md-12 form-group">
                                 <label for="">Vehiculos sin asignar</label>
                                 <select name="vehiculo_id" class='form-control' required>
                                    <option value="">Seleccionar</option>
                                    <?php
                                       foreach($results as $result) { 
                                          if(empty($result->conductor)){
                                             echo  "<option value='$result->id'> $result->placa $result->marca </option>" ; 
                                          }
                                       }
                                    ?> 
                                 </select>
                           </div>

                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" name='insertar' class="btn btn-primary">Guardar</button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
         <!--  -->
        
         <?php  require_once '../layouts/footer.php'; ?>
      </div>
     

      <script src="/public/libs/jquery/jquery.min.js"></script>
      <script src="/public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="/public/libs/jquery-validation/jquery.validate.min.js"></script>
      <script src="/public/libs/jquery-validation/additional-methods.min.js"></script>
      <script src="/public/js/adminlte.min.js"></script>
      <script src="/public/js/usuarios.js"></script>
      
   </body>
</html>