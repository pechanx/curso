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


    <section class="content-header"style="text-align:center; margin:auto; padding: 20px">
        <h1>PANEL DE REGISTRO | USUARIO</h1>

    </section>

    <div class="box box-primary">


        <form class="form-horizontal" id="form" method="post" action="{{ route('usuarios.store')}}" enctype="multipart/form-data">

                @csrf

            <section>
                <div class= "row">

                    <div class="col-md-6 col-xs-12 box-header">
                        <h3 style="text-align:center; margin:auto ;padding: 20px" class="box-title">Nuevo Usuario</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Foto de perfil (*)</label>
                            <input accept="image/*" class="form-control" type="file" id="path" name="path" >
                        </div>
                    </div>
                 </div>

            </section>


                    <div class="col-md-6 col-xs-12">
                         <div class="form-group ">
                              <label>Nombre (*)</label>
                         <input class="form-control" value="{{old('name')}}" type="text" id="name" name="name" placeholder="Ingrese el nombre" required onkeypress="return soloLetras(event)">
                              <span class="glyphicon glyphicon-user form-control-feedback"></span>
                         </div>

                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                               <label>Apellidos (*)</label>
                               <input class="form-control" value="{{old('apellidos')}}" type="text" id="apellidos" name="apellidos" placeholder="Ingrese los apellidos" required onkeypress="return soloLetras(event)>
                        </div>
                    </div>


                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                              <label>cedula (*)</label>
                              <input onblur="validarCedula()" class="form-control" value="{{old('cedula')}}" type="text" id="cedula" name="cedula" placeholder="Ingrese la cedula" required onkeypress="return soloNumeros(event)">
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>edad (*)</label>
                            <input class="form-control" value="{{old('edad')}}" type="number" id="edad" name="edad" placeholder="Ingrese su edad" onkeypress="return event.charCode >= 48" min="18" max="99">
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>email (*)</label>
                            <input onblur="validarEmail()" class="form-control" value="{{old('email')}}" type="email" id="email" name="email" placeholder="Ingrese su email valido" required="">
                        </div>
                    </div>

                     <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                             <label>Contraseña (*)</label>
                             <input class="form-control" type="password" id="password" name="password" placeholder="Ingrese la contraseña" required="" >
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                        <label>Roles</label>
                                        <select requered class="form-control select2" id="roles"  multiple="multiple" data-placeholder="Seleccione los roles" name ="roles[]" style="width: 100%;">
                                            @foreach($roles as $rol)
                                                <option value="{{$rol->id}}" >  {{ $rol->rol }} </option>
                                            @endforeach
                                        </select>
                            </div>

                    </div>

                </div>

                 <div class="row" >
                    <div class="col-md-12 col-xs-12"  align="center">

                     <input type="submit" class="btn btn-primary" value="Guardar">
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


<script type="text/javascript">
    var input1=  document.getElementById('cedula');
        input1.addEventListener('input',function(){
          if (this.value.length > 10)
            this.value = this.value.slice(0,10);
        })

        var input2=  document.getElementById('edad');
        input2.addEventListener('input',function(){
          if (this.value.length > 2)
            this.value = this.value.slice(0,2);
        })

  </script>




<script type="text/javascript">

function validarCedula() {
    var x = document.getElementById("cedula");
    var cedula = x.value;

    $.ajaxSetup({

      headers: {

          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }

      });

      if(cedula.length > 0){



                $.ajax({

                    type:'POST',

                    url: "<?php echo route('buscar_cedula_usuario') ?>",


                    data:{cedula:cedula},
                        beforeSend: function() {
                        $(".loader").show();
                    },

                    success:function(data){

                        $(".loader").hide();



                        if(data == "existe"){
                            swal({
                            title: "Lo sentimos!",
                            text: "La cédula ingresada ya se encuentra registrada",
                            type: "warning",
                            button: "Ok",
                            });

                            document.getElementById("cedula").value = "";
                            document.getElementById("cedula").style.borderColor = "red";

                        }

                        else{

                                document.getElementById("cedula").style.borderColor = "#b5b5b5";




                        }

                    }


                });

            }


            }


function validarEmail() {
  var x = document.getElementById("email");
  var email = x.value;

  $.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

    });

    if(email.length > 0){


    $.ajax({

      type:'POST',

      url: "<?php echo route('buscar_email_usuario') ?>",


      data:{email:email},
        beforeSend: function() {
        $(".loader").show();
      },

      success:function(data){

        $(".loader").hide();



        if(data == "existe"){
          swal({
        title: "¡Oh no!",
        text: "El email que ingresaste ya se encuentra registrado en el sistema",
        type: "warning",
        button: "Ok",
        });
        document.getElementById("email").value = "";
        document.getElementById("email").style.borderColor = "red";


        }else{
          document.getElementById("email").style.borderColor = "#cacaca";
        }


      }

      });

    }
}


function validarEmail() {
  var x = document.getElementById("email");
  var email = x.value;

  $.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

    });

    if(email.length > 0){


    $.ajax({

      type:'POST',

      url: "<?php echo route('buscar_email_usuario') ?>",


      data:{email:email},
        beforeSend: function() {
        $(".loader").show();
      },

      success:function(data){

        $(".loader").hide();



        if(data == "existe"){
          swal({
        title: "¡Oh no!",
        text: "El email que ingresaste ya se encuentra registrado en el sistema",
        type: "warning",
        button: "Ok",
        });
        document.getElementById("email").value = "";
        document.getElementById("email").style.borderColor = "red";


        }else{
          document.getElementById("email").style.borderColor = "#cacaca";
        }


      }

      });

    }
}


$(document).ready(function() {
          $('#roles').select2({
            ajax: {
                url: "<?php echo route('cargar_roles') ?>",
                data: function (params) {
                    return {
                        search: params.term,
                        page: params.page || 1
                    };
                },
                dataType: 'json',
                processResults: function (data) {
                   // console.log(JSON.stringify(data));
                    data.page = data.page || 1;
                    return {
                        results: data.items.map(function (item) {
                            return {
                                id: item.id,
                                text: item.rol
                            };
                        }),
                        pagination: {
                            more: data.pagination
                        }
                    }
                },
                cache: true,
                delay: 250
            },
            placeholder: 'Seleccion al menos 1 rol',
//                minimumInputLength: 2,
            multiple: true
        });

        });




</script>

@endsection
