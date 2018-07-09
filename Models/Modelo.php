<?php

require_once 'Models/Conexion.php';

class Modelo extends Conexion {

	public function __construct()
	{
		parent::__construct();
	}

	public function getUser($user)
	{
		return self::consulta("SELECT usuario, clave FROM Usuarios WHERE BINARY usuario = '$user'");
	}

	public function getPublicaciones($tabla)
	{
		return self::consulta("SELECT Usuarios.id, Usuarios.nombre, Usuarios.apellido, Publicaciones.Titulo, Publicaciones.Cuerpo, Publicaciones.Fecha, Publicaciones.Imagen, Publicaciones.Id_usuario FROM Publicaciones INNER JOIN Usuarios ON Publicaciones.Id_usuario = Usuarios.id");
	}

	public function getPublicacionesByUser($id_usuario)
	{
		return self::consulta("SELECT Usuarios.id, Usuarios.nombre, Usuarios.apellido, Publicaciones.Titulo, Publicaciones.Cuerpo, Publicaciones.Fecha, Publicaciones.Imagen, Publicaciones.Id_usuario FROM Publicaciones INNER JOIN Usuarios ON Publicaciones.Id_usuario = Usuarios.id WHERE Publicaciones.id_usuario = '$id_usuario'");
	}

	public function getPerfil($user)
	{
		return self::consulta("SELECT Usuarios.Id as idusu, Usuarios.nombre, Usuarios.about, Usuarios.apellido, Usuarios.cedula, Usuarios.direccion, Usuarios.telefono, Usuarios.email, Usuarios.usuario, Usuarios.clave, Usuarios.Id_nacionalidad, Usuarios.Id_profesion, Nacionalidad.Id as idnac, Nacionalidad.nacionalidad, Profesion.Id as idpro, Profesion.profesion FROM Usuarios INNER JOIN Nacionalidad ON Id_nacionalidad = Nacionalidad.Id INNER JOIN Profesion ON Id_profesion = Profesion.Id WHERE Usuarios.usuario = '$user'");
		
	}
	public function countComments($id_publicacion)
	{
		return self::consulta("SELECT COUNT(id) as total FROM Pivote WHERE Id_publicacion = '$id_publicacion'");
	}

	public function publicar($titulo, $cuerpo, $imagen, $fecha ,$id_usuario)
	{
		$this->con->query("INSERT INTO Publicaciones(Titulo, Cuerpo, Fecha, imagen, id_usuario) VALUES('$titulo', '$cuerpo', '$imagen', '$fecha', $id_usuario)");
	}

	public function editar($nombre, $apellido, $telefono, $email, $about, $direccion, $id_nacionalidad, $id_profesion, $clave, $id)
	{
		var_dump("UPDATE Usuarios SET nombre='$nombre', apellido='$apellido', telefono='$telefono', email='$email', about='$about', direccion='$direccion', id_nacionalidad='$id_nacionalidad', id_profesion='$id_profesion', clave='$clave' WHERE id=$id");exit();

		self::runQuery("UPDATE Usuarios SET nombre='$nombre', apellido='$apellido', telefono='$telefono', email='$email', about='$about', direccion='$direccion', id_nacionalidad='$id_nacionalidad', id_profesion='$id_profesion', clave='$clave' WHERE id=$id");
	}
}