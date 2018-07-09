<?php

class InicioController {

	private $modelo;

	public function __construct()
	{
		$this->modelo = new Modelo();
	}

	public function index()
	{
		session_start();

		if ( isset($_SESSION[$_GET['user']]) )
		{
			$pubs  = $this->modelo->getPublicaciones('Publicaciones');

			include_once 'Views/header.php';
			include_once 'Views/navbar.php';
			include_once 'Views/inicio.php';
			include_once 'Views/footer.php';
		}
		else {
			header("Location: index.php");
		}
	}

	public function perfil()
	{
		session_start();

		if ( isset($_SESSION[$_GET['user']]) )
		{
			$perfil 	  = $this->modelo->getPerfil($_GET['user']);
			$nacionalidad = $this->modelo->getAll('Nacionalidad');
			$profesion 	  = $this->modelo->getAll('Profesion');

			include_once 'Views/header.php';
			include_once 'Views/navbar.php';
			include_once 'Views/perfil.php';
			include_once 'Views/footer.php';
		}
		else {
			header("Location: index.php");
		}
	}

	public function editar()
	{
		$user = $_GET['user'];
		$id_usuario = $this->modelo->getBy('Usuarios', 'usuario', $user); // tabla, campo, valor

		$nombre 	  = $_POST['nombre'];
		$apellido 	  = $_POST['apellido'];
		$telefono 	  = $_POST['telefono'];
		$email 		  = $_POST['email'];
		$about		  = $_POST['about'];
		$direccion 	  = $_POST['direccion'];
		$nacionalidad = $_POST['nacionalidad'];
		$profesion 	  = $_POST['profesion'];
		$clave 		  = $_POST['clave'];
		$clave2 	  = $_POST['clave2'];

		if ( $clave == $clave2 ) {
			
			$this->modelo->editar($nombre, $apellido, $telefono, $email, $about, $direccion, $nacionalidad, $profesion, $clave, $id_usuario[0]['id']);
		}
		else {
			header("Location: index.php?c=Inicio&a=perfil&user=$user&msgerr=clave");
		}

		header("Location: index.php?c=Inicio&user=$user");
	}

	public function publicar()
	{
		if( !empty( $_FILES['img']['name'] ) )
		{
			$imagen = date('omdGis') . '-' . strtolower($_FILES['img']['name']);
			move_uploaded_file($_FILES['img']['tmp_name'], 'uploads/' . $imagen);
		}

		$user   	= $_GET['user'];

		$titulo 	= $_POST['titulo'];
		$cuerpo 	= $_POST['cuerpo'];
		$fecha 		= date('o-m-d'); // 2018-07-08
		$id_usuario = $this->modelo->getBy('Usuarios', 'usuario', $user); // tabla, campo, valor

		$this->modelo->publicar($titulo, $cuerpo, $fecha, $imagen, $id_usuario[0]['id']);
		header("Location: index.php?c=Inicio&user=$user");
	}

	public function misPublicaciones()
	{
		session_start();

		if ( isset($_SESSION[$_GET['user']]) )
		{
			$id_usuario = $this->modelo->getBy('Usuarios', 'usuario', $_GET['user']);
			$pubs  = $this->modelo->getPublicacionesByUser($id_usuario[0]['id']);

			include_once 'Views/header.php';
			include_once 'Views/navbar.php';
			include_once 'Views/inicio.php';
			include_once 'Views/footer.php';
		}
		else {
			header("Location: index.php");
		}
	}
}