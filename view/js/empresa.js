var x = $(document).ready(inicializarEventos);

function inicializarEventos()
{
  $("#nombre").click(Cambiar_nombre);
  $("#tipo").click(Cambiar_tipo);
  $("#regimen").click(Cambiar_regimen);
  $("#representante").click(Cambiar_representante);
  $("#quienes").click(Cambiar_quienes);
  $("#mision").click(Cambiar_mision);
  $("#vision").click(Cambiar_vision);
  $("#salario").click(Cambiar_salario);
  $("#uvt").click(Cambiar_uvt);
  $("#1").click(Cambiar_tarifa1);
  $("#2").click(Cambiar_tarifa2);
  $("#3").click(Cambiar_tarifa3);
  $("#4").click(Cambiar_tarifa4);
}

function Cambiar_nombre(){
  $("#campo").text("Nombre de empresa");
  $("#valor").val($("#nombre").text());
  $("#ventana").modal();
}

function Cambiar_tipo(){
  $("#campo").text("Tipo de empresa");
  $("#valor").val($("#tipo").text());
  $("#ventana").modal();
}

function Cambiar_regimen(){
  $("#campo").text("Regimen de empresa");
  $("#valor").val($("#regimen").text());
  $("#ventana").modal();
}

function Cambiar_representante(){
  $("#campo").text("Representante legal de empresa");
  $("#valor").val($("#representante").text());
  $("#ventana").modal();
}

function Cambiar_quienes(){
  $("#campo").text("Quienes Somos");
  $("#valor").val($("#quienes").text());
  $("#ventana").modal();
}

function Cambiar_mision(){
  $("#campo").text("Mision");
  $("#valor").val($("#mision").text());
  $("#ventana").modal();
}

function Cambiar_vision(){
  $("#campo").text("Vision");
  $("#valor").val($("#vision").text());
  $("#ventana").modal();
}

function Cambiar_salario(){
  $("#campo").text("Salario minimo");
  $("#valor").val($("#salario").text());
  $("#ventana").modal();
}

function Cambiar_uvt(){
  $("#campo").text("Unidad de Valor Tributario");
  $("#valor").val($("#uvt").text());
  $("#ventana").modal();
}

function Cambiar_tarifa1(){
  $("#identificador").val($("#1 > #id").text());
  $("#tarifa_t").val($("#1 > #tarifa").text());
  $("#menor").val($("#1 > #desde").text());
  $("#mayor").val($("#1 > #hasta").text());
  $("#ecuacion").val($("#1 > #formula").text());
  $("#ventana_uvt").modal();
}
function Cambiar_tarifa2(){
  $("#identificador").val($("#2 > #id").text());
  $("#tarifa_t").val($("#2 > #tarifa").text());
  $("#menor").val($("#2 > #desde").text());
  $("#mayor").val($("#2 > #hasta").text());
  $("#ecuacion").val($("#2 > #formula").text());
  $("#ventana_uvt").modal();
}
function Cambiar_tarifa3(){
  $("#identificador").val($("#3 > #id").text());
  $("#tarifa_t").val($("#3 > #tarifa").text());
  $("#menor").val($("#3 > #desde").text());
  $("#mayor").val($("#3 > #hasta").text());
  $("#ecuacion").val($("#3 > #formula").text());
  $("#ventana_uvt").modal();
}
function Cambiar_tarifa4(){
  $("#identificador").val($("#4 > #id").text());
  $("#tarifa_t").val($("#4 > #tarifa").text());
  $("#menor").val($("#4 > #desde").text());
  $("#mayor").val($("#4 > #hasta").text());
  $("#ecuacion").val($("#4 > #formula").text());
  $("#ventana_uvt").modal();
}