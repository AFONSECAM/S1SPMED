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
    <link rel="icon" type="image/x-icon" href="{{asset('assets/dashboard/assets/favicon/favicon2.ico')}}" />
    <!-- Main styles for this application-->
    <link href="{{asset('assets/dashboard/css/style.css')}}" rel="stylesheet">    
    <link href="{{asset('assets/dashboard/css/datatables.min.css')}}" rel="stylesheet">   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet"/>

    @yield('style')
  </head>
  <body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
      <div class="c-sidebar-brand d-lg-down-none">
        {{-- <img src="{{asset('assets/dashboard/assets/brand/logo1.png#full')}}" alt="" class="img-fluid img-responsive" width="118" height="46"> --}}
        <img src="{{ asset('assets/landing/assets/img/logo2.png')}}" alt="" class="img-fluid img-responsive" width="200px" height="46">        
      </div>
      <ul class="c-sidebar-nav ps ps--active-y">
        @if (Auth::check())
          @foreach (\App\Models\User::$menu[Auth::user()->rol->nomRol] as $value)            
              @if (isset($value["hijos"]))
              <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
                  <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset($value['icono']) }}"></use>
                  </svg> {{$value['nombre']}}
                </a>                
                <ul class="c-sidebar-nav-dropdown-items">
                @foreach ($value["hijos"] as $hijo)
                  <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ $hijo['url']}}" >
                      <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset($hijo['icono']) }}"></use>                        
                      </svg> {{ $hijo['nombre']}}
                    </a>
                  </li>
                @endforeach
                </ul>
              </li>
                          
              @else
                <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ $value['url']}}">
                    <svg class="c-sidebar-nav-icon">
                      <use xlink:href="{{ asset($value['icono']) }}"></use>
                    </svg> 
                      {{ $value["nombre"] }} 
                  </a>
                </li>  
                @if ($value["url"] == "/home")
                <li class="c-sidebar-nav-title">
                  Modulos
                </li>    
                @endif                      
              @endif
          @endforeach    
        @endif

         {{-- Dashboard --}}
       
       

        {{-- <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="index.html">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard<span class="badge badge-info">NEW</span></a></li>
        <li class="c-sidebar-nav-title">Theme</li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="colors.html">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop1"></use>
            </svg> Colors</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="typography.html">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
            </svg> Typography</a></li>
        <li class="c-sidebar-nav-title">Components</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
            </svg> Base</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span class="c-sidebar-nav-icon"></span> Breadcrumb</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/cards.html"><span class="c-sidebar-nav-icon"></span> Cards</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/carousel.html"><span class="c-sidebar-nav-icon"></span> Carousel</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/collapse.html"><span class="c-sidebar-nav-icon"></span> Collapse</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/forms.html"><span class="c-sidebar-nav-icon"></span> Forms</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/jumbotron.html"><span class="c-sidebar-nav-icon"></span> Jumbotron</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/list-group.html"><span class="c-sidebar-nav-icon"></span> List group</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/navs.html"><span class="c-sidebar-nav-icon"></span> Navs</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/pagination.html"><span class="c-sidebar-nav-icon"></span> Pagination</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/popovers.html"><span class="c-sidebar-nav-icon"></span> Popovers</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/progress.html"><span class="c-sidebar-nav-icon"></span> Progress</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/scrollspy.html"><span class="c-sidebar-nav-icon"></span> Scrollspy</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/switches.html"><span class="c-sidebar-nav-icon"></span> Switches</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tables.html"><span class="c-sidebar-nav-icon"></span> Tables</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tabs.html"><span class="c-sidebar-nav-icon"></span> Tabs</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tooltips.html"><span class="c-sidebar-nav-icon"></span> Tooltips</a></li>
          </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>
            </svg> Buttons</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/buttons.html"><span class="c-sidebar-nav-icon"></span> Buttons</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/button-group.html"><span class="c-sidebar-nav-icon"></span> Buttons Group</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/dropdowns.html"><span class="c-sidebar-nav-icon"></span> Dropdowns</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/brand-buttons.html"><span class="c-sidebar-nav-icon"></span> Brand Buttons</a></li>
          </ul>
        </li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="charts.html">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
            </svg> Charts</a></li>
        <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-star"></use>
            </svg> Icons</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-free.html"> CoreUI Icons<span class="badge badge-success">Free</span></a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-brand.html"> CoreUI Icons - Brand</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-flag.html"> CoreUI Icons - Flag</a></li>
          </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-bell')}}"></use>
            </svg> Notifications</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/alerts.html"><span class="c-sidebar-nav-icon"></span> Alerts</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/badge.html"><span class="c-sidebar-nav-icon"></span> Badge</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/modals.html"><span class="c-sidebar-nav-icon"></span> Modals</a></li>
          </ul>
        </li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="widgets.html">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-calculator"></use>
            </svg> Widgets<span class="badge badge-info">NEW</span></a></li>
        <li class="c-sidebar-nav-divider"></li>
        <li class="c-sidebar-nav-title">Extras</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-star"></use>
            </svg> Pages</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="login.html" target="_top">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                </svg> Login</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="register.html" target="_top">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                </svg> Register</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="404.html" target="_top">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
                </svg> Error 404</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="500.html" target="_top">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
                </svg> Error 500</a></li>
          </ul>
        </li>
        <li class="c-sidebar-nav-item mt-auto"><a class="c-sidebar-nav-link c-sidebar-nav-link-success" href="https://coreui.io" target="_top">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
            </svg> Download CoreUI</a></li>
        
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link c-sidebar-nav-link-danger" href="https://coreui.io/pro/" target="_top">                              
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-layers"></use>
            </svg> Try CoreUI<strong>PRO</strong></a>
          </li>  --}}                            
      </ul>
      <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
    <div class="c-wrapper c-fixed-components">
      <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
          <svg class="c-icon c-icon-lg">
            <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
          </svg>
        </button>
        <a class="c-header-brand d-lg-none" href="">
          <img src="{{ asset('assets/landing/assets/img/logo2.png')}}" alt="" class="img-fluid img-responsive" width="118" height="46" alt="CoreUI Logo">  
        </a>
        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
          <svg class="c-icon c-icon-lg">
            <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
          </svg>
        </button>
        {{-- <ul class="c-header-nav d-md-down-none">
          <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Dashboard</a></li>
          <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Users</a></li>
          <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Settings</a></li>
        </ul> --}}
        <ul class="c-header-nav ml-auto mr-4">
          {{-- <li class="c-header-nav-item d-md-down-none mx-2">
            <a class="c-header-nav-link" href="#">
              <svg class="c-icon">
                <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-bell')}}"></use>
              </svg>
            </a>
          </li>
          <li class="c-header-nav-item d-md-down-none mx-2">
            <a class="c-header-nav-link" href="#">
              <svg class="c-icon">
                <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-list-rich')}}"></use>
              </svg>
            </a>
          </li>--}}
          <li class="c-header-nav-item dropdown">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <img class="c-avatar-img" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&&size=40&name={{ Auth::user()->name }}" />            
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">              
              <div class="dropdown-header bg-light py-2">
                <strong> <p>{{ (Auth::user()->name) }}</p></strong>
              </div>
              <a class="dropdown-item" href="">
                <svg class="c-icon mr-2">
                  <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-use')}}r"></use>
                </svg> Perfil
              </a>                            
              <div class="dropdown-divider"></div>            
              <a class="dropdown-item" href="" onclick="document.getElementById('btnLogout').click()">                 
                <form action="/logout" method="POST">                  
                  @csrf
                  <button type="submit" id="btnLogout" class="btn">
                    <svg class="c-icon mr-2">
                      <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-account-logout')}}"></use>                    
                    </svg> Cerrar Sesión
                  </button>
                </form>                                   
              </a>
            </div>                              
          </li>           
        </ul>
        {{-- <div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item">
              <button  onClick="history.go(-1); return false;">
                <svg class="c-icon mr-2">
                  <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-arrow-circle-left')}}"></use>                    
                </svg> Atrás
              </button>              
            </li>                        
            <!-- Breadcrumb Menu-->
          </ol>
        </div> --}}
      </header>
      <div class="c-body">
        <main class="c-main">
          <div class="container-fluid">
            <div class="fade-in"></div>
            @yield('contenido')            
          </div>
        </main>
        <footer class="c-footer">
          <div><a href="">SISPMED</a> © 2020</div>
          <div class="ml-auto">
            <img src="{{asset('assets/dashboard/assets/img/fondo.PNG')}}" class="float-right" alt="" style="width:120px; margin-top:-10px;">
          </div>
        </footer>
      </div>
    </div>
    
    <script src="{{asset('assets/dashboard/js/jquery-3.5.1.min.js')}}"></script>
    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('assets/dashboard/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
    <!--[if IE]><!-->
    <script src="{{asset('assets/dashboard/vendors/@coreui/icons/js/svgxuse.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/datatables.min.js')}}"></script>  
    <script src="{{asset('assets/dashboard/js/datatables.min.js')}}"></script>  
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
    @yield('scripts')

  </body>
</html>