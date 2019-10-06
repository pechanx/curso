<!doctype html>
<html lang="en">
  <head>
   

    <title>Plan Pro- Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


    <link rel="icon" href="{{ asset('frontend/images/icon.png') }}">
    <!-- font-awsome CSS -->
    <link rel="stylesheet" href="{{url('frontend/css/font-awesome.min.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
    <!-- responsive CSS -->
    <link rel="stylesheet" href="{{url('frontend/css/responsive.css')}}">
    <link rel="stylesheet" href="{{url('css/mensajes.css')}}">
    <link rel="stylesheet" href="{{url('css/sweetalert.css')}}">
      <link rel="stylesheet" href="{{url('css/alertify.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  </head>
  <body>

        <div class="loader"></div>


    <!--welcome area start-->
    <div class="welcome-area" id="home">
      
        <div class="container banner2">

        

          <div class="row">
           

            <div class="col-xl-4 col-lg-4 col-md-2 col-sm-12 col-12">
                    
                </div>

                <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-12">

            <div class="user_card">
                    <div class="d-flex justify-content-center">
                        <div class="brand_logo_container">
                        <a href="{{url('login')}}" onclick="return myFunction();" title="Ir al inicio">  <img src="{{url('frontend/images/redondo.png')}}" class="brand_logo" alt="Logo"> </a>
                        </div> 
                    </div>
                    <div class="d-flex justify-content-center form_container">
                           
                        <form style="width: 100%;" method="POST" action="{{ route('login') }}">
                        @csrf
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                                    <div class="row">
                                        @if (Session::has('message'))
                                          <center><div class="alert alert-success" id="msj_sesion">{{ Session::get('message') }}</div></center>
                                        @endif
                                        @if (session('mensaje-registro'))
                                            @include('mensajes.msj_correcto')
                                        @endif
                            
                                        @if (session('mensaje-error'))
                                            @include('mensajes.msj_rechazado')
                                        @endif
                            
                                    </div>

                                    @if ($errors->has('email'))
                                    <span >
                                        <strong style="color:white; padding-bottom:10px;">{{ $errors->first('email') }}</strong>
                                    </span>
                                     @endif

                                     <br>
                            <div class="input-group mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
                                
                    
                                    <span  class="input-group-text"><i class="fas fa-user" style="    padding-right: 3px;"></i></span>
                                
                                <input id="email"  type="email" class="form-control" name="email" placeholder="Ingrese su email"  value="{{ old('email') }}" required autofocus>
                              
                             
                            </div>
                            <div class="input-group mb-2{{ $errors->has('password') ? ' has-error' : '' }}">

                                @if ($errors->has('password'))
                                <span >
                                            <strong style="color:white; padding-bottom:10px;">{{ $errors->first('password') }}</strong>
                                </span>
                                    @endif

                                    <br>
                               
                                    <span  class="input-group-text"><i class="fas fa-key"></i></span>
                                
                                    <input id="password" type="password" class="form-control" placeholder="Ingrese su contraseña" name="password" required>
                                   
                                  
                            </div>
                            <div align="center" class="form-group">
                                <div class="custom-control custom-checkbox">
                                 

                                        <label class="container_check">Mostrar contraseña
                                            <input type="checkbox" onclick="mostrarPass()">
                                            <span class="checkmark"></span>
                                          </label>

                           
                                    
                                </div>
                            </div>
                        
                    </div>
                    <div class="d-flex justify-content-center login_container">
                        <button type="submit" name="button" class="btn login_btn">Ingresar</button>
                    </div>
                    <div class="mt-2">
                        <div class="d-flex justify-content-center links">
                           ¿No tienes una cuenta? <a style="font-weight: bold; color: #4d4d4d;" href="{{ route('register') }}" onclick="return myFunction();" class="ml-2">Regístrate</a>
                        </div>
                        <div class="d-flex justify-content-center links">
                                <a style="font-weight: bold; color: #4d4d4d;" href="{{ route('password.request') }}" onclick="return myFunction();">
                                        ¿Olvidaste la contraseña?
                                    </a>
                        </div>
                    </div>

                  </form>
                </div>

            </div>

            <div class="col-xl-4 col-lg-4 col-md-2 col-sm-12 col-12">
                    
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



    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>

<script type="text/javascript">

$(function() {
           $("form").submit(function(e) {
        
               
                 $('button[type=submit]').addClass("disabled-button");
              });
           });

           
   
    $(window).on('load', function(){ 
        $(".loader").fadeOut("slow");

    });

    function myFunction() {
            $(".loader").show();
       
        }

    </script>

<script>
    function mostrarPass() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>

  </body>

  <script type="text/javascript">
  
    $(document).ready(function() {
        setTimeout(function() {
           
            $(".error").fadeOut(300);

        },3000);

        
    });


  </script>


</html>



