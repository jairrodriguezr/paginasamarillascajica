<?php
	include_once 'app/Categoria.inc.php';
	include_once 'app/RepositorioCategoria.inc.php';

	class EscritorCategorias
	{
		
		public static function EscribirCategorias()
		{
			$categorias = RepositorioCategoria :: ObtenerCategoria(Conexion::obtener_conexion()); 

			if (count($categorias)) {
				foreach ($categorias as $categoria) {
					self::EscribirCategoria($categoria);
				}
			}
		}

		public static function EscribirCategoria($categoria){
			if (!isset($categoria)) {
				return;
			}
			?>
				<option value="<?php echo $categoria->obtener_id()?>"><?php echo $categoria->obtener_categoria();?></option>
			<?php
		}
	}
?>