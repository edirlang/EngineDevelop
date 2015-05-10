<?php ob_start(); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  
    <div class="panel-body">

      <form id="formulario" name="formulario" role="form" method="post" action="../Usuarios/Editar">
       <div class="form-group">
        <div class="panel panel-info col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="panel-heading">
            <h3 class="panel-title">Editar Usuario</h3>
          </div>
          <div class="panel-body">
            <label for="">Cedula</label>
            <input type="text" class="form-control" id="Cedula"  name="Cedula" placeholder="Cedula" value="<?php echo $usuario['cedula'] ?>" readonly="readonly">
            
            <label for="">Nombre</label>
            <input type="text" class="form-control" id="Nombre"  name="Nombre" placeholder="primer nombre" value="<?php echo $usuario['nombre'] ?>">
            
            <label for="">Apellido</label>
            <input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="primer apellido" value="<?php echo $usuario['apellido'] ?>">
            
            <label for="">Telefono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="telefono" value="<?php echo $usuario['telefono'] ?>">
            
            <label for="">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" placeholder="Correo Electronico" value="<?php echo $usuario['email'] ?>">
          
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