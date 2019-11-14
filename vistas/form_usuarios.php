<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/Usuarios.inc.php';
include_once 'app/ValidadorUsuarios.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/redireccion.inc.php';

if (isset($_POST['enviar'])) {

    Conexion :: abrir_conexion();
    $validador = new ValidadorUsuarios($_POST['nombre'], $_POST['usuario'], $_POST['correo'], $_POST['clave'], $_POST['clave2'], Conexion::obtener_conexion());

    if ($validador -> registro_valido()) {
       $valores = new Usuarios('', $validador-> obtener_nombre(), 
                                   $validador-> obtener_usuario(), 
                                   $validador-> obtener_correo(), 
                                   password_hash($validador-> obtener_clave(), PASSWORD_DEFAULT),
                                    '',
                                    '');

       //is_object(mixed $valores) : bool;

       

       $UsuarioInsertado = RepositorioUsuario :: InsertarUsuario(Conexion::obtener_conexion(), $valores);
       if ($UsuarioInsertado) {
           //Redirigir a insertar comercio
        redireccion :: redirigir(LOGIN);
       }
    }

    Conexion :: cerrar_conexion();
}

$titulo = "Registro Usuarios";

include_once 'plantillas/cabecera.inc.php';
include_once '/usr/share/nginx/html/plantillas/navbar.inc.php';

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="<?php echo USUARIOS; ?>">
                    <?php
                        if (isset($_POST['enviar'])){
                            include_once 'plantillas/form_usuario_validado.inc.php';
                        }else{
                            include_once 'plantillas/form_usuario_vacio.inc.php';
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>