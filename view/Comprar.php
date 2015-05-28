<?php ob_start(); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<h1 class="text-center">Compra de software</h1>
	
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $oferta['nombre'] ?></h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<p><img class="img-rounded img-responsive" src="/EngineDevelop/<?php echo $oferta['archivo']; ?>" alt=""> </p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<p><?php echo $oferta['descripcion']; ?> </p>
					<p>$ <?php echo $oferta['precio'] ?> </p>

					<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
						<input name="cmd" type="hidden" value="_xclick">
						<input name="business" type="hidden" value="edixon.hernandez.c-facilitator@gmail.com">
						<input name="shopping_url" type="hidden" value="http://localhost:8080/EngineDevelop/index.php/Oferta/Catalogo">
						<input name="return" type="hidden" value="http://localhost:8080/EngineDevelop/index.php/Oferta/Pago?id=<?php echo $FacturaOferta->getId(); ?>&&f=1">
						<input name='cancel_return' type='hidden' value='http://localhost/carro/errorPaypal.php'>
						<input name="notify_url" type="hidden" value="http://localhost:8080/EngineDevelop/index.php/Oferta/RecibirPago">
						<input name="currency_code" type="hidden" value="USD">
						<input name="rm" type="hidden" value="2">
						<input name='lc' type='hidden' value='es'>
						<input name='country' type='hidden' value='ES'>

						<input type='hidden' name='item_number' value='<?php  echo $FacturaOferta->getId(); ?>'>
						<input name="item_name" type="hidden"  value="Compra de Software <?php echo $oferta['descripcion']; ?>">
						<input name="amount" type="hidden" value="<?php echo $oferta['precio']; ?>">
						<input name='page_style' type='hidden' value='primary'>
						<input name='no_shipping' type='hidden' value='1'>
						<input type="image" src="http://www.paypal.com/es_XC/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">	
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>