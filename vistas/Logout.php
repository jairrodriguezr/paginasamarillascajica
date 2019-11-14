<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
error_reporting(-1);
ini_set('error_reporting', E_ALL);

session_start();
include_once 'app/config.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/redireccion.inc.php';

ControlSesion :: CerrarSesion();

Redireccion :: redirigir(SERVIDOR);

?>
