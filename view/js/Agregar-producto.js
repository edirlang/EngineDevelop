var total=0;
var servicios = [];
$(document).ready(inicializarEventos);


function inicializarEventos() {
  $("#agregar").click(AgregarServicio);
  $("#enviar").click(Enviar);
}

function cerar(){
  $("#total_v").val($("#total").text());
  $("#efectivo_v").keypress(calcular_cambio);
  $("#cerar_venta").modal();
}

function calcular_cambio(evt){
  var Efectivo = $("#efectivo_v").val()+String.fromCharCode(evt.charCode);
  var total = $("#total_v").val();
  
  var cambio = (Efectivo*1)-(total*1);
  $("#cambio_v").val(cambio);
  if(cambio >= 0){
    $('#Enviar').attr("disabled", false);
  }
}

function AgregarServicio()
{
  $('#formulario').validate({
    rules: {
     'servicio': 'required',
     'precio' : { required: true, number: true }
   },
   messages: {
     'servicio': 'Debe ingresar el nombre del servicio',
     'precio': 'Digite el precio del servico'
   },

   submitHandler: function(form){
     $("<tr>").append(
      $('<td>', { text: $("#servicio").val()
      }), $('<td>', { text: $("#precio").val()
      })
    ).hide().appendTo('#Filas').fadeIn('slow');
    total = (total*1) + ($("#precio").val()*1)
    $("#total").text(total);

    var servicio = new Array($("#servicio").val(),$("#precio").val());
    servicios.push(servicio);

    VaciarFormulario();
  }});
}

function VaciarFormulario(){
  $('#formulario').each (function(){
    this.reset();
  });

}

function Enviar(){
  var jdatos = JSON.stringify(servicios); 

  $.post("Nueva",{
    num_fact: $("#numero").val(),
    id: $("#solicitud").val(),
    fecha: $("#fecha").val(),
    hora: $("#hora").val(),
    cliente: $("#cedula").val(),
    total: $("#total").text,
    jdatos: jdatos
  },procesar); 
}

function procesar(datos){
  location.href='/EngineDevelop/index.php/SolicitudAsesor/index';
}