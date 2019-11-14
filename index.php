<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
/*error_reporting(E_ALL);
ini_set('display_errors', '1');
error_reporting(-1);*/


$componentes_url = parse_url($_SERVER['REQUEST_URI']);

  $ruta = $componentes_url['path'];

  $partes_ruta = explode('/', $ruta);
  $partes_ruta = array_filter($partes_ruta);
  $partes_ruta = array_slice($partes_ruta, 0);

/*
print_r($componentes_url);
print_r ($partes_ruta);*/

  $ruta_elegida = 'vistas/404.php';

switch ($partes_ruta[0]) {
        case '':
          $ruta_elegida = 'vistas/home.php';
          break;

        case 'panel':
          $ruta_elegida = 'vistas/panel.php';
          break;

        case 'establecimientos':
          $ruta_elegida = 'vistas/form_establecimientos.php';
          break;

        case 'Imagenes':
          $ruta_elegida = 'vistas/form_imagenes.php';
          break;

        case 'usuarios':
          $ruta_elegida = 'vistas/form_usuarios.php';
          break;
      
        case 'LoginCorrecto':
          $ruta_elegida = 'vistas/LoginCorrecto.php';
          break;

        case 'LoginInvalido':
          $ruta_elegida = 'vistas/LoginInvalido.php';
          break;

        case 'ubicacion':
          $ruta_elegida = 'vistas/form_ubicacion.php';
          break;
 
        case 'login':
          $ruta_elegida = 'vistas/login.php';
          break;

        case 'Logout':
          $ruta_elegida = 'vistas/Logout.php';
          break;
         
      }

/*
  if ($partes_ruta[0] == '') {
  	if (count($partes_ruta) == 0) {
  		$ruta_elegida = 'vistas/home.php';
  	}else if (count($partes_ruta) == 0) {
      
    }
  }*/
  
  include_once $ruta_elegida;

?>