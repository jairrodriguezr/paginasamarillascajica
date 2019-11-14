<?php

class RepositorioCategoria
{
	
	public static function ObtenerCategoria($conexion)
	{

		$categoria = array();

		if (isset($conexion)) {
			try {
				include_once 'app/Categoria.inc.php';

				$sql = "SELECT * FROM establecimientos.categoria ORDER BY categoria ASC";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$categoria[] = new Categoria(
												$fila['id'],
												$fila['categoria']
													);
 					}
				}
								
			} catch (PDOException $e) {
				print 'ERROR'. $e -> getMessage();	
			}
		}
			return $categoria;
		}

		public static function ObtenerIdCat($categoria, $conexion){
			$categoria = null;

			if (isset($conexion)) {
			
			try {

				include_once 'Categoria.inc.php';

				$sql = "SELECT * FROM establecimientos.categoria WHERE categoria = :categoria";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':categoria', $categoria, PDO::PARAM_STR);
				$sentencia -> execute();

				$resultado = $sentencia -> fetch();

				if (!empty($resultado)) {
					
					$categoria = new Categoria($resultado['id'],
										 $resultado['categoria']
										 );

				}

			} catch (PDOException $e) {
				print 'ERROR' .$e -> getMessage();
			}
		}	

			return $categoria;
		}		

}

?>