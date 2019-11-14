<?php
include_once 'app/ControlSesion.inc.php';
include_once 'app/conexion.inc.php';
include_once 'app/config.inc.php';
include_once 'app/Categoria.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioCategoria.inc.php';
include_once 'app/EscritorCategorias.inc.php';

Conexion :: abrir_conexion();
	$TotalUsuarios = RepositorioUsuario :: ObtenerNumeroUsuarios(Conexion :: obtener_conexion());
	
?>

<nav class="navbar navbar-default navbar-static-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#expande-menu" aria-expanded="false" aria-controls="navbar"> 
					<span class="sr-only"> Este botón despliega la barra de navegación</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="<?php echo SERVIDOR ;?>" class="navbar-brand">Comercio Cajicá</a>
					
			</div>

			<div id="expande-menu" class="navbar navbar-collapse" id>
				<ul class="nav navbar-nav">
					<li><a href="<?php echo SERVIDOR ;?>">Home</a></li>
					<li><a href="<?php echo REGISTROCORRECTO ;?>">Correcto</a></li>
					<li><a><div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <div placeholder="Categoria">
                                    <select name="categoria">
                                        <option value="0">Seleccionar categoría</option>
                                        <?php 
                                        EscritorCategorias::EscribirCategorias();
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<?php if(ControlSesion :: SesionIniciada()){
					?>
						<li>
						<a href="#"><?php echo '' . $_SESSION['nombre_usuario'];?></a>
						</li>
						<li>
						<a href="<?php echo PANEL;?>">panel de control</a>
						</li>
						<li>
						<a href="<?php echo LOGOUT;?>">Salir</a>
						</li>
					<?php
					}else{
					?>
						<li><a href="<?php echo USUARIOS ;?>"><?php echo $TotalUsuarios ;?> Registro</a></li>
					<li><a href="<?php echo LOGIN; ?>">Login</a></li>

					<?php
					}

					?>
					
				</ul>
			</div>
		</div>
	</nav>