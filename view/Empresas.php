<?php ob_start(); ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Nit</th>
      <th>Nombre</th>
      <th>Telefono</th>
      <th>Direccion</th>
      <th>Representante</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($empresas as $empresa) { ?>
    <tr>
      <td> <?php echo $empresa['nit']; ?> </td>
      <td> <?php echo $empresa['nombre']; ?> </td>
      <td> <?php echo $empresa['telefono']; ?> </td>
      <td> <?php echo $empresa['direccion']; ?> </td>
      <td> <?php echo $empresa['representante']; ?> </td>
      <td> <a href="/EngineDevelop/index.php/Empresa/Editar?id=<?php echo $empresa['nit']; ?>">Editar</a> </td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>