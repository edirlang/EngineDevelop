<?php ob_start(); ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>N°</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Cliente</th>
      <th>Asesor</th>
      <th>Total</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($facturas as $factura) { ?>
    <tr>
      
      <td> <?php echo $factura['id']; ?> </td>
      <td> <?php echo $factura['fecha']; ?> </td>
      <td> <?php echo $factura['hora']; ?> </td>
      <td> <?php echo $factura['cliente']; ?> </td>
      <td> <?php echo $factura['asesor']; ?> </td>
      <td> <?php echo $factura['total']; ?> </td>
      <td> <a class="btn btn-danger btn-xs" href="/EngineDevelop/index.php/Factura/Eliminar?id=<?php echo $factura['id']; ?>">Eliminar</a> </td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>