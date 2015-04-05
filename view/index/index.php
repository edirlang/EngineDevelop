<?php ob_start(); ?>
<div class="container">
  <div class="row">
    <h1>¿Quienes Somos?</h1>
    <p>Somos una</p>
  </div>
</div>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>