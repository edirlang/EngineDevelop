<?php ob_start(); ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>DNI</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>telefono</th>
      <th>correo</th>
      <th>Salario</th>
      <th>Fecha Contrado</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($asesores as $asesor) { ?>
    <tr>
      
      <td> <?php echo $asesor['cedula']; ?> </td>
      <td> <?php echo $asesor['nombre']; ?> </td>
      <td> <?php echo $asesor['apellido']; ?> </td>
      <td> <?php echo $asesor['telefono']; ?> </td>
      <td> <?php echo $asesor['email']; ?> </td>
      <td> <?php echo $asesor['salario']; ?> </td>
      <td> <?php echo $asesor['fecha']; ?> </td>
      <td> <a class="btn btn-info btn-xs" href="/EngineDevelop/index.php/Asesor/Editar?id=<?php echo $asesor['cedula']; ?>">Editar</a> </td>
      <td> <a class="btn btn-danger btn-xs" href="/EngineDevelop/index.php/Asesor/Eliminar?id=<?php echo $asesor['cedula']; ?>">Eliminar</a> </td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>
<a href="/EngineDevelop/index.php/Asesor/Nuevo" class="btn btn-primary">Nuevo Asesor</a>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>