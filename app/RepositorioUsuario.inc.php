<?php

	class RepositorioUsuario
	{

		public static function ObtenerNumeroUsuarios($conexion){

		$TotalUsuarios = null;

		if (isset($conexion)) {
			try {

				include_once 'app/Usuarios.inc.php';

				$sql = "SELECT COUNT(*) as total FROM establecimientos.usuarios";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetch();

				$TotalUsuarios = $resultado['total'];
				
			} catch (PDOException $e) {
				print 'ERROR'. $e -> getMessage();	
			}
		}
			return $TotalUsuarios;
		}


		public static function InsertarUsuario($conexion, $valores){
		$UsuarioInsertado = false;

		if (isset($conexion)) {

			try {

				$nombre = $valores-> obtener_nombre();
				$usuario = $valores-> obtener_usuario();
				$email = $valores-> obtener_correo();
				$clave = $valores-> obtener_clave();

				$sql = "INSERT INTO establecimientos.usuarios(id,nombre,usuario,correo,clave,fecha_reg,activo)VALUES(NULL,:nombre,:usuario,:correo,:clave,NOW(),0)";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
				$sentencia -> bindParam(':usuario', $usuario, PDO::PARAM_STR);
				$sentencia -> bindParam(':correo', $email, PDO::PARAM_STR);
				$sentencia -> bindParam(':clave', $clave, PDO::PARAM_STR);

				$UsuarioInsertado = $sentencia -> execute();


			} catch (PDOException $ex) {
				print 'ERROR' . $ex -> getMessage();

			}
		}
			return $UsuarioInsertado;
		}


		public static function UsuarioExiste($conexion, $usuario){

		$UsuarioExiste = true;

		if (isset($conexion)) {
			try {
				$sql = "SELECT * FROM establecimientos.usuarios WHERE usuario = :usuario";


				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':usuario', $usuario, PDO::PARAM_STR);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					$UsuarioExiste = true;
				}else{
					$UsuarioExiste = false;
				}
				
			} catch (PDOException $e) {
				print 'ERROR'. $e -> getMessage();	
			}
		}
			return $UsuarioExiste;
		}


		public static function CorreoExiste($conexion, $correo){

		$CorreoExiste = true;

		if (isset($conexion)) {
			try {
				$sql = "SELECT * FROM establecimientos.usuarios WHERE correo = :correo";

				//$correo = $correo-> obtener_correo();

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					$CorreoExiste = true;
				}else{
					$CorreoExiste = false;
				}
				
			} catch (PDOException $e) {
				print 'ERROR'. $e -> getMessage();	
			}
		}
			return $CorreoExiste;
		}

		public static function ObtenerUsuarioxcorreo($conexion, $correo){
			$usuario = null;

			if (isset($conexion)) {
			
			try {
				$sql = "SELECT * FROM establecimientos.usuarios WHERE correo = :correo";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);
				$sentencia -> execute();

				$resultado = $sentencia -> fetch();

				if (!empty($resultado)) {
					
					$usuario = new Usuarios($resultado['id'],
										 $resultado['nombre'], 
										 $resultado['usuario'], 
										 $resultado['correo'], 
										 $resultado['clave'], 
										 $resultado['fecha_reg'],
										 $resultado['activo']);

				}

			} catch (PDOException $e) {
				print 'ERROR' .$e -> getMessage();
			}
		}	

			return $usuario;
		}

	}

?>