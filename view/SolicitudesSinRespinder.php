<?php ob_start(); ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Cliente</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Descripcion</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($solicitudes as $solicitud) { ?>
    <tr>
      <td> <?php echo $solicitud['id']; ?> </td>
      <td> <?php echo $solicitud['cliente']; ?> </td>
      <td> <?php echo $solicitud['fecha']; ?> </td>
      <td> <?php echo $solicitud['hora']; ?> </td>
      <td> <?php echo $solicitud['descripcion']; ?> </td>
      <td><a href="/EngineDevelop/index.php/SolicitudAsesor/Responder?id=<?php echo $solicitud['id']; ?>">Responder</a> </td>
      
    </tr>
    <?php } ?>
    
  </tbody>
</table>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>