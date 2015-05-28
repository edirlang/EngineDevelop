<?php ob_start(); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  
    <div class="panel-body">

      <form id="formulario" name="formulario" role="form" method="post" action="../Usuarios/save">
       <div class="form-group">
        <div class="panel panel-success col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <div class="panel-heading">
            <h3 class="panel-title">Datos Representande</h3>
          </div>
          <div class="panel-body">
            <label for="">Cedula</label>
            <input type="text" class="form-control" id="Cedula"  name="Cedula" placeholder="Cedula">
            
            <label for="">Nombre</label>
            <input type="text" class="form-control" id="Nombre"  name="Nombre" placeholder="primer nombre">
            
            <label for="">Apellido</label>
            <input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="primer apellido">
            
            <label for="">Telefono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="telefono">
            
            <label for="">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" placeholder="Correo Electronico">
            
            <label for="">Contraseña</label>
            <input type="password" class="form-control" id="Contrasena" name="Contrasena">

          </div>
        </div>
        <div class="panel panel-danger col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <div class="panel-heading">
            <h3 class="panel-title">Datos Empresa</h3>
          </div>
          <div class="panel-body">
            <label for="">Nit. Empresa</label>
            <input type="text" class="form-control" id="nit" name="nit" placeholder="">
            
            <label for="">Nombre de Empresa</label>
            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="">
            
            <label for="">Telefono Empresa</label>
            <input type="text" class="form-control" id="telefono_empresa" name="telefono_empresa" placeholder="">
            
            <label for="">Direccion de Empresa</label>
            <input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" placeholder="Cll. 00a - # 00a-00">
          </div>
        </div>
        
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button id="Enviar"  class="btn btn-primary"> <span class="glyphicon glyphicon-floppy-save"></span> Guardar</button>
      </div>
    </form>
    
  </div>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>