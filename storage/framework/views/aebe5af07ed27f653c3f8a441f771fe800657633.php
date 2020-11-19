<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('assets/dashboard/assets/favicon/apple-icon-57x57.png')); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('assets/dashboard/assets/favicon/apple-icon-60x60.png')); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('assets/dashboard/assets/favicon/apple-icon-72x72.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('assets/dashboard/assets/favicon/apple-icon-76x76.png')); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('assets/dashboard/assets/favicon/apple-icon-114x114.png')); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('assets/dashboard/assets/favicon/apple-icon-120x120.png')); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('assets/dashboard/assets/favicon/apple-icon-144x144.png')); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('assets/dashboard/assets/favicon/apple-icon-152x152.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('assets/dashboard/assets/favicon/apple-icon-180x180.png')); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo e(asset('assets/dashboard/assets/favicon/android-icon-192x192.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/dashboard/assets/favicon/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('assets/dashboard/assets/favicon/favicon-96x96.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/dashboard/assets/favicon/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('assets/dashboard/assets/favicon/manifest.json')); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('assets/dashboard/assetsassets/favicon/ms-icon-144x144.png')); ?>">
    <meta name="theme-color" content="#ffffff">
    <!-- Main styles for this application-->
    <link href="<?php echo e(asset('assets/dashboard/css/style.css')); ?>" rel="stylesheet">    
    <link href="<?php echo e(asset('assets/dashboard/css/datatables.min.css')); ?>" rel="stylesheet">    
    <?php echo $__env->yieldContent('style'); ?>
  </head>
  <body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
      <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
          <use xlink:href="<?php echo e(asset('assets/dashboard/assets/brand/coreui.svg#full')); ?>"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
          <use xlink:href="<?php echo e(asset('assets/dashboard/assets/brand/coreui.svg#signet')); ?>"></use>
        </svg>
      </div>
      <ul class="c-sidebar-nav ps ps--active-y">
         
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="/home">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-speedometer')); ?>"></use>
            </svg> 
            Dashboard <span class="badge badge-info">NEW</span>
          </a>
        </li>

        <li class="c-sidebar-nav-title">
          Modulos
        </li>

        
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
          <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-briefcase')); ?>"></use>
            </svg> Administrativo
          </a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="notifications/alerts.html">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-people')); ?>"></use>
                </svg> Pacientes
              </a>
            </li>
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="notifications/alerts.html">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-medical-cross')); ?>"></use>
                </svg> Empleados
              </a>
            </li>
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="/empresa">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-hospital')); ?>"></use>
                </svg> Empresa                
              </a>
            </li>
          </ul>
        </li>

        
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
          <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-calendar')); ?>"></use>
            </svg> Agenda 
          </a>
          <ul class="c-sidebar-nav-dropdown-items" style="text-align: right">
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="notifications/alerts.html" >
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-calendar-check')); ?>"></use>
                </svg> Agendar
              </a>
            </li>
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="/agenda">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-history')); ?>"></use>
                </svg> Consultar
              </a>
            </li>
          </ul>
        </li>
       

                          
          <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="/tiposid">                          
              <i class="fas fa-home"></i>Tipos ID
            </a>
          </li>
          <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="/sedes">                          
              <i class="fas fa-home"></i>Sedes
            </a>
          </li>
        </ul>
      <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
    <div class="c-wrapper c-fixed-components">
      <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
          <svg class="c-icon c-icon-lg">
            <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-menu')); ?>"></use>
          </svg>
        </button><a class="c-header-brand d-lg-none" href="#">
          <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="<?php echo e(asset('assets/dashboard/assets/brand/coreui.svg#full')); ?>"></use>
          </svg></a>
        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
          <svg class="c-icon c-icon-lg">
            <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-menu')); ?>"></use>
          </svg>
        </button>
        
        <ul class="c-header-nav ml-auto mr-4">
          
          <li class="c-header-nav-item dropdown">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <img class="c-avatar-img" src="<?php echo e(asset('assets/dashboard/assets/img/avatars/6.jpg')); ?>" />            
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">              
              <div class="dropdown-header bg-light py-2">
                <strong> <p><?php echo e((Auth::user()->name) . " " . "Fonseca"); ?></p></strong>
              </div>
              <a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                  <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-use')); ?>r"></use>
                </svg> Perfil
              </a>                            
              <div class="dropdown-divider"></div>            
              <a class="dropdown-item" href="#" onclick="document.getElementById('btnLogout').click()">                 
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
          <div><a href="https://coreui.io">CoreUI</a> © 2020 creativeLabs.</div>
          <div class="ml-auto">Powered by&nbsp;<a href="https://coreui.io/">CoreUI</a></div>
        </footer>
      </div>
    </div>
    
    <script src="<?php echo e(asset('assets/dashboard/js/jquery-3.5.1.min.js')); ?>"></script>
    <!-- CoreUI and necessary plugins-->
    <script src="<?php echo e(asset('assets/dashboard/vendors/@coreui/coreui/js/coreui.bundle.min.js')); ?>"></script>
    <!--[if IE]><!-->
    <script src="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/js/svgxuse.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/dashboard/js/datatables.min.js')); ?>"></script>
    <!--<![endif]-->
    <?php echo $__env->yieldContent('scripts'); ?>
  </body>
</html><?php /**PATH C:\xampp\htdocs\proyecto\resources\views/layouts/app.blade.php ENDPATH**/ ?>