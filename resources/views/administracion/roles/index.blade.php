@extends('layouts.admin')

@section('contenido')
     
@if (session('mensaje-registro'))
@include('mensajes.msj_correcto')
@endif

@if (session('mensaje-error'))
@include('mensajes.msj_rechazado')
@endif
    <div class="row">
           

         @if(count($roles) >0)
            <div class="col-12	col-sm-12	col-md-12	col-lg-12	col-xl-12"> 

                   
                <div class="table-responsive">

                  
                    <table class="table table-bordered" id="data-table">
                        <thead>
                            <tr class="fila" style="text-align:center">                                                  
                              <th>ID</th>
                              <th>Rol</th>
                              <th>Descripcion</th>
                              <th>Fecha Registro</th>
                              <th>Acción</th>
                            </tr>
                          </thead>

                      <tbody> 
                       
                      </tbody>
                    </table>
                  </div>
            
               

            
            </div>

     
            @else
            <div class="col-md-12 col-lg-12">
                    <div style="text-align: center;">
                        <img style="width: 150px" src="{{url('imagenes/caution.png')}}"  alt="No se encontraron registros"/>
                        <h2 class="number">Oh no!</h2>
                        <label style='color:#FA206A'>...No se ha encontrado ningún registro...</label>  
                        <br>
                        <a title="Agregar nuevo usuario" href="{{ route ('roles.create') }}" class="btn btn-primary" style="cursor:pointer; color:white" role="button">Agregar nuevo registro</a>

                    </div>
                   
                </div>
            
            @endif
        </div>

    <form method="POST" action="{{ route('roles.destroy', ':USER_ID') }}" accept-charset="UTF-8" id="form-delete">
        <input name="_method" type="hidden" value="DELETE">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
    </form>



        
       


  

</div>




 

    
@endsection

@section('script')

<script src="{{url('frontend/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript">


        $(document).ready(function() {
            setTimeout(function() {
                $("#correcto").fadeOut(300);
            },3000);

            
            
        });

  

        


    function eliminar_rol(id) {
       
       var row = $(this).parents('tr');
       
       var form = $('#form-delete');
       var url = form.attr('action').replace(':USER_ID', id);
       
       var data = form.serialize();
      
       swal({
               title: "Deseas dar de baja este registro?",
               text: "Se excluira del sistema!",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#28a745",
               confirmButtonText: "Aceptar!",
               cancelButtonText: "Cancelar!",
               closeOnConfirm: false,
               closeOnCancel: false
           },
           function(isConfirm){
               if (isConfirm) {
                  
                   $.post(url, data, function (result) {
                       swal("Registro dado de baja!", result.message, "success");
                       location.reload();
                   }).fail(function () {
                       swal("Error!! Registro no fue dado de baja!");
                      
                   });

               } else {
                   swal("Cancelado", "Se cancelo la acción", "error");
               }
           });
   }

    

    </script>

 

    <script type="text/javascript">


                $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

                });

     




    

          $(function () {
            
            var table = $('#data-table').DataTable({
                processing: true,
                "info": false,
                "autoWidth": false,
                "ordering": false,
                 "aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "All"]],
                "language": {
                  "search": "Buscar:",
                  "searchPlaceholder": "Ingrese el rol....",
                  "zeroRecords": "Lo sentimos, no se encontraron resultados",
                  "processing": "Buscando. Espere por favor...",
                  "sLengthMenu":     "Mostrar _MENU_ registros",
                  "oPaginate": {
                          "sFirst":    "Primero",
                          "sLast":     "Último",
                          "sNext":     "Siguiente",
                          "sPrevious": "Anterior"
                      },

                  },
                serverSide: true,
                ajax: "{{ url('administracion/roles_ajax') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: true},
                    {data: 'rol', name: 'rol', orderable: false, searchable: true},
                    {data: 'descripcion', name: 'descripcion', orderable: false, searchable: true},
                    {data: 'fecha_registro', name: 'fecha_registro', orderable: false, searchable: false},
                    {data: 'accion', name: 'accion', orderable: false, searchable: false},
                 
                ]
            });

      
            
          });
    </script>



@endsection