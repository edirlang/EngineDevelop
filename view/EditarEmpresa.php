<?php ob_start(); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  
    <div class="panel-body">

      <form id="formulario" name="formulario" role="form" method="post" action="../Empresa/editar">
       <div class="form-group">
        <div class="panel panel-info col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="panel-heading">
            <h3 class="panel-title">Datos Empresa</h3>
          </div>
          <div class="panel-body">
            <label for="">Nit. Empresa</label>
            <input type="text" class="form-control" id="nit" name="nit" placeholder="" value="<?php echo $empresa['nit'] ?>" readonly="readonly"/>
            
            <label for="">Nombre de Empresa</label>
            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="" value="<?php echo $empresa['nombre'] ?>">
            
            <label for="">Telefono Empresa</label>
            <input type="text" class="form-control" id="telefono_empresa" name="telefono_empresa" placeholder="" value="<?php echo $empresa['telefono'] ?>">
            
            <label for="">Direccion de Empresa</label>
            <input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" placeholder="Cll. 00a - # 00a-00" value="<?php echo $empresa['direccion'] ?>">
          </div>
        </div>
        
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button id="Enviar"  class="btn btn-primary">Guardar</button>
      </div>
    </form>
    
  </div>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>