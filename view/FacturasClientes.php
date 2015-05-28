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
    <?php foreach ($facturas as $factura) {
      $f=0;
      if($factura['asesor'] !=''){
       $f=1;
      }
      ?>
      <tr>

        <td> <?php echo $factura['id']; ?> </td>
        <td> <?php echo $factura['fecha']; ?> </td>
        <td> <?php echo $factura['hora']; ?> </td>
        <td> <?php echo $factura['total']; ?> </td>
        <td> 
          <?php if ($factura['estado'] == '0' ) : ?>
          <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="edixon.hernandez.c-facilitator@gmail.com">
            <input type="hidden" name="item_name" value="<?php echo $factura['id']; ?>">
            <input name="shopping_url" type="hidden" value="http://localhost:8080/EngineDevelop/index.php/Factura/Cliente">
            <input name="currency_code" type="hidden" value="USD">
            <input type='hidden' name='cancel_return' value='http://localhost/carro/errorPaypal.php'>
            <input name="notify_url" type="hidden" value="http://localhost:8080/EngineDevelop/index.php/Oferta/RecibirPago">
            <input name="rm" type="hidden" value="2">
            <input name="return" type="hidden" value="http://localhost:8080/EngineDevelop/index.php/Oferta/pago?id=<?php echo $factura['id']; ?>&&f=<?php echo $f; ?>">
            <input type="hidden" name="amount" value="<?php echo $factura['total']; ?>">
            <input type="image" src="http://www.paypal.com/es_XC/i/btn/x-click-but03.gif"
            name="submit"
            alt="Make payments with PayPal - it's fast, free and secure!">
          </form>
        <?php endif ?>
      </tr>
      <?php 
    } ?>
  </tbody>
</table>

<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>