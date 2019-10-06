<!doctype html>
<html lang="en">
  <head>
        <title>Verificar email</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- carousel CSS -->
    <link rel="icon" href="{{ asset('frontend/images/icon.png') }}">
    <!-- font-awsome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}">

    <!--css animation-->
    <link rel="stylesheet" href="{{ asset('/frontend/css/material-design-iconic-font.min.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
    <!-- responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css')}}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">



  </head>
  <body>


    <!--welcome area start-->
    <div class="welcome-area" id="home">
      
        <div class="container banner3">
            <div class="row">

                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                    
                </div>

                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

                    <div class="user_card">
                        <div class="d-flex justify-content-center">
                            <div class="brand_logo_container">
                                <a href="{{url('/')}}" onclick="return myFunction();" title="Ir al inicio">  <img src="{{url('frontend/images/redondo.png')}}" class="brand_logo" alt="Logo"> </a>
                            </div> 
                        </div>
                        <div class="d-flex justify-content-center form_container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                   <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <br>
                                                <h4 align="center"><strong>Hola {{ auth()->user()->nombres }} {{ auth()->user()->apellidos }}</strong></h4>
                                                <h4 align="center"><strong>verifica tu correo electrónico</strong></h4>

                                                <div class="card-body" style="text-align: justify;">
                                                    @if (session('resent'))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                                                        </div>
                                                    @endif

                                                    {{ __('Gracias por haberte registrado en Plan Pro. Antes de proceder a gestionar tu panel de administración, por favor haz click en el enlace para verificar tu correo electrónico: ') }} 
                                                    <br>
                                                </div>
                                                <center><a style="color: red;" href="{{ route('verification.resend') }}"> <strong>{{ __('Haga clic aquí para enviar el correo de verificación.') }}</strong></a></center>
                                                <br>
                                                <br>
                                                <center>
                                                    <a class="btn btn-default btn-flat" style="background-color: red; color: white; border-color: red;" href="{{ route('logout') }}"
                                                      onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                                        {{ __('Cerrar sesión') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </center>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>
    </div>
    </body>
    <!--welcome area end-->
</html>


