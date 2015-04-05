var x = $(document).ready(inicializarEventos);

function inicializarEventos()
{
  $("#Enviar").click(presionBoton);
  $("#guardar").click(actualizar);
}

function actualizar(){
  $.post("actualizar_empleado",{
    cedula: $("#cedula").val(),
    nombre: $("#nombre").val(),
    apellido: $("#apellido").val(),
    telefono: $("#telefono").val(),
    cargo: $("#cargo").val(),
    salario: $("#salario").val(),
    pension: $("#pension").val(),
    salud: $("#salud").val(),
    fondo: $("#fondo").val()
  },function(datos){

    $("#"+$("#cedula").val()+" #-1").text($("#nombre").val());
    $("#"+$("#cedula").val()+" #-2").text($("#apellido").val());
    $("#"+$("#cedula").val()+" #-3").text($("#telefono").val());
    $("#"+$("#cedula").val()+" #-4").text($("#cargo").val());
    $("#"+$("#cedula").val()+" #-5").text($("#salario").val());
    $("#"+$("#cedula").val()+" #-6").text($("#salud").val());
    $("#"+$("#cedula").val()+" #-7").text($("#pension").val());
  });  
}

function presionBoton()
{
  $('#formulario').validate({
    rules: {
     'Cedula': 'required',
     'Nombre': 'required',
     'Apellido': 'required',
     'Telefono': 'required',
     'rol': 'required',
     'Contrasena': 'required'
   },
   messages: {
     'Cedula': 'Debe ingresar cedula del cliente',
     'Nombre': 'Debe ingresar el nombre del cliente',
     'Apellido': 'Debe ingresar el apellido del cliente',
     'Telefono': 'ingrese telefono',
     'rol': 'selecione el cargo',
     'Contrasena': 'defina contrseña por defaul'
   }, submitHandler: function(form){

    $.post("crear_empleado",{
      Cedula: $("#Cedula").val(),
      Nombre: $("#Nombre").val(),
      Apellido: $("#Apellido").val(),
      Telefono: $("#Telefono").val(),
      Contrasena: $("#Contrasena").val(),
      Rol: $("#rol option:selected").val(),
      Salario: $("#Salario").val(),
      Pension: $("#Pension option:selected").val(),
      Salud: $("#Salud option:selected").val(),
      Fondo: $("#Fondo").val()
    },procesar); 
  }
});
  
}

function procesar(datos){
 if(datos==1){
  alert("Correcto");
  setTimeout("location.href='empleados'", 50);
}else{
  alert("No se pudo crear debido a: "+datos);
}
}

function VaciarFormulario(){
  $('#formulario').each (function(){
    this.reset();
  });

}