<?php ob_start(); ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>N°</th>
      <th>Fecha</th>
      <th>Hora</th>
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
      <td> <?php echo $factura['total']; ?> </td>
      <td> 
        <?php if ($factura['estado'] == '0' ) : ?>
          <a class="btn btn-success btn-xs" href="/EngineDevelop/index.php/Factura/Pago?id=<?php echo $factura['id']; ?>">Pagar</a> </td>  
        <?php endif ?>
    </tr>
    <?php } ?>
    
  </tbody>
</table>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>