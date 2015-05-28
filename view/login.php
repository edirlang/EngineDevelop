<?php ob_start(); ?>
<div class="container">
  <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body">
          <form action="../Usuarios/Validar" method="POST" role="form">
            <div class="form-group">
              <label for="">Usuario</label>
              <input type="text" class="form-control" id="usuario" name="usuario">

              <label>Contraseña</label>
              <input type="password" name="contrasena" id="input" class="form-control" required="required" title="">
            </div>
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesion</button>
          </form>
        </div>
      </div>
    </div>
  </div>  
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>