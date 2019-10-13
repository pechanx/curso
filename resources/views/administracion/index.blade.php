@extends('layouts.admin')


@section('contenido')

@if (session('mensaje-registro'))
@include('mensajes.msj_correcto')
@endif

@if (session('mensaje-error'))
@include('mensajes.msj_rechazado')
@endif

<section class="content-header">
  <h1>
    Dashboard
    <small>Panel de control</small> 
  </h1>

  

</section>
   

<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">

                    <?php

                    $usuarios= 0;
        
                    ?>
         
            <h3 id="afiliados">{{$usuarios}}</h3>

              <p>Nro. Usuarios</p>
            </div>
            <div class="icon">
                    <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Ver usuarios <i class="fa fa-arrow-circle-right"></i></a>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                    <?php

                    $roles= 0;
        
                    ?>
         
            <h3 id="referidos">{{$roles}}</h3>

              <p>Nro. Roles</p>
            </div>
            <div class="icon">
              <i class="fa fa-address-book-o"></i>
            </div>
            <a href="#" class="small-box-footer">Ver roles <i class="fa fa-arrow-circle-right"></i></a>
         
          </div>
        </div>

       

</div>




      
@endsection

@section('script')

<script src="{{url('administration/dist/js/Flot/jquery.flot.js')}}"></script>
<script src="{{url('administration/dist/js/Flot/jquery.flot.resize.js')}}"></script>
<script src="{{url('administration/dist/js/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{url('administration/dist/js/Flot/jquery.flot.categories.js')}}"></script>
<script src="{{url('administration/dist/js/Chart.bundle.min.js')}}"></script>







      
@endsection



