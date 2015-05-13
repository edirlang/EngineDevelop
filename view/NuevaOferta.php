<?php ob_start(); ?>
  <h1>Nueva Oferta de software</h1>
    <form id="formulario" name="formulario" role="form" method="post" action="../Oferta/Guardar" enctype="multipart/form-data">
     <div class="form-group">
      <div class="panel panel-success col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <label for="">Nombre</label>
        <input type="text" class="form-control" id="nombre"  name="nombre" placeholder="nombre del software">

        <label for="">Descripcion</label>
        <textarea name="descipcion" class="form-control"></textarea>

        <label for="">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" placeholder="valor a la venta">

        <label for="">Imagen</label>
        <input type="file" id="foto" name="foto" />

        <button id="Enviar"  class="btn btn-primary">Guardar</button>
      </div>

    </div>
  </form>

<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>