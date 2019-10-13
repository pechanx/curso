@extends('layouts.admin')



@section('contenido')

    

   
      <div class="row">
        <div class="col-lg-12 col-ml-12">
          <div class="row">
            <!-- Textual inputs start -->
            <div class="col-12">
                <div class="col-md-12" align="center" style="padding-bottom: 15px">
                    <h3 style="color:black; text-align:center">Editar rol</h3>
                 </div>
                  @if (session('mensaje-registro'))
                  @include('mensajes.msj_correcto')
                  @endif

                  @if (session('mensaje-error'))
                  @include('mensajes.msj_rechazado')
                  @endif
    
                  <form method="post" action="{{ route('roles.update',$rol->id) }}"  role="form">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    
                    <div class="form-group row">
                            <div class="col-md-4 col-xs-12">
                                    <div class="form-group">
                                            <label>Rol (*)</label>
                                    <input class="form-control" type="text" id="rol" name="rol" placeholder="Ingrese el nrol" required="" value="{{$rol->rol}}">
                                           
                                        </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                    <div class="form-group">
                                            <label>Descripción (*)</label>
                                            <textarea class="form-control" rows="5" id="descripcion" name="descripcion" required=""> {{$rol->descripcion}}</textarea>
                                          
                                        </div>
                            </div>

                            <div class="col-md-4 col-xs-12">
                                    <div class="form-group">
                                            <label>Fecha (*)</label>
                                            <input class="form-control" type="date" id="fecha_registro" name="fecha_registro" required="" value="{{$rol->fecha_registro}}">
                                           
                                        </div>
                            </div>

                            <div class="col-md-12 col-xs-12" align="center">
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                    
                            </div>
                    </div>
                </form>
            </div>
            <!-- Textual inputs end -->
            <!-- Radios start -->
            </div>
          </div>
        </div>
      </div>
    


@endsection


@section('script')

<script type="text/javascript">

$(function() {
       $("form").submit(function(e) {
    
           
             $('button[type=submit]').addClass("disabled-button");
          });
       });
       

  





   
  

</script>


      
@endsection