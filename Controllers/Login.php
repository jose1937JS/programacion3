<?php

require_once 'Models/Modelo.php';

class LoginController {

	private $modelo;

	public function __construct()
	{
		$this->modelo = new Modelo();
	}

	public function index()
	{	
		require_once 'Views/header.php';
		require_once 'Views/login.php';
		require_once 'Views/footer.php';
	}

	public function login()
	{
		if (isset($_POST['login']))
		{
			$this->modelo = new Modelo();

			$user = $_POST['usuario'];
			$pass = $_POST['clave'];

			$data = $this->modelo->getUser($user);

			if ($data[0]['usuario'] == $user)
			{
				if ($data[0]['clave'] == $pass)
				{
					session_start();
					$_SESSION[$user] = $pass;

					header("Location: index.php?c=Inicio&user=$user");
				}
				else {
					header("Location: index.php?msgerr=clave");
				}
			}
			else {
				header("Location: index.php?msgerr=user");
			}
		}
		else {
			header("Location: index.php");
		}
	}

	public function logout()
	{
		session_start();

		$sesion = $_POST['sesion'];

		if (isset($_SESSION[$sesion]))
		{
			session_destroy();
			header("Location: index.php");
		}
	}
}