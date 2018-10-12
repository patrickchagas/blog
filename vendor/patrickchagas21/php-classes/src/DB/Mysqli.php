<?php 

namespace Pcode\DB;

class Mysqli{

	const HOSTNAME = "127.0.0.1";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "db_blog";

	private $con; 

	public function __construct()
	{

		$this->con = new \Mysqli(Mysqli::HOSTNAME, Mysqli::USERNAME, Mysqli::PASSWORD, Mysqli::DBNAME);

		if(mysqli_connect_errno()){
		exit('Erro ao conectar-se ao banco de dados. '.mysqli_connect_error());
		}

	}
	
}

?>