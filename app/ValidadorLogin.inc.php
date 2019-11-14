<?php
include_once 'RepositorioUsuario.inc.php';

class ValidadorLogin
{
	
	private $usuario;
	private $error;

	function __construct($correo, $clave, $conexion)
	{
		$this -> error = '';

		if (!$this -> VariableIniciada($correo) || !$this -> VariableIniciada($clave)){
			$this -> usuario = null;
			$this -> error = 'debes introducir tu correo y contraseña';
		}else{
			$this -> usuario = RepositorioUsuario :: ObtenerUsuarioxcorreo($conexion, $correo);
		
			if (is_null($this -> usuario) || !password_verify($clave, $this -> usuario -> obtener_clave()))
			{
				$this -> error = 'Datos incorrectos';
			}
		}
	}

	private function VariableIniciada($variable){
		if ($variable) {
			return true;
		}else{
			return false;
		}
	}

	public function obtener_usuario(){
		return $this -> usuario;
	}

	public function obtener_error(){
		return $this -> error;
	}

	public function mostrar_error(){
		if ($this -> error !== '') {
			echo "<br> <div class='alert alert-danger' role='alert'>";
			echo $this -> error;
			echo "</div><br>";
		}
	}
}

?>