<?php

include_once 'app/Establecimientos.inc.php';

	class RepositorioEstablecimientos
	{


		public static function InsertarEstablecimiento($conexion, $establecimientos){
		$EstablecimientoInsertado = false;
		//var_dump($establecimientos);

		if (isset($conexion)) {

			try {

				$nombre = $establecimientos-> obtener_nombre();
				$telefono = $establecimientos-> obtener_telefono();
				$direccion = $establecimientos-> obtener_direccion();
				$web = $establecimientos-> obtener_web();
				$descripcion = $establecimientos-> obtener_descripcion();
				$id_usuario = $establecimientos-> obtener_id_usuario();
				$id_categoria = $establecimientos-> obtener_id_categoria();
				$fecha_reg = $establecimientos-> obtener_fecha_reg();

				$sql = "INSERT INTO establecimientos.establecimientos(id,nombre,telefono,direccion,web,descripcion,id_usuario,id_categoria,fecha_reg)VALUES(NULL,:nombre,:telefono,:direccion,:web,:descripcion,:id_usuario,:id_categoria, NOW())";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
				$sentencia -> bindParam(':telefono', $telefono, PDO::PARAM_STR);
				$sentencia -> bindParam(':direccion', $direccion, PDO::PARAM_STR);
				$sentencia -> bindParam(':web', $web, PDO::PARAM_STR);
				$sentencia -> bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
				$sentencia -> bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
				$sentencia -> bindParam(':id_categoria', $id_categoria, PDO::PARAM_STR);

				$EstablecimientoInsertado = $sentencia -> execute();


			} catch (PDOException $ex) {
				print 'ERROR' . $ex -> getMessage();

			}
		}
			return $EstablecimientoInsertado;
		}


		public static function TelefonoExiste($conexion, $telefono){

		$TelefonoExiste = true;

		if (isset($conexion)) {
			try {
				$sql = "SELECT * FROM establecimientos.establecimientos WHERE telefono = :telefono";

				//$usuario = $usuario-> obtener_usuario();

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':telefono', $telefono, PDO ::PARAM_STR);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					$TelefonoExiste = true;
				}else{
					$TelefonoExiste = false;
				}
				
			} catch (PDOException $e) {
				print 'ERROR'. $e -> getMessage();	
			}
		}
			return $TelefonoExiste;
		}

	}

?>