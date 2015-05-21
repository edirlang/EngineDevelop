<?php ob_start(); ?>
<div id="imp">
    
</div>

<div id="factura">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <div class="ui-widget">
                                    <label class="col-xs-12 col-sm-6 col-md-6 col-lg-6 control-label">N° Factura</label>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 control-label">
                                        <input type="text" class="form-control input-sm" id="numero" value="<?php echo $factura['id']+1; ?>" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <div class="ui-widget">
                                    <label class="col-xs-12 col-sm-6 col-md-6 col-lg-6 control-label">Solicitud</label>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 control-label">
                                        <input type="text" class="form-control input-sm" id="solicitud" value="<?php echo $_GET['id']; ?>" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-6 col-md-4 col-lg-4 control-label">Fecha</label>
                                <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                                    <input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("Y-m-d"); ?>" >
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-6 col-md-4 col-lg-4 control-label">Hora: </label>
                                <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                                    <input type="text" class="form-control input-sm" id="hora" value="<?php echo date('h:m'); ?>" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-12 col-md-12 col-lg-1 control-label">Cliente:</label>
                            
                            <label class="col-xs-6 col-sm-3 col-md-2 col-lg-1 control-label">C.C.:</label>
                            <div class="col-xs-6 col-sm-9 col-md-4 col-lg-3">
                                <input type="text" class="form-control input-sm" id="cedula" name="cedula" value="<?php echo $cliente['cedula']; ?>">
                            </div>

                            <label class="col-xs-6 col-sm-3 col-md-2 col-lg-1 control-label">Nombre:</label>
                            <div class="col-xs-6 col-sm-9 col-md-4 col-lg-3">
                                <input type="text" class="form-control input-sm" id="cliente" name="cliente" value="<?php echo $cliente['nombre']." ".$cliente['apellido']; ?>">
                            </div>
                        </div>   
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form name="formulario" id="formulario" class="form-horizontal" role="form">
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 control-label">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-6 col-md-3 col-lg-3 control-label">Servicio:</label>
                                    <div class="col-xs-12 col-sm-6 col-md-9 col-lg-9">
                                        <input type="text" class="form-control input-sm" id="servicio" name="servicio">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 control-label">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-6 col-md-3 col-lg-3 control-label">Valor:</label>
                                    <div class="col-xs-12 col-sm-6 col-md-9 col-lg-9">
                                        <input type="text" class="form-control input-sm" id="precio" name="precio">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 control-label">
                                <button type="submit" class="btn btn-primary form-control" id="agregar"><span class="glyphicon glyphicon-plus"></span> Agregar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-responsive table-condensed">
                        <thead>
                            <tr>
                                <th>Servicio</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody id="Filas">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="panel">
                <div class="panel-body">
                    <h3>Total: $ <label id="total">0</label></h3>
                    <a class="btn btn-success" id="enviar" ><span class="glyphicon glyphicon-ok"></span> Enviar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/EngineDevelop/view/js/Agregar-producto.js"></script>

<?php $contenido = ob_get_clean(); ?>
<?php include "view/layout.php"; ?>