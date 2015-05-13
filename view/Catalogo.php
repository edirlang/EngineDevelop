<?php ob_start(); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<h1 class="text-center">Catalogo de Software</h1>
	<?php foreach ($ofertas as $oferta) { ?>
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
						<p> <a href="/EngineDevelop/index.php/Oferta/Comprar" title="" class="btn btn-primary">Comprar</a> </p> 
					</div>
			  	</div>
			  </div>
		</div>
	<?php  } ?>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>