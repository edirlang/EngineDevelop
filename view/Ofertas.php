<?php ob_start(); ?>
<h1 class="text-center">Ofertas de Sortware hecho</h1>
<a href="/EngineDevelop/index.php/oferta/Crear" class="btn btn-primary">Nueva Oferta</a>
<table class="table table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Precio</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ofertas as $oferta) { ?>
    <tr>
      <td> <?php echo $oferta['id']; ?> </td>
      <td> <?php echo $oferta['nombre']; ?> </td>
      <td> <?php echo $oferta['descripcion']; ?> </td>
      <td> <?php echo $oferta['precio']; ?> </td>
      <td> <a class="btn btn-xs btn-info" href="/EngineDevelop/index.php/oferta/Editar?id=<?php echo $oferta['id']; ?>">Editar</a> </td>
      <td> <a class="btn btn-xs btn-danger" href="/EngineDevelop/index.php/oferta/Eliminar?id=<?php echo $oferta['id']; ?>">Eliminar</a> </td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>