<!doctype html>
<html lang="en">
  <head>
    <title>Recuperar Contraseña - Plan Pro</title>
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

                        <form style="width: 100%;" method="POST" action="{{ route('password.request') }}">
                              {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">
                          <!-- Heading -->
                          <h3 class="dark-grey-text text-center">
                                <strong>Cambiar Contraseña</strong>
                              </h3>
                              <hr>

                          @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                         
    

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="input-group mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
                                   
                                    <span  class="input-group-text"><i class="fas fa-envelope" style="    padding-right: 3px;"></i></span>   
                                    <input placeholder="Ingrese su email" oninvalid="this.setCustomValidity('Se requiere que ingrese su email')" oninput="this.setCustomValidity('')"  id="email" type="email" class="form-control" name="email"  readonly value="{{$email}}" required autofocus>
                                </div>

                                @if ($errors->has('email'))
                                    <span >
                                        <strong style="color:white; padding-bottom:10px;">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="input-group mb-3{{ $errors->has('password') ? ' has-error' : '' }}">
                                  
                                   
                                    <span  class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input id="password" type="password" class="form-control" placeholder="Ingrese su contraseña" name="password" required>  
                                </div>

                                @if ($errors->has('password'))
                                    <span >
                                        <strong style="color:white; padding-bottom:10px;">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="input-group mb-3{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <span  class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input id="password_confirmation" type="password" class="form-control" placeholder="Validar contraseña" name="password_confirmation" required>  
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span >
                                        <strong style="color:white; padding-bottom:10px;">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                 
                            <div align="center" class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <label class="container_check">Mostrar contraseñas
                                        <input type="checkbox" onclick="mostrarPass()">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
        
        
                         
                     
        
                          <div class="d-flex justify-content-center login_container" style="margin-bottom:25px">
                              <button type="submit" name="button" class="btn login_btn">Cambiar contraseña</button>
                          </div>

                          <hr>

                    

                          <div class="mt-2">
                              <div class="d-flex justify-content-center links">
                                 <a style="color:white" href="{{url('/')}}" onclick="return myFunction();" class="ml-2">Regresar al inicio</a>
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

    <!--mobile menu js-->
    <script src="{{url('frontend/js/jquery.slicknav.min.js')}}"></script>

    <script src="{{url('administration/dist/js/sweetalert.min.js')}}"></script>
    
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

<script>
    function mostrarPass() {
      var x = document.getElementById("password");
      var y = document.getElementById("password_confirmation");
      if (x.type === "password" || y.type === "password") {
        x.type = "text";
        y.type = "text";
      } else {
        x.type = "password";
        y.type = "password";
      }
    }
</script>

  </body>
</html>