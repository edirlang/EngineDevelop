<?php ob_start(); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

  <div class="panel-body">

    <form id="formulario" name="formulario" role="form" method="post" action="../Oferta/Editar" enctype="multipart/form-data">
     <div class="form-group">
      <div class="panel panel-info col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel-heading">
          <h3 class="panel-title">Editar Oferta</h3>
        </div>
        <div class="panel-body">

          <label for="">ID</label>
          <input type="text" class="form-control" id="id"  name="id" value="<?php echo $oferta['id']; ?>" readonly="readonly">

          <label for="">Nombre</label>
          <input type="text" class="form-control" id="nombre"  name="nombre" placeholder="nombre del software" value="<?php echo $oferta['nombre']; ?>">

          <label for="">Descripcion</label>
          <textarea name="descipcion" class="form-control" value=""><?php echo $oferta['descripcion']; ?></textarea>

          <label for="">Precio</label>
          <input type="number" class="form-control" id="precio" name="precio" placeholder="valor a la venta" value="<?php echo $oferta['precio']; ?>">
        
          <label for="">Imagen</label>
          <label><img src="/EngineDevelop/<?php echo $oferta['archivo']; ?>" alt="" width="50%" height="50%"> </label>
          <input type="file" id="foto" name="foto" />

        </div>
      </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <button id="Enviar"  class="btn btn-primary">Guardar</button>
    </div>
  </form>

</div>
</div>
<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>