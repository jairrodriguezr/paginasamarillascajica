<?php
include_once 'app/Establecimientos.inc.php';
include_once 'app/RepositorioEstablecimientos.inc.php';

class ValidadorEstablecimientos{

	private $aviso_inicio;
	private $aviso_cierre;

	private $nombre;
	private $telefono;
	private $direccion;
	private $web;
	private $descripcion;
	private $id_usuario;
	private $id_categoria;

	private $error_nombre;
	private $error_telefono;
	private $error_direccion;
	private $error_web;
	private $error_descripcion;

	public function __construct($nombre, $telefono, $direccion, $web, $descripcion, $id_usuario, $id_categoria, $conexion){

		$this -> aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
		$this -> aviso_cierre ="</div>";

		$this -> nombre = '';
		$this -> telefono = '';
		$this -> direccion = '';
		$this -> web = '';
		$this -> descripcion = '';
		$this -> id_usuario = '';
		$this -> id_categoria = '';
		

		$this -> error_nombre = $this -> validar_nombre($nombre);
		$this -> error_telefono = $this -> validar_telefono($conexion, $telefono);
		$this -> error_direccion = $this -> validar_direccion($direccion);
		$this -> error_web = $this -> validar_web($web);
		$this -> error_descripcion = $this -> validar_descripcion($descripcion);

	}

	private function variable_iniciada($variable){
		if (isset($variable) && !empty($variable)) {
			return true;
		}else{
			return false;
		}
	}

	private function validar_nombre($nombre){
		if (!$this -> variable_iniciada($nombre)) {
			return "Debes escribir un nombre";
		}else{
			$this -> nombre = $nombre;
		}

		if (strlen($nombre) < 6) {
			return 'El nombre debe tener mas de 6 caracteres';
		}

		if (strlen($nombre) > 100) {
			return 'El nombre no debe tener mas de 100 caracteres';


		}

			return '';
	}

	private function validar_telefono($conexion, $telefono){
		if (!$this -> variable_iniciada($telefono)) {
			return "Debes escribir un número de teléfono";
		}else{
			$this -> telefono = $telefono;
		}

		if (strlen($telefono) < 7) {
			return 'El número de teléfono debe tener minimo 7 caracteres';
		}

		if (strlen($telefono) > 10) {
			return 'El número de teléfono no debe tener mas de 10 caracteres';
		}

		if (RepositorioEstablecimientos :: TelefonoExiste($conexion, $telefono)) {
			return 'Este número de teléfono ya está en uso, pruebe con otro';
		}
		return '';
	}

	private function validar_direccion($direccion){
		if (!$this -> variable_iniciada($direccion)) {
			return 'Debes proporcionar una dirección';
		}else{
			$this -> direccion = $direccion;
		}

		return '';
	}

	private function validar_web($web){
		if (!$this -> variable_iniciada($web)) {
			return 'Debes proporcionar una Direccion web';
		}else{
			$this -> web = $web;
		}
		return '';
	}

		private function validar_descripcion($descripcion){
		if (!$this -> variable_iniciada($descripcion)) {
				return 'Primero debes rellenar la descripción de tu negocio';
			}	else{
			$this -> descripcion = $descripcion;
		}
		return '';
	}

	public function obtener_nombre(){
		return $this -> nombre;
	}

	public function obtener_telefono(){
		return $this -> telefono;
	}

	public function obtener_direccion(){
		return $this -> direccion;
	}

	public function obtener_web(){
		return $this -> web;
	}

	public function obtener_descripcion(){
		return $this -> descripcion;
	}

	public function obtener_error_nombre(){
		return $this -> error_nombre;
	}
	public function obtener_error_telefono(){
		return $this -> error_telefono;
	}
	public function obtener_error_direccion(){
		return $this -> error_direccion;
	}

	public function obtener_error_web(){
		return $this -> error_web;
	}

	public function obtener_error_descripcion(){
		return $this -> error_descripcion;
	}

	public function mostrar_nombre(){
		if ($this -> nombre !== '') {
			echo 'value ="'. $this -> nombre . '"';
		}
	}

	public function mostrar_telefono(){

		if ($this -> telefono !== '') {
			echo 'value ="'. $this -> telefono . '"';
		}
	}

	public function mostrar_direccion(){

		if ($this -> direccion !== '') {
			echo 'value ="'. $this -> direccion . '"';
		}
	}

	public function mostrar_web(){
		if ($this -> web !== '') {
			echo 'value ="'. $this -> web . '"';
		}
	}

	public function mostrar_descripcion(){
		if ($this -> descripcion !== '') {
			echo $this -> descripcion;
		}
	}

	public function mostrar_error_nombre(){
		if ($this -> error_nombre !== '') {
			echo $this -> aviso_inicio . $this -> error_nombre . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_telefono(){
		if ($this -> error_telefono !== '') {
			echo $this -> aviso_inicio . $this -> error_telefono . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_direccion(){
		if ($this -> error_direccion !== '') {
			echo $this -> aviso_inicio . $this -> error_direccion . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_web(){
		if ($this -> error_web !== '') {
			echo $this -> aviso_inicio . $this -> error_web . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_descripcion(){
		if ($this -> error_descripcion !== '') {
			echo $this -> aviso_inicio . $this -> error_descripcion . $this -> aviso_cierre;
		}
	}

	public function registro_valido(){

		if ($this -> error_nombre === '' && $this -> error_telefono === '' && $this -> error_direccion === '' && $this -> error_web === '' && $this -> error_descripcion == '') {
				return true;
		}else{
			return false;
		}
	}
}

?>