<?php
include_once 'Categoria.inc.php';
include_once 'RepositorioCategoria.inc.php';

class ValidadorCategoria
{
	
	private $categoria;
	private $error;

	function __construct($categoria, $conexion)
	{
		$this -> error = '';

		if (!$this -> VariableIniciada($categoria)) {
			$this -> categoria = null;
			$this -> error = 'debes elegir una categoria';
		}else{
			$this -> categoria = RepositorioCategoria :: ObtenerIdCat($categoria, $conexion);
		}
	}

	private function VariableIniciada($variable){
		if ($variable) {
			return true;
		}else{
			return false;
		}
	}

	/*private function validar_categoria($categoria){
		if (!$this -> variable_iniciada($categoria)) {
			return "Debes seleccionar una categoria";
		}else{
			$this -> categoria = $categoria;
		}
    	return '';
	}*/

	public function ObtenerCategoria(){
		return $this -> categoria;
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