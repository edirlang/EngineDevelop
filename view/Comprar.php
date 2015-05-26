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
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="business" value="edison9417-facilitator@hotmail.com">
						<input type="hidden" name="item_name" value="Premium Subscription">
						<input type="hidden" name="currency_code" value="USD">
						<input type="hidden" name="amount" value="<?php echo $oferta['precio']; ?>">
						<input type="image" src="http://www.paypal.com/es_XC/i/btn/x-click-but01.gif"
						name="submit"
						alt="Make payments with PayPal - it's fast, free and secure!">
						<input type="hidden" name="return" value="/EngineDevelop/index.php/Oferta/Pagar">
						<input type="hidden" name="cancel_return" value="/EngineDevelop/index.php/Oferta/Pagar">	
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>