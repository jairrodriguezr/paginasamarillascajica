<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/redireccion.inc.php';


$titulo = 'Login incorrecto';

include_once 'plantillas/cabecera.inc.php';
include_once 'plantillas/navbar.inc.php';

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>Ingreso exitoso
				</div>
				<div class="panel-body text-center">
					<p><b>El usuario no existe en nuestra base de datos</b></p>
					<br>
					<p><b><a href="<?php echo LOGIN ;?>">Intentalo nuevamente</a></b></p>
				</div>
			</div>
		</div>
	</div>
</div>
