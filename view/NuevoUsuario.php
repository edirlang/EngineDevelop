<?php ob_start(); ?>
<div class="container">
  <div class="row">
    <div class="panel-body">

      <form id="formulario" name="formulario" role="form" method="post" action="../Usuarios/save">
       <div class="form-group">
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
        <label for="">Cargo</label>
        <select  class="form-control" id="Rol" name="Rol">
          <option value="admin">Administrador</option>
          <option value="asesor">Asesor</option>
          <option value="cliente">Empresario</option>
        </select>

        <label for="">Contraseña</label>
        <input type="password" class="form-control" id="Contrasena" name="Contrasena">
      </div>
      <button id="Enviar"  class="btn btn-primary">Guardar</button>
    </form>
    
  </div>
</div>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>