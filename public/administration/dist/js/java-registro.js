$(document).ready(function() {
    $("input[type=radio]").click(function(event){
        var valor = $(event.target).val();
        if(valor =="Estudiante"){
            $("#carrera").show();
            $("#facultad").show();
            $("#titulo").hide();
        } else if (valor == "Profesional") {
            $("#carrera").hide();
            $("#facultad").hide();
            $("#titulo").show();
        }
    });

});
$("#nacionalidades").change(function (event) {
    var cod = document.getElementById("nacionalidades").value;
    var input_pais= document.getElementById("pais");
    if (cod =='Extranjero No Residente'){
        $('#label-dni').html('DNI/Pasaporte');
        $('#label-pais').html('Pais');
        $('#label-provincia').html('Provincia');
        $('#label-canton').html('Cantón');
        input_pais.disabled= false;
        input_pais.value="";
        $("#ciudad").show();
        $("#provincia").hide();
        $("#canton").hide();

    }else if (cod =='Ecuatoriano'){
        $('#label-dni').html('Cedula');
        $('#label-pais').html('Pais');
        $('#label-provincia').html('Provincia');
        $('#label-canton').html('Cantón');
        input_pais.disabled= true;
        input_pais.value="Ecuador";
        $("#ciudad").hide();
        $("#provincia").show();
        $("#canton").show();

    }else if (cod =='Extranjero Residente' ){
        $('#label-dni').html('DNI/Pasaporte');
        $('#label-pais').html('Pais Origen');
        $('#label-provincia').html('Provincia Hospedado');
        $('#label-canton').html('Cantón Hospedado');
        input_pais.disabled= false;
        input_pais.value="";
        $("#ciudad").hide();
        $("#provincia").show();
        $("#canton").show();

    }

});
$("#facultades").change(function (event) {
    var cod = document.getElementById("facultades").value;
    if(cod==''){
        $("#carreras").empty();
        $("#carreras").append("<option value=''>Seleccione la carrera</option>")
    }
    else {
        $.get('carreras/' + event.target.value + "", function (response, facultades) {
            $("#carreras").empty();
            for (i = 0; i < response.length; i++) {
                $("#carreras").append("<option value='" + response[i].id + "'>" + response[i].nombre + "</option>")

            }
        })
    }

});
$("#provincias").change(function (event) {
    var cod = document.getElementById("provincias").value;
    if(cod==''){
        $("#cantones").empty();
        $("#cantones").append("<option value=''>Seleccione el cantón</option>")
    }
    else {
        $.get('cantones/' + event.target.value + "", function (response, provincias) {
            $("#cantones").empty();
            for (i = 0; i < response.length; i++) {
                $("#cantones").append("<option value='" + response[i].id + "'>" + response[i].nombre + "</option>")

            }
        })
    }

});
$("#registro").click(function(){
    var form = $('#form');
    var route = window.location;
    var token = $("#token").val();
    var dato = form.serialize();

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data:dato,

        success:function(){
            /*
             swal({
             title: "Buen Trabajo!",
             text: "Usuario agregado correctamente",
             type: "success"
             },
             function(){
             window.location.href = "login";
             });
             */

            alertify.alert("Usuario registrado correctamente !!", function () {
                window.location=getAbsolutePath();
            });
        },
        error:function(msj){

            document.getElementById("ponerfocus").focus();
            $('#ponerfocus').show();
            $("#error_identificacion").html("");
            $("#error_nombres").html("");
            $("#error_apellidos").html("");
            $("#error_telefono").html("");
            $("#error_pais").html("");
            $("#error_ciudad").html("");
            $("#error_provincia").html("");
            $("#error_canton").html("");
            $("#error_direccion").html("");
            $("#error_canton").html("");
            $("#error_direccion").html("");
            $("#error_facultad").html("");
            $("#error_carrera").html("");
            $("#error_email").html("");
            $("#error_password").html("");
            $("#error_password_confirmation").html("");

            $.each(msj.responseJSON, function(i, field){
                if(i==="identificacion"){
                    $("#error_identificacion").html(field);
                }
                else if(i==="nombres"){
                    $("#error_nombres").html(field);
                }
                else if(i==="apellidos"){
                    $("#error_apellidos").html(field);
                }
                else if(i==="telefono"){
                    $("#error_telefono").html(field);
                }
                else if(i==="pais"){
                    $("#error_pais").html(field);
                }
                else if(i==="ciudad"){
                    $("#error_ciudad").html(field);
                }
                else if(i==="provincia"){
                    $("#error_provincia").html(field);
                }
                else if(i==="canton"){
                    $("#error_canton").html(field);
                }
                else if(i==="direccion"){
                    $("#error_direccion").html(field);
                }
                else if(i==="facultad"){
                    $("#error_facultad").html(field);
                }
                else if(i==="carrera"){
                    $("#error_carrera").html(field);
                }
                else if(i==="email"){
                    $("#error_email").html(field);
                }
                else if(i==="password"){
                    $("#error_password").html(field);
                }
                else if(i==="password_confirmation"){
                    $("#error_password_confirmation").html(field);
                }
            });


        }
    });
});
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
