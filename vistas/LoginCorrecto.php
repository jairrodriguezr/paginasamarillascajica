<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/redireccion.inc.php';


if (isset($_SESSION['nombre_usuario']) && !empty($_SESSION['nombre_usuario'])) {
	$nombre = $_SESSION['nombre_usuario'];
}else{
	Redireccion :: redirigir(SERVIDOR);
}

$titulo = 'Login correcto';

include_once 'plantillas/cabecera.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Ingreso exitoso
				</div>
				<div class="panel-body text-center">
					<p><b><?php echo $nombre;?></b> !Bienvenido a tú perfil </p>
					<br>
					<p><b><a href="<?php echo PANEL ;?>">Panel de control</a></b></p>
				</div>
			</div>
		</div>
	</div>
</div>
