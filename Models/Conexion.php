<?php

class Conexion {

	private $host   = "127.0.0.1";
	private $user   = "root";
	private $pass   = "23795320";
	private $db     = "progra3";
	
	public $con;

	public function __construct()
	{
		$this->con = new mysqli($this->host, $this->user, $this->pass, $this->db);
	
		if ($this->con->connect_errno) {
			echo "<h3><b>Error al conectar: " . $this->con->connect_error . "</b></h3>";
		}
	}

	public function consulta($sql)
	{
		$consulta = $this->con->query(trim($sql));
		// var_dump($consulta);exit();

		$result = $consulta->fetch_all(MYSQLI_ASSOC);

		if ($result)
		{
			return $result;
		}
		else {
			return 0;
		}
	}

	public function runQuery($sql)
	{
		$consulta = $this->con->query($sql);
	}

	public function getBy($tabla, $campo, $user)
	{
		$stm = $this->con->query("SELECT * FROM $tabla WHERE $campo = '$user'");

		$result = $stm->fetch_all(MYSQLI_ASSOC);

		$stm->close();

		return $result;
	}

	public function getAll($tabla)
	{
		$stm = $this->con->query("SELECT * FROM $tabla");

		$result = $stm->fetch_all(MYSQLI_ASSOC);
		
		$stm->close();

		return $result;
	}

	public function delete($tabla, $id)
	{
		$stm = $this->con->prepare("DELETE FROM ? WHERE id = ?");
		
		$stm->bindParam(1, $tabla);
		$stm->bindParam(2, $id);

		$stm->execute();

		$stm->close();
	}

}