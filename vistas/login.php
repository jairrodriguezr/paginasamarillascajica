<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/Usuarios.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/redireccion.inc.php';


if (ControlSesion :: SesionIniciada()) {
	Redireccion :: redirigir(SERVIDOR);
}

if (isset($_POST['login'])) {
	Conexion :: abrir_conexion();
//echo "ya vienes aqui";
	$validador = new ValidadorLogin($_POST['correo'], $_POST['clave'], Conexion :: obtener_conexion());

	if ($validador ->obtener_error() === '' && !is_null($validador -> obtener_usuario())) {
		ControlSesion  :: IniciarSesion(
			$validador -> obtener_usuario() -> obtener_id(),
			$validador -> obtener_usuario() -> obtener_nombre()
		);
			Redireccion :: redirigir(LOGINCORRECTO);
			echo "login correcto";
	}else{
		echo "Inicio de sesion fallida";
	}

	Conexion :: Cerrar_conexion();

}

$titulo = 'Login';

include_once 'plantillas/cabecera.inc.php';
include_once 'plantillas/navbar.inc.php';



?>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					<h4>Iniciar sesión</h4>
				</div>
				<div class="panel-body">
					<form role="form" method="post" action="<?php echo LOGIN; ?>">
						<h2>Introduce tus datos</h2>
						<br>
						<label for="email" class="sr-only">Correo</label>
						<input type="email" name="correo" id="correo" class="form-control" placeholder="Correo" 
						<?php
							if (isset($_POST['login']) && isset($_POST['correo']) && !empty($_POST['correo'])) {
								echo 'value= "'. $_POST['correo'] . '"';
							}
						?>>
						<br>
						<label for="clave" class="sr_only">Contraseña</label>
 						<input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña">
 						<br>
 						<?php
 							if (isset($_POST['login'])) {
 								$validador -> mostrar_error();
 							}
 						?>
 						<button type="submit" name="login" class="btn btn-lg btn-primary btn-block" >
 							Iniciar sesión
 						</button>
					</form>
					<br>
					<br>
					<div class="text-center">
						<a href="#">olvidaste tu contraseña?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>