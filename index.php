<?php

// Hace falta un autoload.

require_once 'Controllers/Login.php';
require_once 'Controllers/Inicio.php';

define( 'RUTA_HTTP', 'http://' . $_SERVER['HTTP_HOST'] . '/_programacion3' );

if ( !isset($_REQUEST['c']) )
{
	// Controlador q se carga por defecto con su metodo.
	$controller = new LoginController();
	$controller->index();
}
else
{
	$controller = $_REQUEST['c'] . 'Controller';
	$action 	= $_REQUEST['a'] ?? 'index';

	$controller = new $controller();
	call_user_func( [$controller, $action] );
}