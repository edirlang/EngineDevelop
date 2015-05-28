<?php 
	require '../controller/OfertaController.php';
	$factura = new OfertaController();
	$factura->Pago($_GET['id'], $_GET['f']);
 ?>