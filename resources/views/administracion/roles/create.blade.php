@extends('layouts.admin')

@section('contenido')
    @if (session('mensaje-registro'))
        @include('mensajes.msj_correcto')
    @endif
    @if(!$errors->isEmpty())
        <div class="alert alert-danger">
            <p><strong>Error!! </strong>Corrija los siguientes errores</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="content-header">
        <h1>Roles</h1>
       
    </section>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Nuevo Rol</h3>
        </div><!-- /.box-header -->
        <div class="box-body">

        <form class="form-horizontal" id="form" method="post" action="{{ route('roles.store')}}"> 
           
                @csrf

                <div class="row" ><!--Inicio de row -->
                            <div class="col-md-4 col-xs-12">
                                    <div class="form-group">
                                            <label>Rol (*)</label>
                                            <input class="form-control" type="text" id="rol" name="rol" placeholder="Ingrese el nrol" required="">
                                           
                                        </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                    <div class="form-group">
                                            <label>Descripción (*)</label>
                                            <textarea class="form-control" rows="5" id="descripcion" name="descripcion" required=""></textarea>
                                          
                                        </div>
                            </div>

                            <div class="col-md-4 col-xs-12">
                                    <div class="form-group">
                                            <label>Fecha (*)</label>
                                            <input class="form-control" type="date" id="fecha_registro" name="fecha_registro" required="">
                                           
                                        </div>
                            </div>

                            <div class="col-md-12 col-xs-12" align="center">
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                    
                            </div>
                      
            
                </div>


            </form>
        </div>
    </div>
@endsection

@section('script')

<script>

$(function() {
       $("form").submit(function(e) {
    
           
             $('button[type=submit]').addClass("disabled-button");
          });
       });


</script>


@endsection