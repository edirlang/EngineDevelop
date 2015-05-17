<?php ob_start(); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  
    <div class="panel-body">

      <form id="formulario" name="formulario" role="form" method="post" action="../Solicitud/Guardar">
       <div class="form-group">
        <label>Tipo de solicitud</label>
        <select name="tipo" class="form-control">
          <option value="hardware">Solucion de problemas de Hardware</option>
          <option value="software">Solucion de problemas de Sotware</option>
         
        </select>
        <label>Descripcion de solicitud</label>
        <textarea name="descripcion" id="inputDescripcion" class="form-control" required="required"></textarea>
        
      </div>
        <button id="Enviar"  class="btn btn-primary">Guardar</button>
    </form>
    
  </div>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>