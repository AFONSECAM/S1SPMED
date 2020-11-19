<!DOCTYPE html>
<html lang="es">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="SISPMED - Sistema Informacion Procesos Medicos">
    <meta name="author" content="Gaes4">
    <meta name="keyword" content="Sistema medico, Laravel, SENA, GAES4">
    <title>SISPMED</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/dashboard/assets/favicon/favicon2.ico')); ?>" />
    <!-- Main styles for this application-->
    <link href="<?php echo e(asset('assets/dashboard/css/style.css')); ?>" rel="stylesheet">    
    <link href="<?php echo e(asset('assets/dashboard/css/datatables.min.css')); ?>" rel="stylesheet">   
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"> 
    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet"/>

    <?php echo $__env->yieldContent('style'); ?>
  </head>
  <body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
      <div class="c-sidebar-brand d-lg-down-none">
        
        <img src="<?php echo e(asset('assets/landing/assets/img/logo2.png')); ?>" alt="" class="img-fluid img-responsive" width="200px" height="46">        
      </div>
      <ul class="c-sidebar-nav ps ps--active-y">
        <?php if(Auth::check()): ?>
          <?php $__currentLoopData = \App\Models\User::$menu[Auth::user()->rol->nomRol]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
              <?php if(isset($value["hijos"])): ?>
              <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
                  <svg class="c-sidebar-nav-icon">
                    <use xlink:href="<?php echo e(asset($value['icono'])); ?>"></use>
                  </svg> <?php echo e($value['nombre']); ?>

                </a>                
                <ul class="c-sidebar-nav-dropdown-items">
                <?php $__currentLoopData = $value["hijos"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hijo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="<?php echo e($hijo['url']); ?>" >
                      <svg class="c-sidebar-nav-icon">
                        <use xlink:href="<?php echo e(asset($hijo['icono'])); ?>"></use>                        
                      </svg> <?php echo e($hijo['nombre']); ?>

                    </a>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </li>
                          
              <?php else: ?>
                <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="<?php echo e($value['url']); ?>">
                    <svg class="c-sidebar-nav-icon">
                      <use xlink:href="<?php echo e(asset($value['icono'])); ?>"></use>
                    </svg> 
                      <?php echo e($value["nombre"]); ?> 
                  </a>
                </li>  
                <?php if($value["url"] == "/home"): ?>
                <li class="c-sidebar-nav-title">
                  Modulos
                </li>    
                <?php endif; ?>                      
              <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
        <?php endif; ?>

         
       
       

                                    
      </ul>
      <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
    <div class="c-wrapper c-fixed-components">
      <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
          <svg class="c-icon c-icon-lg">
            <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-menu')); ?>"></use>
          </svg>
        </button>
        <a class="c-header-brand d-lg-none" href="">
          <img src="<?php echo e(asset('assets/landing/assets/img/logo2.png')); ?>" alt="" class="img-fluid img-responsive" width="118" height="46" alt="CoreUI Logo">  
        </a>
        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
          <svg class="c-icon c-icon-lg">
            <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-menu')); ?>"></use>
          </svg>
        </button>
        
        <ul class="c-header-nav ml-auto mr-4">
          
          <li class="c-header-nav-item dropdown">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <img class="c-avatar-img" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&&size=40&name=<?php echo e(Auth::user()->name); ?>" />            
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">              
              <div class="dropdown-header bg-light py-2">
                <strong> <p><?php echo e((Auth::user()->name)); ?></p></strong>
              </div>
              <a class="dropdown-item" href="">
                <svg class="c-icon mr-2">
                  <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-use')); ?>r"></use>
                </svg> Perfil
              </a>                            
              <div class="dropdown-divider"></div>            
              <a class="dropdown-item" href="" onclick="document.getElementById('btnLogout').click()">                 
                <form action="/logout" method="POST">                  
                  <?php echo csrf_field(); ?>
                  <button type="submit" id="btnLogout" class="btn">
                    <svg class="c-icon mr-2">
                      <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-account-logout')); ?>"></use>                    
                    </svg> Cerrar Sesión
                  </button>
                </form>                                   
              </a>
            </div>                              
          </li>           
        </ul>
        
      </header>
      <div class="c-body">
        <main class="c-main">
          <div class="container-fluid">
            <div class="fade-in"></div>
            <?php echo $__env->yieldContent('contenido'); ?>            
          </div>
        </main>
        <footer class="c-footer">
          <div><a href="">SISPMED</a> © 2020</div>
          <div class="ml-auto">
            <img src="<?php echo e(asset('assets/dashboard/assets/img/fondo.PNG')); ?>" class="float-right" alt="" style="width:120px; margin-top:-10px;">
          </div>
        </footer>
      </div>
    </div>
    
    <script src="<?php echo e(asset('assets/dashboard/js/jquery-3.5.1.min.js')); ?>"></script>
    <!-- CoreUI and necessary plugins-->
    <script src="<?php echo e(asset('assets/dashboard/vendors/@coreui/coreui/js/coreui.bundle.min.js')); ?>"></script>
    <!--[if IE]><!-->
    <script src="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/js/svgxuse.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/dashboard/js/datatables.min.js')); ?>"></script>  
    <script src="<?php echo e(asset('assets/dashboard/js/datatables.min.js')); ?>"></script>  
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
     
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


  
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <!--<![endif]-->
    <?php echo $__env->yieldContent('scripts'); ?>

  </body>
</html><?php /**PATH C:\Users\andre\Desktop\sismped\sispmed\resources\views/layouts/app.blade.php ENDPATH**/ ?>