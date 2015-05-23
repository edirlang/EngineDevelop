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
						<p> <a type='file' <a target="_blank" href="/EngineDevelop/<?php echo $oferta['archivo']; ?>" title="" class="btn btn-primary">Descargar</a> </p> 
        				
					</div>
			  	</div>
			  </div>
		</div>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>