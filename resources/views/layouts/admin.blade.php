<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Curso Web | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{url('administration/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('administration/css/font-face.css')}}">
    
    <link rel="stylesheet" href="{{url('administration/fonts/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{url('administration/fonts/ionicons.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{url('administration/dist/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/iCheck/all.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/morris/morris.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/datepicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/timepicker/bootstrap-timepicker.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('administration/dist/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('administration/dist/css/dataTables.bootstrap4.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{url('administration/dist/css/mensajes.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/alertify.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/morris.css')}}">

   
    <link rel="shortcut icon" type="image/png" href="{{ asset('imagenes/favicon.png') }}">

    <link rel="stylesheet" href="{{url('administration/css/style.css')}}">


    @yield('estilos')
</head>
<body class="hold-transition skin-blue sidebar-mini agregar-scroll " style="background: #ecf0f5 !important;">

 
<div class="loader"></div>
<div id="loader2" class="loader2" style="display: none;"></div>
<div id="loader3" class="loader3" style="display: none;"></div>
<div class="wrapper" id="contenido_principal">

    <header class="main-header">
 
        
        <nav class="navbar navbar-static-top" role="navigation">
        
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Navegación</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

      
           
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            
                            
                            <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                    
                                
                                    <img src="{{url('imagenes/no-avatar.png')}}" class="user-image" alt="MI Foto"  />
                                
                                
                           
                            
                            
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">

                            
                                
                                    <td>
                                        <img src="{{url('imagenes/no-avatar.png')}}" class="img-circle" alt="User Image"/>
                                    </td>
                               

                                <p>
                                   {!! Auth::user()->name !!}
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">

                                <div class="pull-right">
                                            <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" 
                                                     class="btn btn-default btn-flat">
                                            Salir
                                        </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </nav>

        
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="image" align="center">
        
                     <td>
                        <img src="{{url('imagenes/no-avatar.png')}}" class="img-circle" alt="User Image"/>
                    </td>
                
                
                </div>
                <div class="info" style="text-align: center; padding-top: 10px">
                <a href="#" onclick="return myFunction();">
                        <p style="font-size: 20px">{!! Auth::user()->name !!}</p></a>
        
                </a>  
               
               
               
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="treeview">
                    <a href="{{url('administracion')}}"  onclick="return myFunction();">
                        <i class="fa fa-home" title="Inicio"></i>
                        <span >Inicio</span>
                    </a>

                </li>

                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-user"></i>
                      <span>Roles</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route ('roles.index') }}"><i class="fa fa-circle-o"></i> Listado</a></li>
                        <li><a href="{{ route ('roles.create') }}"><i class="fa fa-circle-o"></i> Agregar</a></li>
                    </ul>
                  </li>




            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <div id="mask" class="overlay"></div>
    <div class="content-wrapper" style="background: #ecf0f5 !important;">
    @yield('title')
    <!-- Main content -->
        <section class="content2" style="background: #ecf0f5 !important;">
                
                
            @yield('contenido')
        </section><!-- /.content -->

     
    </div><!-- /.content-wrapper -->
     <!-- Jquery JS-->
   
    
     <!-- Bootstrap JS-->
     <script src="{{url('administration/js/jquery-3.2.1.min.js')}}"></script>
     <script src="{{url('administration/js/popper.min.js')}}"></script>
     <script src="{{url('administration/js/bootstrap.min.js')}}"></script>


     
    <script src="{{url('administration/plugins/moment.min.js')}}"></script>
    <script src="{{url('administration/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{url('administration/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('administration/plugins/timepicker/bootstrap-timepicker.js')}}"></script>
    <script src="{{url('administration/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{url('administration/plugins/chartjs/Chart.min.js')}}"></script>
    
    <script src="{{url('administration/dist/js/validaNumerosLetras.js')}}"></script>
    <script src="{{url('administration/dist/js/app.js')}}"></script>
    <script src="{{url('administration/dist/js/sweetalert.min.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.extensions.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.dataTables.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.dataTables.js')}}"></script>

    <script src="{{url('administration/dist/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('administration/dist/js/dataTables.responsive.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>


   


    <script type="text/javascript">

    
   
        $(window).on('load', function(){ 
            $(".loader").fadeOut("slow");

        });

        </script>
        

    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });

        function myFunction() {
                $(".loader").show();
           
            }

  
       
    </script>



    @yield('script')
    </div>
</body>
</html>