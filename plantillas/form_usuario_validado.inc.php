<fieldset>
    <legend class="text-center header">Nuevo usuario</legend>

    <div class="form-group">
        <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-store"></i></span>
        <div class="col-md-8">
            <input id="nombre" name="nombre" type="text" placeholder="Nombre Propietario" <?php $validador -> mostrar_nombre(); ?> class="form-control">
            <?php
            $validador -> mostrar_error_nombre();
            ?>
        </div>
    </div>
    <div class="form-group">
        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
        <div class="col-md-8">
            <input id="usuario" name="usuario" type="text" placeholder="Usuario" <?php $validador -> mostrar_usuario(); ?> class="form-control">
            <?php
            $validador -> mostrar_error_usuario();
            ?>
        </div>
    </div>

    <div class="form-group">
        <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-envelope-open-text""></i></span>
        <div class="col-md-8">
            <input id="correo" name="correo" type="text" placeholder="Correo electronico" <?php $validador -> mostrar_correo(); ?> class="form-control">
            <?php
            $validador -> mostrar_error_correo();
            ?>
        </div>
    </div>

    <div class="form-group">
        <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-key"></i></span>
        <div class="col-md-8">
            <input id="clave" name="clave" type="password" placeholder="Contraseña" class="form-control" class="form-control">
            <?php
            $validador -> mostrar_error_clave();
            ?>
        </div>
    </div>

    <div class="form-group">
        <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-key"></i></span>
        <div class="col-md-8">
            <input id="clave2" name="clave2" type="password" placeholder="Repetir contraseña" class="form-control" class="form-control">
            <?php
            $validador -> mostrar_error_clave2();
            ?>
        </div>
    </div>

     <div class="form-group">
        <div class="col-md-12 text-center">
            <button type="submit" name="enviar" class="btn btn-primary btn-lg">Enviar</button>
        </div>
    </div>
</fieldset>