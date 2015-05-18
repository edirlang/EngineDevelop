<?php ob_start(); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  
    <div class="panel-body">

      <form id="formulario" name="formulario" role="form" method="post" action="../SolicitudAsesor/Guardar">
       <div class="form-group">
        
        <label for="">Solicitud N°</label>
        <input type="text" name="solicitud" id="inputSolicitud" class="form-control" value="<?php echo $_GET['id']; ?>" required="required" readOnly>
        <label>Respuesta</label>
        <textarea name="descripcion" id="inputDescripcion" class="form-control" required="required"></textarea>
        <label for="">Fecha de Visita</label>
        <input type="text" name="fecha" id="inputFecha" class="form-control" value="" required="required" pattern="" title="">
        <label for="">Hora de visita</label>
        <input type="text" name="hora" id="inputHora" class="form-control" value="" required="required" pattern="" title="">
      </div>
        <button id="Enviar"  class="btn btn-primary">Guardar</button>
    </form>
    
  </div>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>