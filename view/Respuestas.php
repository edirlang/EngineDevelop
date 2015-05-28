<?php ob_start(); ?>
<h1 class="text-center">Respuesta de solicitudes</h1>

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
	
	<?php foreach ($respuestas as $respuesta) { ?>
	<?php
	$estado='success';
	$fecha = strtotime(date('y-m-d'));
	$fecha2 = strtotime($respuesta['fechaR']);
	if($fecha > $fecha2){
		$estado='success';
	}elseif ($fecha < $fecha2) {
		$estado='warning';
	}else{
		$estado='info';
	}
	?>
	<div class="alert alert-<?php echo $estado; ?>">
		
		<table class="table table-hover">
			<tr>
				<td>ID</td>
				<td> <?php echo $respuesta['solicitud']; ?> </td>
			</tr>
			<tr>
				<td>Fecha y hora de solicitud</td>
				<td> <?php echo $respuesta['fecha'].' - '.$respuesta['hora']; ?> </td>
			</tr>
			<tr>
				<td>Tipo de solicitud</td>
				<td> <?php echo $respuesta['tipo']; ?> </td>
			</tr>
			<tr>
				<td>Descripcion de solicitud</td>
				<td> <?php echo $respuesta['descripcion']; ?> </td>
			</tr>
			<tr>
				<td>Respuesta de solicitud</td>
				<td> <?php echo $respuesta['respuesta']; ?> </td>
			</tr>
			<tr>
				<td>Fecha y hora de Servicio</td>
				<td> <?php echo $respuesta['fechaR'].' - '.$respuesta['HoraR']; ?> </td>
			</tr>
			<tr>
				<td>Encargado de Servicio</td>
				<td> <?php 
				require_once "model/Usuarios.php";
				$usuarios = new Usuarios();
				$usuario = $usuarios->getBy('cedula',$respuesta['asesor']);
				echo $usuario['nombre'].' '.$usuario['apellido']; 
				?> </td>
			</tr>
		</table>	
		
	</div>
	<?php  } ?>
</div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
	<span id="helpBlock" class="help-block">
		<div>
			<div class='col-xs-3 col-sm-3 col-md-3 col-lg-3 bg-success'></div><p class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> Solucionado</p>
			<div class='col-xs-3 col-sm-3 col-md-3 col-lg-3 bg-info'> </div><p class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> En Solucion</p>
			<div class='col-xs-3 col-sm-3 col-md-3 col-lg-3 bg-warning'> </div><p class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> Sin Solucionar</p>
		</div>
	</span>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>