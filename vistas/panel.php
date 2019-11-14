<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
error_reporting(-1);

include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';

if (!(ControlSesion :: SesionIniciada())) {
	Redireccion :: redirigir(SERVIDOR);
}

$titulo = 'Panel principal';

include_once 'plantillas/cabecera.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<center>
				<h2>Registre su negocio</h2>
			</center>
			<br>
			<br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<a href="<?php echo ESTABLECIMIENTOS; ?>">
				<img src="imagenes/tienda.jpg" class="img-responsive" alt="Logo - Web App Design">
			</a>
			<center><h3>ESTABLECIMIENTO</h3></center>
		</div>
		<div class="col-md-4">
			<a href="<?php echo IMAGENES; ?>">
				<img src="imagenes/galeria.jpg" class="img-responsive" alt="Logo - Web App Design">
			</a>
			<center><h3>IMAGENES</h3></center>
		</div>
		<div class="col-md-4">
			<a href="<?php echo UBICACION; ?>">
				<img src="imagenes/ubicacion.jpg" class="img-responsive" alt="Logo - Web App Design">
			</a>
			<center><h3>UBICACION</h3></center>
		</div>
	</div>
</div>


<?php
include_once 'plantillas/footer.inc.php';
?>