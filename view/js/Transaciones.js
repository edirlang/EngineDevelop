var x;
x=$(document);
x.ready(inicializarEventos);
var transacion=[];
var fecha;
function inicializarEventos()
{
  var x;
  transaciones= new Array();
  x=$("#boton1");
  x.click(presionBoton)
  
  $("#Enviar").click(EnviarBD)
}

function presionBoton()
{

  $('#formulario').validate({
    rules: {
     'Cedula': 'required',
     'Codigo': 'required',
     'Fecha': 'required',
     'Naturaleza': 'required',
     'Descripcion': 'required',
     'Valor': { required: true, number: true }
   },
   messages: {
     'Cedula': '<div class="alert alert-danger" >Debe ingresar su usuario </div>',
     'Codigo': '<div class="alert alert-danger" >Debe ingresar el codigo de transacion </div>',
     'Fecha': '<div class="alert alert-danger" >Debe ingresar una fecha valida </div>',
     'Naturaleza': '<div class="alert alert-danger" >Selecione una Naturaleza </div>',
     'Descripcion': '<div class="alert alert-danger" >Descripcion de la transacion invalida </div>',
     'Valor': '<div class="alert alert-danger" >Digite el valor de la transacion </div>'
   },
       //errorElement: 'div',
       //errorContainer: $('#errores'),
       submitHandler: function(form){
        var datos = new Array($("#Cedula").val(),$("#codigo option:selected").val(),$("#Fecha").val(),$("#Naturaleza").val(),$("#Descripcion").val(),$("#Valor").val());
        transacion.push(datos);

        fecha = $("#Fecha").val();
        $("<tr>").append(
          $('<td>', { text: $("#Cedula").val()
        }), $('<td>', { text: $("#codigo option:selected").val()
      }), $('<td>', { text: $("#Fecha").val() 
    }), $('<td>', { text: $("#Naturaleza").val()  
  }), $('<td>', { text: $("#Descripcion").val()  
}), $('<td>', { text: $("#Valor").val()  
})
).hide().appendTo('#Filas').fadeIn('slow');
        VaciarFormulario();
      }
    });
}

function VaciarFormulario(){
  $('#formulario').each (function(){
    this.reset();
  });
  $("#Fecha").val(fecha);
  $("#Fecha").attr('readonly', 'readonly');
}

function EnviarBD(){
  var jdatos = JSON.stringify(transacion); 
  $.post("guardar_transaiones",{
    jdatos: jdatos
  },procesar); 
}

function procesar(datos){
 if(datos==1){
  alert("Correcto");
  setTimeout("location.href='Transacion-manual'", 50);
}else{
  alert(datos);
  if($('#error').length){
      
  }else{
    
    $('#Mensaje').append("<div id='error' class='alert alert-danger'>Error: No se cumplio la doble partida </div>");
  }
}
}