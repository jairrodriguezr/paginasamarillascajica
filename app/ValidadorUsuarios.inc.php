<?php
include_once 'app/Usuarios.inc.php';

class ValidadorUsuarios{

	private $aviso_inicio;
	private $aviso_cierre;

	private $nombre;
	private $usuario;
	private $correo;
	private $clave;

	private $error_nombre;
	private $error_usuario;
	private $error_correo;
	private $error_clave;
	private $error_clave2;

	public function __construct($nombre, $usuario, $correo, $clave, $clave2, $conexion){

		$this -> aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
		$this -> aviso_cierre ="</div>";

		$this -> nombre = '';
		$this -> usuario = '';
		$this -> correo = '';
		$this -> clave = '';
		

		$this -> error_nombre = $this -> validar_nombre($nombre);
		$this -> error_usuario = $this -> validar_usuario($conexion, $usuario);
		$this -> error_correo = $this -> validar_correo($conexion, $correo);
		$this -> error_clave = $this -> validar_clave($clave);
		$this -> error_clave2 = $this -> validar_clave2($clave, $clave2);

		if ($this -> error_clave === '' && $this -> error_clave2 === '') {
			$this -> clave = $clave;
		}
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

		if (strlen($nombre) > 30) {
			return 'El nombre no debe tener mas de 30 caracteres';
		}

			return '';
	}

	private function validar_usuario($conexion, $usuario){
		if (!$this -> variable_iniciada($usuario)) {
			return "Debes escribir un nombre de usuario";
		}else{
			$this -> usuario = $usuario;
		}

		if (strlen($usuario) < 6) {
			return 'El nombre debe tener mas de 6 caracteres';
		}

		if (strlen($usuario) > 30) {
			return 'El nombre no debe tener mas de 30 caracteres';
		}

		if (RepositorioUsuario::UsuarioExiste($conexion, $usuario)) {
			return 'Este nombre de usuario ya está en uso, pruebe con otro';
		}
		return '';
	}

	private function validar_correo($conexion, $correo){
		if (!$this -> variable_iniciada($correo)) {
			return 'Debes proporcionar un correo electronico';
		}else{
			$this -> correo = $correo;
		}

		if (RepositorioUsuario::CorreoExiste($conexion, $correo)) {
			return "Este correo de usuario ya está en uso, pruebe con otro correo o <a href='#'>Recuperar contraseña</a>";
		}
		return '';
	}

	private function validar_clave($clave){
		if (!$this -> variable_iniciada($clave)) {
			return 'Debes proporcionar una contraseña';
		}
		return '';
	}

		private function validar_clave2($clave, $clave2){
		if (!$this -> variable_iniciada($clave)) {
				return 'Primero debes rellenar la contraseña';
			}	

		if (!$this -> variable_iniciada($clave2)) {
			return 'Debes repetir la contraseña';
		}
		
		if ($clave !== $clave2) {
			return 'Ambas contraseñas deben coincidir';
		}
		return '';
	}

	public function obtener_nombre(){
		return $this -> nombre;
	}

	public function obtener_usuario(){
		return $this -> usuario;
	}

	public function obtener_correo(){
		return $this -> correo;
	}

	public function obtener_clave(){
		return $this -> clave;
	}

	public function obtener_error_nombre(){
		return $this -> error_nombre;
	}
	public function obtener_error_usuario(){
		return $this -> error_usuario;
	}
	public function obtener_error_correo(){
		return $this -> error_correo;
	}

	public function mostrar_nombre(){
		if ($this -> nombre !== '') {
			echo 'value ="'. $this -> nombre . '"';
		}
	}

	public function mostrar_usuario(){
		if ($this -> usuario !== '') {
			echo 'value ="'. $this -> usuario . '"';
		}
	}

	public function mostrar_correo(){
		if ($this -> correo !== '') {
			echo 'value ="'. $this -> correo . '"';
		}
	}

	public function mostrar_error_nombre(){
		if ($this -> error_nombre !== '') {
			echo $this -> aviso_inicio . $this -> error_nombre . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_usuario(){
		if ($this -> error_usuario !== '') {
			echo $this -> aviso_inicio . $this -> error_usuario . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_correo(){
		if ($this -> error_correo !== '') {
			echo $this -> aviso_inicio . $this -> error_correo . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_clave(){
		if ($this -> error_clave !== '') {
			echo $this -> aviso_inicio . $this -> error_clave . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_clave2(){
		if ($this -> error_clave2 !== '') {
			echo $this -> aviso_inicio . $this -> error_clave2 . $this -> aviso_cierre;
		}
	}

	public function registro_valido(){

		if ($this -> error_nombre === '' && $this -> error_usuario === '' && $this -> error_correo === '' && $this -> error_clave === '' && $this -> error_clave2 == '') {
				return true;
		}else{
			return false;
		}
	}
}

?>