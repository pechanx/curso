<!doctype html>
<html lang="en">
  <head>
    <title>Recuperar contraseña - PlanPro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- carousel CSS -->
    

    <!--header icon CSS -->
    <link rel="icon" href="{{ asset('frontend/images/icon.png') }}">
    <!-- animations CSS -->
    <link rel="stylesheet" href="{{url('frontend/css/animate.min.css')}}">
    <!-- font-awsome CSS -->
    <link rel="stylesheet" href="{{url('frontend/css/font-awesome.min.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
    <!-- mobile menu CSS -->
    <link rel="stylesheet" href="{{url('frontend/css/slicknav.min.css')}}">
    <!--css animation-->
    <link rel="stylesheet" href="{{url('frontend/css/animation.css')}}">
    <!--css animation-->
    <link rel="stylesheet" href="{{url('frontend/css/material-design-iconic-font.min.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
    <!-- responsive CSS -->
    <link rel="stylesheet" href="{{url('frontend/css/responsive.css')}}">
    <link rel="stylesheet" href="{{url('css/mensajes.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/sweetalert.css')}}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  </head>
  <body>

        <div class="loader"></div>

    



    <!--welcome area start-->
    <div class="welcome-area" id="home">
       
        <div class="container banner2">

           
          <div class="row">
    

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        

            <div class="user_card">
                    <div class="d-flex justify-content-center">
                        <div class="brand_logo_container">
                            <a href="{{url('/')}}" title="Ir al inicio" onclick="return myFunction();">  <img src="{{url('frontend/images/redondo.png')}}" class="brand_logo" alt="Logo"> </a>
                        </div> 
                    </div>
                    <div class="d-flex justify-content-center form_container">

                        <form style="width: 90%;" class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}
                          <!-- Heading -->
                          <h3 class="dark-grey-text text-center">
                            <strong>Recuperar Contraseña</strong>
                          </h3>
                          <hr>
                          @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                           @endif

                         
            
                          <div  class="input-group mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
                         
        
                              <span  class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input autocomplete="off" oninvalid="this.setCustomValidity('Se requiere que ingrese su email')" placeholder="Ingrese su Email" oninput="this.setCustomValidity('')"  id="email" type="email" class="form-control" name="email"  value="{{ old('email') }}" required autofocus>
                          
                           
                            
                                
        
        
                          </div>
        
        
                         
                     
        
                          <div class="d-flex justify-content-center login_container" style="margin-bottom:25px">
                              <button type="submit" name="button" class="btn login_btn">Enviar Link</button>
                          </div>

                          <hr>

                          <div class="mt-2">
                              <div class="d-flex justify-content-center links">
                                 ¿No tienes una cuenta? <a href="{{ route('register') }}" onclick="return myFunction();" class="ml-2">Regístrate aqui</a>
                              </div>
                              
                          </div>

                          <div class="mt-2">
                              <div class="d-flex justify-content-center links">
                                 ¿Ya tienes una cuenta? <a href="{{ route('login') }}" onclick="return myFunction();" class="ml-2">Inicia sesión aqui</a>
                              </div>
                              
                          </div>

                          <div class="mt-2">
                              <div class="d-flex justify-content-center links">
                                 <a style="color:white" href="{{url('/')}}" class="ml-2" onclick="return myFunction();">Regresar al Inicio</a>
                              </div>
                              
                          </div>
        
                        </form>
                        <!-- Form -->




                   
                    </div>

            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    
                </div>

            </div>
            
        </div>
    </div>
    <!--welcome area end-->



 

    <!-- jquery 2.2.4 js-->
    <script src="{{url('frontend/js/jquery-2.2.4.min.js')}}"></script>
    <!-- popper js-->
    <script src="{{url('frontend/js/popper.js')}}"></script>
    <!-- wow js-->
    <script src="{{url('frontend/js/wow.min.js')}}"></script>
    <!-- bootstrap js-->
    <script src="{{url('frontend/js/bootstrap.min.js')}}"></script>
    <!--skroller js-->

    <!--mobile menu js-->
    <script src="{{url('frontend/js/jquery.slicknav.min.js')}}"></script>

    <script src="{{url('administration/dist/js/sweetalert.min.js')}}"></script>

    @if (session('status'))

    <script>



        swal({
          title: "Hola",
          text: 'Solicitud procesada con éxito, te acabamos de enviar un link  de recuperación a tu correo electrónico',
          type: "success",
          button: "ok",
        });

    

      </script>

      
        
    @endif
    <!-- main js-->
    <script src="{{url('frontend/js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>

<script type="text/javascript">
   
    $(window).on('load', function(){ 
        $(".loader").fadeOut("slow");

    });

    function myFunction() {
            $(".loader").show();
       
        }

    </script>

  </body>
</html>
