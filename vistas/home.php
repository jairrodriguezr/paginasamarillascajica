<?php
include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';

$titulo = 'Comercio Cajicá';

include_once 'plantillas/cabecera.inc.php';
include_once 'plantillas/navbar.inc.php';

?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<form class="form-group  buscador" action="">
					<div class="row container">
						<h3>Buscador</h3>
						<label for="">Buscar</label>
						<label for=""><input type="text" name="buscar"></label>
					</div>
					<!-- Default unchecked -->
						
					<div class="row container">
						<button type="button" class="btn btn-primary">Buscar</button>
						<button type="button" class="btn btn-primary">Limpiar</button>
					</div>
					<div class="container col-xs-12">
						    <h3>Información</h3>

						    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem veritatis ex quisquam impedit, blanditiis delectus earum. Laboriosam tempore, laudantium, facilis a rerum quis optio officiis sunt harum maxime porro illo.
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem veritatis ex quisquam impedit, blanditiis delectus earum. Laboriosam tempore, laudantium, facilis a rerum quis optio officiis sunt harum maxime porro illo.
						</div>
				</form>
			</div>
	
			<div class="col-xs-12 col-sm-6">

			
				<div id="carousel-1" class="carousel slide" data-ride="carousel">

					<!-- Indicadores -->
					
					<ol class="carousel-indicators">
						<li data-target="#carousel-1" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-1" data-slide-to="1"></li>
						<li data-target="#carousel-1" data-slide-to="2"></li>
						<li data-target="#carousel-1" data-slide-to="3"></li>
						<li data-target="#carousel-1" data-slide-to="4"></li>
					</ol>

					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img src="imagenes/panoramica.jpg" class="img-responsive" alt="">
							<div class="carousel-caption">
								<h3>Este es nuestro slide #1</h3>
							</div>
						</div>
						<div class="item">
							<img src="imagenes/estacion.jpg" class="img-responsive" alt="">
							<div class="carousel-caption">
								<h3>Este es nuestro slide #2</h3>
							</div>
						</div>
						<div class="item">
							<img src="imagenes/iglesia.jpg" class="img-responsive" alt="">
							<div class="carousel-caption">
								<h3>Este es nuestro slide #3</h3>
							</div>
						</div>
						<div class="item">
							<img src="imagenes/panoramica.jpg" class="img-responsive" alt="">
							<div class="carousel-caption">
								<h3>Este es nuestro slide #4</h3>
							</div>
						</div>
						<div class="item">
							<img src="imagenes/panoramica.jpg" class="img-responsive" alt="">
							<div class="carousel-caption">
								<h3>Este es nuestro slide #5</h3>
							</div>
						</div>
					</div>
				</div>

			</div>


	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<h3>Ubicacion</h3>
				<p><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m11!1m3!1d128.8132462418871!2d-74.02385553017712!3d4.917026789131628!2m2!1f119.44631737722777!2f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x8e4077649d082b13%3A0x3d980ef33488bdc6!2sSport+Cueros!5e1!3m2!1ses!2sco!4v1555858465447!5m2!1ses!2sco" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></p>
		</div>	
		<div class="col-xs-12 col-sm-6">
		<h3>Descripción</h3>	

		<?php
			Conexion :: abrir_conexion();
		?>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem veritatis ex quisquam impedit, blanditiis delectus earum. Laboriosam tempore, laudantium, facilis a rerum quis optio officiis sunt harum maxime porro illo.
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem veritatis ex quisquam impedit, blanditiis delectus earum. Laboriosam tempore, laudantium, facilis a rerum quis optio officiis sunt harum maxime porro illo.
		</div>
	</div>
	</div>

<?php
include_once 'plantillas/footer.inc.php';
?>