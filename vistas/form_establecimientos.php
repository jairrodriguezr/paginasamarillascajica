<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/Categoria.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/ValidadorEstablecimientos.inc.php';
include_once 'app/RepositorioCategoria.inc.php';
include_once 'app/ValidadorCategoria.inc.php';

if (!(ControlSesion :: SesionIniciada())) {
  Redireccion :: redirigir(SERVIDOR);
}


if (isset($_POST['enviar'])) {
   Conexion :: abrir_conexion();

   $id_usuario = $_SESSION['id_usuario'];
 	 $id_categoria = $_POST['categoria'];

   $validador = new ValidadorEstablecimientos($_POST['nombre'], $_POST['telefono'], $_POST['direccion'], $_POST['web'], $_POST['descripcion'], $id_usuario, $id_categoria, Conexion :: obtener_conexion());

        if ($validador -> registro_valido()) {
       $establecimientos = new Establecimientos('', $validador-> obtener_nombre(), 
                                   $validador-> obtener_telefono(), 
                                   $validador-> obtener_direccion(), 
                                   $validador-> obtener_web(),
                                   $validador-> obtener_descripcion(),
                                   $id_usuario,
                                   $id_categoria,
                                   ''
                                    );

       //is_object(mixed $valores) : bool;

       
      $EstablecimientoInsertado = RepositorioEstablecimientos :: InsertarEstablecimiento(Conexion :: obtener_conexion(), $establecimientos);
       if ($EstablecimientoInsertado) {
           //Redirigir a insertar comercio
        Redireccion :: redirigir(IMAGENES);
       }
    }

    Conexion :: cerrar_conexion();
}

$titulo = "Registro Establecimiento";

include_once 'plantillas/cabecera.inc.php';
include_once 'plantillas/navbar.inc.php';

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" id="estab" action="<?php echo ESTABLECIMIENTOS; ?>">
                    <?php
                        if (isset($_POST['enviar'])){
                            include_once 'plantillas/form_establecimientos_validado.inc.php';
                        }else{
                            include_once 'plantillas/form_establecimientos_vacio.inc.php';
                        }
                       ?>
                </form>
            </div>

            <?php

            ?>
        </div>
    </div>
</div>




<?php
include_once 'plantillas/footer.inc.php';
?>