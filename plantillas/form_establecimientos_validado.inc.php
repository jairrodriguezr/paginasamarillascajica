<fieldset>
    <legend class="text-center header">Nuevo Establecimientos</legend>

    <div class="form-group">
        <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-male"></i></span>
        <div class="col-md-8">
            <input id="nombre" name="nombre" type="text" placeholder="Nombre Establecimiento" <?php $validador -> mostrar_nombre(); ?>class="form-control">
            <?php
            $validador -> mostrar_error_nombre();
            ?>
        </div>
    </div>
    <div class="form-group">
        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
        <div class="col-md-8">
            <input id="telefono" name="telefono"  type="text" placeholder="Telefono" <?php $validador -> mostrar_telefono(); ?> class="form-control">
            <?php
                $validador -> mostrar_error_telefono();
          ?>
        </div>
    </div>

    <div class="form-group">
        <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-location-arrow"></i></span>
        <div class="col-md-8">
            <input id="direccion" name="direccion" <?php $validador -> mostrar_direccion(); ?>type="text" placeholder="Direccion" class="form-control">
            <?php
                $validador -> mostrar_error_direccion();
            ?>
        </div>
    </div>

    <div class="form-group">
        <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-passport"></i></span>
        <div class="col-md-8">
            <input id="web" name="web" <?php $validador -> mostrar_web(); ?>type="text" placeholder="Web" class="form-control">
            <?php
                $validador -> mostrar_error_web();
            ?>
        </div>
    </div>

      <div class="form-group">
        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
        <div class="col-md-8">
            <textarea class="form-control" id="descripcion" name="descripcion" form="estab" placeholder="Por favor ingrese la descripción del negocio." rows="7"><?php $validador -> mostrar_descripcion(); ?></textarea>
            <?php
$validador -> mostrar_error_descripcion();
?>
        </div>
    </div>

<legend class="text-center header">Categoría</legend>
    
  <div class="form-group">
        <span class="col-md-1 col-md-offset-2 text-center"></span>
        <div class="col-md-8">
            <div placeholder="Categoria">
                Selecciona Categoria: <select name="categoria">
                    <option value="0">Seleccionar categoría</option>
                    <?php 
                    EscritorCategorias::EscribirCategorias();
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12 text-center">
            <button type="submit" name="enviar" class="btn btn-primary btn-lg">Enviar</button>
        </div>
    </div>
</fieldset>