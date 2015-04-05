<?php ob_start(); ?>
<div class="container">
  <div class="row">
    <h1>Clientes</h1>  
  </div>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout2.php"; ?>