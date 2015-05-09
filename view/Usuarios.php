<?php ob_start(); ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>DNI</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>telefono</th>
      <th>correo</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usuarios as $usuario) { ?>
    <tr>
      
      <td> <?php echo $usuario['cedula']; ?> </td>
      <td> <?php echo $usuario['nombre']; ?> </td>
      <td> <?php echo $usuario['apellido']; ?> </td>
      <td> <?php echo $usuario['telefono']; ?> </td>
      <td> <?php echo $usuario['email']; ?> </td>
      <td> <a href="/EngineDevelop/index.php/usuario/Editar?id=<?php echo $usuario['cedula']; ?>">Editar</a> </td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>