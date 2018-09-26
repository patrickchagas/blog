<?php 

namespace Pcode\Model;

use \Pcode\DB\Sql;
use \Pcode\Model;


class Notice extends Model { //Avisos

	//Listar todos os avisos
	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_notices ORDER BY idnotice");
	}

	//Salvar um aviso no banco
	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_notices_save(:idnotice, :notice, :description, :active, :publishedby)", array(

			":idnotice"=>$this->getidnotice(),
			":notice"=>$this->getnotice(),
			":description"=>$this->getdescription(),
			":active"=>$this->getactive(),
			":publishedby"=>$this->getpublishedby()
		));

		$this->setData($results[0]);

		
	}

	//Pegar o ID de um aviso
	public function get($idnotice)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_notices WHERE idnotice = :idnotice", array(
			':idnotice'=>$idnotice
		));

		$this->setData($results[0]);

	}

	//Deletar um aviso
	public function delete()
	{

		$sql = new Sql();

		$sql->select("DELETE FROM tb_notices WHERE idnotice = :idnotice", array(
			':idnotice'=>$this->getidnotice()
		));

	}


}



?>